<x-app-layout>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="padding: 15px;">
                        <h5 class="card-title"><strong>Filtrador</strong></h5>
                        <form action="/filtro/hoteles" method="GET">
                            @csrf 
                            <div class="form-group mt-4">
                                <label for="filtro-nombre"><strong>Buscar por nombre:</strong></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del hotel">
                            </div>
                            <div class="form-group mt-4">
                                <label for="filtro-estrellas"><strong>Filtrar por estrellas:</strong></label>
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-light">
                                        <input type="radio" name="estrella" value="uno" autocomplete="off">
                                        <span class="text-secondary mr-1">1 <i class="fas fa-star text-secondary"></i></span>
                                    </label>
                                    <label class="btn btn-light">
                                        <input type="radio" name="estrella" value="dos" autocomplete="off">
                                        <span class="text-secondary mr-1">2 <i class="fas fa-star text-secondary"></i></span>
                                    </label>
                                    <label class="btn btn-light">
                                        <input type="radio" name="estrella" value="tres" autocomplete="off">
                                        <span class="text-secondary mr-1">3 <i class="fas fa-star text-secondary"></i></span>
                                    </label>
                                    <label class="btn btn-light">
                                        <input type="radio" name="estrella" value="cuatro" autocomplete="off">
                                        <span class="text-secondary mr-1">4 <i class="fas fa-star text-secondary"></i></span>
                                    </label>
                                    <label class="btn btn-light">
                                        <input type="radio" name="estrella" value="cinco" autocomplete="off">
                                        <span class="text-secondary mr-1">5 <i class="fas fa-star text-secondary"></i></span>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" id="fechaEntrada" name="fechaEntrada" value="{{$fechaEntrada}}">
                            <input type="hidden" id="fechaSalida" name="fechaSalida" value="{{$fechaSalida}}">
                            <input type="hidden" id="ciudad" name="ciudad" value="{{$ciudad}}">
                            <button class="btn btn-danger mt-4">Buscar</button>

                        </form>
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-md-9">
             
                @foreach ($hoteles as $value)
                  @php
                    $habitaciones = App\Models\Habitaciones::where('hotel_id', $value->id)->get();
                    $cont = $habitaciones->count();
                  @endphp

                  @if ($cont != 0 && $value->usuario_id != Auth::user()->id)
                  <form action='/detalle/reserva/{{ $value->id}}' method="GET" enctype="multipart/form-data">
                        @csrf 
                    <div class="card mb-4 ">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset($value->imagen) }}" class="card-img img-fluid rounded" alt="Imagen" style="object-fit: cover; height: 100%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                  
                        
                                    <h1 class="card-title" style="font-family: 'Noto Sans', sans-serif;
                                    font-family: 'Roboto', sans-serif;"><strong>{{ $value->nombre }}</strong></h3>
                                    @switch($value->categoria )
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
                      
                                    <p class="card-text" style="font-family: 'Montserrat', sans-serif;
                                    font-family: 'Noto Sans', sans-serif;
                                    font-family: 'Roboto', sans-serif;">{{ $value->ciudad }}</p>
                                    <p class="card-text" style="font-family: 'Montserrat', sans-serif;
                                    font-family: 'Noto Sans', sans-serif;
                                    font-family: 'Roboto', sans-serif;">{{ $value->pais }}</p>

                                    <p class="card-text" style="font-family: 'Montserrat', sans-serif;
                                    font-family: 'Noto Sans', sans-serif;
                                    font-family: 'Roboto', sans-serif;">{{ $value->descripcion }}</p>

                                      

                                      @if ($cont <= 5 && $cont >= 1)
                                          <p class="text-danger"><strong>¡Solo quedan {{$cont}} habitaciones!</strong></p>
                                      @endif

                
                                    <input type="hidden" name="fechaEntrada" id="fechaEntrada" value="{{ $fechaEntrada }}">
                                    <input type="hidden" name="fechaSalida" id="fechaSalida" value="{{ $fechaSalida }}">
                                    <input type="hidden" name="ciudad" id="ciudad" value="{{ $ciudad }}">
          
                                    <button class="btn btn-danger mt-4">Buscar</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                      
                  @endif
                
            @endforeach

      
                  
            </div>
        </div>

        
    </div>

<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted" style="margin-top: auto;">
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
              <i class="fas fa-gem me-3"></i>Hoteles
            </h6>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dignissimos magnam harum quibusdam doloribus voluptas accusamus illo voluptates ipsam delectus.
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
              <a href="#!" class="text-reset">SQL</a>
            </p>
            <p>
              <a href="#!" class="text-reset">JAVASCRIPT</a>
            </p>
            <p>
              <a href="#!" class="text-reset">LARAVAEL</a>
            </p>
            <p>
              <a href="#!" class="text-reset">PHP</a>
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
            <p><i class="fas fa-home me-3"></i> Pulpi, Calle, ES</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              luis@gmail.com
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
      © 2023 Hoteles. All rights reserved.
    </div>
  </footer>
  <!-- Footer -->

</x-app-layout>
