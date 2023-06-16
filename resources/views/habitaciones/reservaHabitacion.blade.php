<x-app-layout>
    <div class="mt-4">
        <form action="/regresar" method="GET">
            @csrf
            <button><i class="fas fa-arrow-left text-blue-500 mr-1" style="margin-left: 130px; font-family: 'Open Sans', sans-serif;"></i>Ver todos los alojamientos</button>
            <input type="hidden" id="ciudad" name="ciudad" value="{{$ciudad}}">
            <input type="hidden" id="fechaEntradas" name="fechaEntrada" value="{{$fechaEntrada}}">
            <input type="hidden" id="fechaSalidas" name="fechaSalida" value="{{$fechaSalida}}">
        </form>
    </div>

    <div class="text-center mt-4">
        <img src="{{ asset($hoteles->imagen) }}" alt="Imagen del hotel" class="w-11/12 mx-auto" style="height: 500px;">
    </div>   
   

    <div style="padding-top: 20px;">
        <div class="row mx-auto" style="max-width: 80%;">
            <div class="col-md-12">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex flex-wrap">
                            <div class="mr-5 mb-2">
                                <label for="fechaEntrada">Fecha de entrada:</label>
                                <input type="text" class="form-control" id="fechaEntrada" name="fechaEntrada" value="{{$fechaEntrada}}">
                            </div>
                            <div class="mr-5 mb-2">
                                <label for="fechaSalida">Fecha de salida:</label>
                                <input type="text" class="form-control" id="fechaSalida" name="fechaSalida" value="{{$fechaSalida}}">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-4">Buscar</button>
                </form>
            </div>
        </div>
        
        <div class="row mx-auto" style="max-width: 80%;">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#resumen">Resumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicio">Servicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#habitaciones">Habitaciones</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="row mx-auto mt-4 mb-4" style="max-width: 80%;">
            @foreach ($habitaciones as $habitacion)
                @if ($hoteles->id == $habitacion->hotel_id)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <form action="/hotel/habitacion/reservar" method="GET">
                            @csrf
                            <div class="card">
                                <img src="{{ asset($habitacion->imagen) }}" class="card-img-top" alt="Imagen">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $habitacion->descripcion }}</h5>
                                    <p class="card-text">Precio:{{ $habitacion->precio }}</p>
                                    <button class="btn btn-danger mt-4">Buscar</button>
                                </div>
                            </div>
                            
                            <input type="hidden" id="fechaEntradas" name="fechaEntrada" value="{{$fechaEntrada}}">
                            <input type="hidden" id="fechaSalidas" name="fechaSalida" value="{{$fechaSalida}}">
                            <input type="hidden" id="idHabitacion" name="idHabitacion" value="{{$habitacion->id}}">
                            <input type="hidden" id="idHoteles" name="idHoteles" value="{{$hoteles->id}}">
                            <input type="hidden" id="idCliente" name="idCliente" value="{{Auth::User()->id}}">
                            <input type="hidden" id="idCliente" name="idCliente" value="{{Auth::User()->id}}">
                        </form>
                    </div>
                @endif
            @endforeach
        </div> 
        
    </div>
          

</x-app-layout>
<footer class="bg-gray-800 py-4 pt-4" style="margin-top: -20px;">
    <div class="container mx-auto px-4 flex justify-center items-center">
        <p class="text-white text-center">© 2023 Todos los derechos reservados</p>
        <ul class="flex ml-4 space-x-4">
            <li><a href="#" class="text-white hover:text-gray-400">Inicio</a></li>
            <li><a href="#" class="text-white hover:text-gray-400">Acerca de</a></li>
            <li><a href="#" class="text-white hover:text-gray-400">Contacto</a></li>
        </ul>
    </div>
  </footer>