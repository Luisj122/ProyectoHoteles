<?php

namespace App\Http\Controllers;

use App\Models\Habitaciones;
use App\Models\Habitaciones_users;
use App\Models\Hoteles;
use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoteles = Hoteles::all();
       
        $hotelCiudad = $hoteles->pluck('ciudad')->toArray();
        $uniqueHotelNames = array_unique($hotelCiudad);        

        return view('habitaciones.vistaInicio', ['habitaciones' => Habitaciones::all(), 'hoteles' => $uniqueHotelNames]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hoteles $hotel){
        return view('habitaciones.formNuevaHabitacion', ['hoteles' => $hotel]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Hoteles $hotel)
    {
        $request->flash();

        $habitacion = new Habitaciones();

        $habitacion->tipo = $request->input('tipo');
        $habitacion->descripcion = $request->input('descripcion');
        $habitacion->capacidad = $request->input('capacidad');
        $habitacion->precio = $request->input('precio');
        $path = $request->file('imagen')->store('public');
        $habitacion->imagen =  str_replace('public', 'storage', $path);
        $habitacion->hotel_id =  $request->input('hotel_id');
       
        $habitacion->save();

        $hotel->id = $request->input('hotel_id');
        return view('habitaciones.habitacion', ['hoteles' => $hotel, 'habitaciones' => $hotel->habitacion()->get()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitaciones $habitaciones)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detalle(Hoteles $hoteles, Request $request)
    {
        $habitaciones = Habitaciones::where('disponibilidad', 'libre')->orWhereIn('id', function ($query) {
            $query->select('habitaciones_id')->from('habitaciones_users')->where('fecha_salida', '<', now());
        })->get();
    
        
        $ciudad = $request->input('ciudad');
        
        return view('habitaciones.reservaHabitacion', ['hoteles' => $hoteles, 'habitaciones' => $habitaciones, 'fechaEntrada' => $request->input('fechaEntrada'), 'fechaSalida' => $request->input('fechaSalida'), 'reservas' => Habitaciones_users::all(), 'ciudad'=>$ciudad]);

    }

    /**
     * Display the specified resource.
     */
    public function detalleReserva(Request $request)
    {

        $habitacionDisponibilidad = Habitaciones::find($request->input('idHabitacion'));
        $habitacionDisponibilidad->disponibilidad = "ocupada";
        $habitacionDisponibilidad->save();

        //Me pinta si la disponibilidad de la habitacion esta libre o si las fechas de los clientes ya an cadudacado
        $habitaciones = Habitaciones::where('disponibilidad', 'libre')->orWhereIn('id', function ($query) {
            $query->select('habitaciones_id')->from('habitaciones_users')->orWhere('fecha_salida', '<', now());
        })->get();


        $habitacion = new Habitaciones();
        $user = new User();

        $user->id = $request->input('idCliente');
        $habitacion->id = $request->input('idHabitacion');

        $fechaEntrada = $request->input('fechaEntrada');
        $fechaSalida = $request->input('fechaSalida');
  
        $estado  = 'Pendiente';


        if ($habitacion->usuarios()->where('user_id', $user->id)->get()->count() == 0) {
            $habitacion->usuarios()->attach($user->id, ['fecha_entrada' => $fechaEntrada, 'fecha_salida' => $fechaSalida, 'estado'=> $estado]);
            
        }
        $ciudad = $request->input('ciudad');
        return view('habitaciones.reservaHabitacion', ['hoteles' => Hoteles::find($request->input('idHoteles')), 'habitaciones' => $habitaciones, 'fechaEntrada' => $request->input('fechaEntrada'), 'fechaSalida' => $request->input('fechaSalida'), 'reservas' => Habitaciones_users::all(), 'ciudad'=>$ciudad]); 
        
            

     
    }

    public function carroReserva(Request $request){

  
        $fechaInicio = Carbon::parse($request->input('fechaEntrada'));
        $fechaFin = Carbon::parse($request->input('fechaSalida'));

        $diasTranscurridos = $fechaInicio->diffInDays($fechaFin);
        $totales = Habitaciones::find($request->input('idHabitacion'));

        $ciudad = $request->input('ciudad');


        return view('habitaciones.carroReserva',['fechaEntrada'=>$request->input('fechaEntrada'), 'fechaSalida'=>$request->input('fechaSalida'),'habitacion'=>Habitaciones::find($request->input('idHabitacion')), 'cliente'=>User::find($request->input('idCliente')), 'hoteles'=>Hoteles::find($request->input('idHoteles')), 'dias'=>$diasTranscurridos, 'total'=>$diasTranscurridos * $totales->precio, 'ciudad'=>$ciudad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitaciones $habitaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitaciones $habitaciones)
    {

        $habitacion = Habitaciones::find($habitaciones->id);


        $habitacion->tipo = $request->input('tipo');
        $habitacion->descripcion = $request->input('descripcion');
        $habitacion->capacidad = $request->input('capacidad');
        $habitacion->precio = $request->input('precio');
        $habitacion->hotel_id =  $request->input('hotel_id');
       
        $habitacion->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitaciones $habitaciones)
    {
        //
    }


    public function cancelarReserva(Habitaciones_users $habitaciones_users)
    {
        $habitaciones = Habitaciones::find($habitaciones_users->habitaciones_id);

        $habitaciones->disponibilidad = 'libre';
        $habitaciones->save();
        $habitaciones_users->delete();
        return back();

    

    }
}
