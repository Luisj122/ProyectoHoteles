<x-app-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <form action="/hotel/habitacion/reservar/creada" method="GET">
                    @csrf

                    <h1 class="border-top">Datos del huésped</h1>
                    <div>                        
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cliente->nombre}}">
                        </div>
                    </div>

                    <h1 class="border-top">Datos de Contacto</h1>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cliente->nombre}}">
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" name="correo" id="correo" class="form-control" value="{{$cliente->email}}">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono Móvil:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" value="{{$cliente->telefono}}">
                    </div>


                    <input type="hidden" id="fechaEntradas" name="fechaEntrada" value="{{$fechaEntrada}}">
                            <input type="hidden" id="fechaSalidas" name="fechaSalida" value="{{$fechaSalida}}">
                            <input type="hidden" id="idHabitacion" name="idHabitacion" value="{{$habitacion->id}}">
                            <input type="hidden" id="idHoteles" name="idHoteles" value="{{$hoteles->id}}">
                            <input type="hidden" id="idCliente" name="idCliente" value="{{Auth::User()->id}}">
                            <input type="hidden" id="ciudad" name="ciudad" value="{{$ciudad}}">
                    

                    <div class="form-group">
                        <button class="btn btn-danger mt-4">Reservar</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset($hoteles->imagen) }}" class="card-img-top" alt="Nombre de la imagen">
                    <div class="card-body">
                        <p class="card-text">{{$hoteles->nombre}}</p>
                        <p class="card-text">{{$habitacion->descripcion}}</p>
                        <p class="card-text">Del {{$fechaEntrada}} al {{$fechaSalida}} ({{$dias}} noches)</p>
                        <p class="card-text">{{$hoteles->direccion}}</p>
                        <p class="card-text">Precio Total: {{$total}} €</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
