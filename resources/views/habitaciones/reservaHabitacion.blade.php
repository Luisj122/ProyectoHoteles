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
                            <button class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
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

        
    </div>
          

</x-app-layout>
