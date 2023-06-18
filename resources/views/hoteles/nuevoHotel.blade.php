<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h3 class='text-lg text-green-500 mb-4'>Nuevo Hotel</h3>

                    <form class="bg-white px-8 pt-6 pb-8 mb-4" method="POST" action="/hoteles/nuevo" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700">Nombre:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Direccion:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="direccion" name="direccion" type="text" value="{{ old('direccion') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Ciudad:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="ciudad" name="ciudad" type="text" value="{{ old('ciudad') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Pais:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="pais" name="pais" type="text" value="{{ old('pais') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Calificacion:</label>
                            <select name="categoria" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                                <option value="uno">Uno</option>
                                <option value="dos">Dos</option>
                                <option value="tres">Tres</option>
                                <option value="cuatro">Cuatro</option>
                                <option value="cinco">Cinco</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Descripcion:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="descripcion" name="descripcion" type="text" value="{{ old('descripcion') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Imagen:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="imagen" name="imagen" type="file" value="{{ old('imagen') }}" required>
                        </div>

                        <input type="hidden" name="idUsuario" id="idUsuario" value="{{ Auth::User()->id }}">

                        <div class="flex justify-start">
                            <button class="btn btn-danger mt-4">Crear Hotel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    </div>
</x-app-layout>
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
