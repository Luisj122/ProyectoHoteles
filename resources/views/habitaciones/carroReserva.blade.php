<x-app-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="/hotel/habitacion/reservar/creada" method="GET">
                    @csrf
                  
                    <h1 class="border-top">Datos del huésped</h1>
                    <div>
                      <div class="form-group mt-2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cliente->nombre}}">
                      </div>
                    </div>
                  
                    <h1 class="border-top mt-2">Datos de Contacto</h1>
                    <div class="form-group mt-2">
                      <label for="nombre">Nombre:</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cliente->nombre}}">
                    </div>
                  
                    <div class="form-group mt-2">
                      <label for="correo">Correo Electrónico:</label>
                      <input type="email" name="correo" id="correo" class="form-control" value="{{$cliente->email}}">
                    </div>
                  
                    <div class="form-group mt-2">
                      <label for="telefono">Teléfono Móvil:</label>
                      <input type="text" name="telefono" id="telefono" class="form-control" value="{{$cliente->telefono}}">
                    </div>
                  
                    <input type="hidden" id="fechaEntradas" name="fechaEntrada" value="{{$fechaEntrada}}">
                    <input type="hidden" id="fechaSalidas" name="fechaSalida" value="{{$fechaSalida}}">
                    <input type="hidden" id="idHabitacion" name="idHabitacion" value="{{$habitacion->id}}">
                    <input type="hidden" id="idHoteles" name="idHoteles" value="{{$hoteles->id}}">
                    <input type="hidden" id="idCliente" name="idCliente" value="{{Auth::User()->id}}">
                    <input type="hidden" id="ciudad" name="ciudad" value="{{$ciudad}}">
                  
                    <div class="form-group mt-2">
                      <button id="myButton" class="btn btn-danger d-none">Reservar</button>
                    </div>

                    <div class="mt-4" id="paypal-button-conteiner"></div>
                  </form>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="card" style="width: 24rem;">
                    <img src="{{ asset($hoteles->imagen) }}" class="card-img-top" alt="Nombre de la imagen" style="height: 200px;">
                    <div class="card-body">
                        <p class="card-text"><strong>{{$hoteles->nombre}}</strong></p>
              
                            <p class="card-text">
                                @switch($hoteles->categoria )
                                    @case("uno")
                                        <i class="fas fa-star text-warning"></i>
                                        @break
                                    @case("dos")
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        @break
                                    @case("tres")
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        @break
                                    @case("cuatro")
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        @break
                                    @case("cinco")
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        @break
                                    @default
                                @endswitch
                            </p>
                
                        <p class="card-text border-top mt-4" style="font-family: 'Noto Sans KR', sans-serif;">{{$habitacion->descripcion}}</p>
                        <p class="card-text" style="font-family: 'Noto Sans KR', sans-serif;">Del {{$fechaEntrada}} al {{$fechaSalida}} ({{$dias}} noches)</p>
                        <p class="card-text" style="font-family: 'Noto Sans KR', sans-serif;">{{$hoteles->direccion}}</p>
                        <div class="text-center">
                            <p class="card-text border-top mt-4" >Precio Total:</p>
                            <p class="card-text text-success" style="font-family: 'Poppins', sans-serif;">{{$total}} €</p>

                        </div>
                    </div>
                </div>
            </div>
            
            

            <script src="https://www.paypal.com/sdk/js?client-id=AX02v2Go2PBLa25LvY-LwYHJu2qACOrgiNq7D330pOy7g4YAslw5KSkdLkE6NUkugdzXNVtK5ORgyXIg&currency=EUR">
            </script>

            <script>
                paypal.Buttons({
                    style: {
                        label: 'pay',
                    },
                    createOrder: function (data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: {{$total}}
                                }
                            }]
                        });
                    },
                    onApprove: function (data, actions) {
                        actions.order.capture().then(function (details) {
                            document.getElementById("myButton").click();
                        });
                    },
                    onCancel: function (data) {

                    }
                }).render('#paypal-button-conteiner');
            </script>
        </div>
       

    </div>
</x-app-layout>
<x-footer />