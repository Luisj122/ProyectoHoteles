<?php

namespace App\Http\Controllers;

use App\Models\Habitaciones;
use App\Models\Habitaciones_users;
use App\Models\Hoteles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hoteles', [ 'hoteles' => Hoteles::all(), 'usuarios' => User::all()]);
    }

    public function nuevoHotel()
    {
        return view('hoteles.nuevoHotel');
    }

    public function hotelesCreador()
    {

        return view('hoteles.creadorHotel', ['hoteles' => Hoteles::where('usuario_id',Auth::user()->id)->get()]);
    }

    public function vistaReserva(User $user) 
    {
        //echo Hoteles::where('usuario_id', 3)->count();

        $habitaciones = Habitaciones_users::all();
  
        return view('habitaciones.vistaReserva', ['reservas' => $user->habitaciones()->get(), 'detalles'=>$habitaciones, 'usuarios'=>$user]);
    }

    public function regresar(Request $request) 
    {
        $ciudad = $request->input('ciudad');
        $fechaInicio = $request->input('fechaEntrada');
        $fechaSalida = $request->input('fechaSalida');
 
        return view('hoteles.reserva', ['hoteles' => Hoteles::where('ciudad', $ciudad)->get(), 'fechaEntrada' => $fechaInicio, 'fechaSalida' => $fechaSalida, 'ciudad'=>$ciudad]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formNuevoHotel', ['usuarios' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->flash();

        $hotel = new Hoteles();
        $creador = User::find($request->input('idUsuario'));

        $hotel->timestamps = false;

        $hotel->nombre = $request->input('nombre');
        $hotel->direccion = $request->input('direccion');
        $hotel->ciudad = $request->input('ciudad');
        $hotel->pais = $request->input('pais');
        $hotel->categoria = $request->input('categoria');
        $hotel->descripcion = $request->input('descripcion');
        $path = $request->file('imagen')->store('public');
        $hotel->imagen =  str_replace('public', 'storage', $path);
        

        if(Auth::user()->rol = "cliente"){

            $creador->rol = "creador";
            $hotel->usuario_id =  $request->input('idUsuario');
            $creador->save();
            $hotel->save();
            return redirect('/habitacion');
        }else{
            $hotel->usuario_id =  $request->input('propietario');
            $hotel->save();
            return redirect('/admin');
        }
         
    }

    /**
     * Display the specified resource.
     */
    public function show(Hoteles $hoteles)
    {
        return view('habitaciones.habitacion', ['hoteles' => $hoteles, 'habitaciones' => $hoteles->habitacion()->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hoteles $hoteles)
    {
        //
    }

    /**
     * 
     */
    public function filtroHoteles(Request $request)
    {
        $nombreHotel = $request->input('nombre');
        $estrella = $request->input('estrella');
        $ciudad = $request->input('ciudad');
        $fechaEntrada = $request->input('fechaEntrada');
        $fechaSalida = $request->input('fechaSalida');


        

        $hoteles = Hoteles::where('nombre', $nombreHotel)->orWhere('categoria',$estrella)->where('ciudad', $ciudad)->get();
        return view('hoteles.reserva', ['hoteles' => $hoteles, 'fechaEntrada' => $fechaEntrada, 'fechaSalida' => $fechaSalida, 'ciudad'=>$ciudad]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function reserva(Request $request)
    {
        $ciudad = $request->input('ciudad');
        $fechaInicio = $request->input('fecha_entrada');
        $fechaSalida = $request->input('fecha_salida'); 
   


        return view('hoteles.reserva', ['hoteles' => Hoteles::where('ciudad', $ciudad)->get(), 'fechaEntrada' => $fechaInicio, 'fechaSalida' => $fechaSalida, 'ciudad'=>$ciudad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hoteles $hoteles)
    {
        $hotel = Hoteles::find($hoteles->id);
        $hotel->timestamps = false;

        $hotel->nombre = $request->input('nombre');
        $hotel->direccion = $request->input('direccion');
        $hotel->ciudad = $request->input('ciudad');
        $hotel->pais = $request->input('pais');
        $hotel->categoria = $request->input('categoria');
        $hotel->descripcion = $request->input('descripcion');
        $hotel->usuario_id =  $request->input('propietario');


       
        $hotel->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hoteles $hoteles)
    {
        $hoteles->delete();

        $usuario = User::find(Auth::user()->id);

        if(Hoteles::where('usuario_id', Auth::user()->id)->count() <= 0){
            $usuario->rol="cliente";
            $usuario->save();
            return redirect('/habitacion');
        }else{
            return back();
        }
        
    }
}
