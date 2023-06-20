<x-app-layout>
    <div class="mt-4">
        <form action="/regresar" method="GET">
            @csrf
            <button class="text-blue-500 mr-1" style="margin-left: 130px; font-family: 'Open Sans', sans-serif;">
                <-Ver todos los alojamientos
              </button>
              <button>

            <input type="hidden" id="ciudad" name="ciudad" value="{{$ciudad}}">
            <input type="hidden" id="fechaEntradas" name="fechaEntrada" value="{{$fechaEntrada}}">
            <input type="hidden" id="fechaSalidas" name="fechaSalida" value="{{$fechaSalida}}">
        </form>
    </div>

    <div class="text-center mt-4">
        <img src="{{ asset($hoteles->imagen) }}" alt="Imagen del hotel" class="w-11/12 mx-auto" style="height: 600px;">
    </div>   
   

    <div style="padding-top: 20px;">
        <div class="row mx-auto justify-content-center" style="max-width: 80%;">
            <div class="col-md-12">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="mr-5 mb-2 text-center">
                                <label for="fechaEntrada">Fecha de entrada:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    <input type="text" class="form-control" id="fechaEntrada" name="fechaEntrada" value="{{$fechaEntrada}}">
                                </div>
                            </div>
                            <div class="mr-5 mb-2 text-center">
                                <label for="fechaSalida">Fecha de salida:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    <input type="text" class="form-control" id="fechaSalida" name="fechaSalida" value="{{$fechaSalida}}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button class="btn btn-primary d-none">Reservar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     
        
        <div class="row mx-auto mt-4 mb-4" style="max-width: 80%;">
            <h1 style="text-align: center; font-weight: bold; font-size: 34px; font-family: 'Poppins', sans-serif;">Habitaciones</h1>

            @foreach ($habitaciones as $habitacion)
                @if ($hoteles->id == $habitacion->hotel_id)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <form action="/hotel/habitacion/reservar" method="GET">
                            @csrf
                            <div class="card">
                                <img src="{{ asset($habitacion->imagen) }}" class="card-img-top" alt="Imagen" style="width: 100%; height: 50%" >
                                <div class="card-body">
                                    <h5 class="card-title">{{ $habitacion->descripcion }}</h5>
                               
                                        <p class="card-text mt-4"><strong>{{ $habitacion->precio }}€ por noche</strong></p>                  
                                        <button class="btn btn-danger mt-4 rounded-pill">Reservar</button>
                                    
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

        <x-footer />

        
    </div>
          

</x-app-layout>
