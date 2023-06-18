<x-app-layout>
    <div class="row mx-auto pt-4" style="max-width: 80%;">
        @foreach ($reservas as $reserva)
            @foreach ($detalles as $detalle)
                @if ($reserva->id == $detalle->habitaciones_id && $detalle->fecha_salida > now())

                {{-- Controlar si la fecha de la reserva expira la habitacion se pasa a ser libre --}}
                @php
        
                    if ($detalle->fecha_salida < now()) {
                        $habitacion = \App\Models\Habitaciones::find($detalle->habitaciones_id);
                            $habitacion->disponibilidad = "libre";
                            $habitacion->save();
                           
                        $detalle->delete();

                    }
                @endphp

                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="{{ asset($reserva->imagen) }}" class="card-img-top" alt="Imagen">
                                <div class="card-body p-3">
                                    <p class="card-text" style="font-family: 'Noto Sans', sans-serif;
                                    font-family: 'Roboto', sans-serif;">DNI: {{ $usuarios->dni }}</p>
                                    <p class="card-text" style="font-family: 'Noto Sans', sans-serif;
                                    font-family: 'Roboto', sans-serif;">Estado: {{ $detalle->estado }}</p>
                                    <p class="card-text" style="font-family: 'Noto Sans', sans-serif;
                                    font-family: 'Roboto', sans-serif;">Entrada: {{ $detalle->fecha_entrada }}</p>
                                    <p class="card-text" style="font-family: 'Roboto', sans-serif;">Salida: {{ $detalle->fecha_salida }}</p>
                                            @php
                                                $fechaInicio = \Carbon\Carbon::parse($detalle->fecha_entrada);
                                                $fechaFin = \Carbon\Carbon::parse($detalle->fecha_salida);
                                                $diasTranscurridos = $fechaInicio->diffInDays($fechaFin);
                                            @endphp
                                    <p class="card-text" style="font-family: 'Roboto', sans-serif;">Duracion: {{ $diasTranscurridos }} noches</p>
                                        <a href="/cancelar/reserva/{{$detalle->id}}" class="btn btn-outline-danger mt-2">
                                            Cancelar reserva
                                        </a>
                                </div>
                        </div>
                    </div>
                @endif
            @endforeach         
        @endforeach

        
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