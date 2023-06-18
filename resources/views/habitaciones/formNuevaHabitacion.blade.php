<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg">Nuevo Habitacion</h3>
                    
                    <form class="px-8 py-6 mb-4" method="POST" action="/habitacion/store/{{ $hoteles->id }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Tipo:</label>
                            <select name="tipo" class="block w-full border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                                <option value="Individual">Individual</option>
                                <option value="Doble">Doble</option>
                                <option value="Suite">Suite</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Descripción:</label>
                            <input class="block w-full border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" id="descripcion" name="descripcion" type="text" value="{{ old('descripcion') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Capacidad:</label>
                            <input class="block w-full border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" id="capacidad" name="capacidad" type="text" value="{{ old('capacidad') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Precio:</label>
                            <input class="block w-full border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" id="precio" name="precio" type="text" value="{{ old('precio') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Imagen:</label>
                            <input class="block w-full border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" id="imagen" name="imagen" type="file" value="{{ old('imagen') }}" required>
                        </div>

                        <input type="hidden" name="hotel_id" id="hotel_id" value="{{ $hoteles->id }}">
            
                        <div class="flex justify-start">
                            <button class="btn btn-danger mt-4">Crear Habitación</button>
                        </div>
                    </form>
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
    </div>
</x-app-layout>


