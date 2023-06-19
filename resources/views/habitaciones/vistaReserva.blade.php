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

<x-footer />