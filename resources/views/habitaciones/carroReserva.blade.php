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

            <script src="https://www.paypal.com/sdk/js?client-id=AX02v2Go2PBLa25LvY-LwYHJu2qACOrgiNq7D330pOy7g4YAslw5KSkdLkE6NUkugdzXNVtK5ORgyXIg&currency=EUR">
            </script>

            <div id="paypal-button-conteiner"></div>
            <script>
                paypal.Buttons({
                    style:{
                        label: 'pay'
                    }, createOrder: function(data, actions){
                        return actions.order.create({
                            purchase_units: [{
                                amount:{
                                    value: {{$total}}
                                }
                            }]
                        })
                    },

                    onApprove:  function (data, actions){
                        actions.order.capture().then(function(detalles){
                            console.log(detalles);
                        });
                    },

                    onCancel:function(data){
                        alert("pago cancelado");
                        console.log(data);
                    }
                }).render('#paypal-button-conteiner');
            </script>

        </div>
    </div>


    {{-- <div class="row justify-content-center mt-5">
        <div class="col-md-6">
          <div class="text-center">
            <img src="ruta/a/tu/logo.png" alt="Logo" class="img-fluid">
            <h1 class="mt-4">¡Gracias por su compra!</h1>
            <p class="mt-4">Estimado cliente,</p>
            <p>Queremos agradecerle por su compra. Valoramos su confianza en nosotros y esperamos que disfrute de su producto/servicio.</p>
            <p>Si tiene alguna pregunta o necesita asistencia adicional, no dude en ponerse en contacto con nuestro equipo de atención al cliente.</p>
            <p>¡Gracias nuevamente y que tenga un excelente día!</p>
          </div>
        </div>
      </div> --}}
</x-app-layout>
