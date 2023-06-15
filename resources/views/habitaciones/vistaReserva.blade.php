<x-app-layout>
    <div class="row mx-auto pt-4" style="max-width: 80%;">
        @foreach ($reservas as $reserva)
            @foreach ($detalles as $detalle)
                @if ($reserva->id == $detalle->habitaciones_id && $detalle->fecha_salida > now())
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

  <footer class="bg-gray-800 py-4" style="margin-top: -20px;">
    <div class="container mx-auto px-4 flex justify-center items-center">
        <p class="text-white text-center">© 2023 Todos los derechos reservados</p>
        <ul class="flex ml-4 space-x-4">
            <li><a href="#" class="text-white hover:text-gray-400">Inicio</a></li>
            <li><a href="#" class="text-white hover:text-gray-400">Acerca de</a></li>
            <li><a href="#" class="text-white hover:text-gray-400">Contacto</a></li>
        </ul>
    </div>
  </footer>