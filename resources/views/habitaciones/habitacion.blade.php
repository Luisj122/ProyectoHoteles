<x-app-layout>
    <x-slot name="header">
            <a href="/habitacion/nuevo/{{ $hoteles->id }}"><button type='button' class="bg-blue-400 hover:bg-blue-600 text-black py-2 px-4 rounded">Nuevo</button></a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 " >
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50" >
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tipo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Capacidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Precio
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Disponibilidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($habitaciones as $value)
                            <form method="POST" action='/habitacion/update/{{ $value->id }}' enctype="multipart/form-data">
                                @csrf
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">

                                        <select name="tipo">
                                            <option value="{{$value->tipo}}">{{$value->tipo}}</option>;
                                            <option value="Individual">Individual</option>
                                            <option value="Doble">doble</option>
                                            <option value="Suite">Suite</option>
                                         </select>
                                    </td>

                                    <td class="px-6 py-4">
                                        <textarea class="border-gray-300 focus:border-indigo-500  focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="descripcion" name="descripcion"  required autofocus autocomplete="descripcion" rows="1" cols="50">{{$value->descripcion}}</textarea>
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-text-input id="capacidad" class="block mt-1 w-full" type="number" name="capacidad" value="{{ $value->capacidad }}" required autofocus autocomplete="capacidad" />
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-text-input id="precio" class="block mt-1 w-full" type="number" name="precio" value="{{ $value->precio }}" required autofocus autocomplete="precio" />
                                    </td>

                                    <td class="px-6 py-4">
                                        <select name="disponibilidad">
                                            <option value="{{$value->disponibilidad}}">{{$value->disponibilidad}}</option>
                                            @if ($value->disponibilidad == "libre")
                                                <option value="ocupada">Ocupada</option>
                                            @else
                                                <option value="libre">Libre</option>      
                                            @endif
                                        </select>
                                        
                                    </td>


                                    <input type="hidden" name="hotel_id" id="hotel_id" value="{{ $value->hotel_id }}">
                                    

                                    <td class="flex justify-center items-center pt-4">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                            </svg>
                                        </button> 
                                        
                                        </form> 
                                    
                                        <a href="/habitacion/borrar/{{$value->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                        </a>

                                        <a href="/habitacion/detalle/{{$value->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>
                                        </a>
                                
                                    </td>                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

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
    