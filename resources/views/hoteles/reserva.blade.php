<x-app-layout>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="padding: 15px;">
                        <h5 class="card-title">Filtrador</h5>
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
                                    <i class="fas fa-star text-secondary"></i>
                                        @break

                                    @case("dos")
                                    <i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                                        @break

                                    @case("tres")
                                    <i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                                        @break

                                    @case("cuatro")
                                    <i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                                        @break

                                    @case("cinco")
                                    <i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
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
            
                                <input type="hidden" name="fechaEntrada" id="fechaEntrada" value="{{ $fechaEntrada }}">
                                <input type="hidden" name="fechaSalida" id="fechaSalida" value="{{ $fechaSalida }}">
                                <input type="hidden" name="ciudad" id="ciudad" value="{{ $ciudad }}">
      
                                <button class="btn btn-danger mt-4">Detalles</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        
            

            </div>
        </div>
    </div>

</x-app-layout>
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#" role="button"
          ><i class="fab fa-facebook-f"></i></a>
  
        <!-- Twitter -->
        <a
          class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#" role="button"
          ><i class="fab fa-twitter"></i></a>
  
        <!-- Google -->
        <a
          class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#" role="button"
          ><i class="fab fa-google"></i></a>
  
        <!-- Instagram -->
        <a
          class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#" role="button"
          ><i class="fab fa-instagram"></i></a>
  
        <!-- Linkedin -->
        <a
          class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#" role="button"
          ><i class="fab fa-linkedin-in"></i></a>
        <!-- Github -->
        <a
          class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Hoteles.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  