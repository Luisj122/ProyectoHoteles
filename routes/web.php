<?php

use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\ProfileController;
use App\Models\Habitaciones;
use App\Models\Hoteles;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $hoteles = Hoteles::all();
       
        $hotelCiudad = $hoteles->pluck('ciudad')->toArray();
        $uniqueHotelNames = array_unique($hotelCiudad);        

        return view('habitaciones.vistaInicio', ['habitaciones' => Habitaciones::all(), 'hoteles' => $uniqueHotelNames]);
});
   

        



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/habitacion', [HabitacionesController::class, 'index']);
    Route::post('/reserva/habitacion',[HotelesController::class, 'reserva']);
    Route::get('/detalle/reserva/{hoteles}', [HabitacionesController::class, 'detalle']);
    Route::get('/hotel/habitacion/reservar/creada', [HabitacionesController::class, 'detalleReserva']);
    Route::get('/hotel/habitacion/reservar', [HabitacionesController::class, 'carroReserva']);
    Route::get('/filtro/hoteles', [HotelesController::class, 'filtroHoteles']);
    Route::get('/nuevo/hotel', [HotelesController::class, 'nuevoHotel']);
    Route::post('/hoteles/nuevo', [HotelesController::class, 'store']);
    Route::get('/reservas/cliente/{user}', [HotelesController::class, 'vistaReserva']);
    Route::get('/regresar', [HotelesController::class, 'regresar']);
    Route::get('/cancelar/reserva/{habitaciones_users}', [HabitacionesController::class, 'cancelarReserva']);


});

Route::middleware(['auth', 'rol:creador'])->group(function () {
    Route::get('/creador', [HotelesController::class, 'hotelesCreador']); 
    Route::get('/hotel/borrar/{hoteles}' , [HotelesController::class, 'destroy']);
    Route::post('/hotel/update/{hoteles}' , [HotelesController::class, 'update']);
    Route::get('/hotel/detalle/{hoteles}' , [HotelesController::class, 'show']);
    Route::post('/habitacion/update/{habitaciones}',[HabitacionesController::class, 'update']);

});


Route::middleware(['auth', 'rol:admin'])->group(function () {
    //Rutas para la gestion de hoteles del rol admin
    Route::get('/admin', [HotelesController::class, 'index']);
    Route::get('/hotel/nuevo', [HotelesController::class, 'create']);
    Route::post('/hoteles/store',[HotelesController::class, 'store']);
    Route::get('/hotel/borrar/{hoteles}' , [HotelesController::class, 'destroy']);
    Route::post('/hotel/update/{hoteles}' , [HotelesController::class, 'update']);
    Route::get('/hotel/detalle/{hoteles}' , [HotelesController::class, 'show']);

    //Rutas para la gestion de habitaciones
    Route::get('/habitacion/nuevo/{hotel}', [HabitacionesController::class, 'create']);
    Route::post('/habitacion/store/{hotel}',[HabitacionesController::class, 'store']);
    Route::post('/habitacion/update/{habitaciones}',[HabitacionesController::class, 'update']);

});

require __DIR__.'/auth.php';
