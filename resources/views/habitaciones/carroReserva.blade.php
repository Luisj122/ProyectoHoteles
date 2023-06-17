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
                                        <i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                                        @break
                                    @case("tres")
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        @break
                                    @case("cuatro")
                                        <i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                                        @break
                                    @case("cinco")
                                        <i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
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



<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->