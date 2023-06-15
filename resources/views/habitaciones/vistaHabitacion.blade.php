<x-app-layout>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
            @foreach ($habitaciones as $habitacion)
        
                <div class="card" style="width: 18rem;">
                  <br>
                    <h1 class="card-title text-center font-weight-bold">{{$habitacion->tipo}}</h1><br>
                    <img src="{{ asset($habitacion->imagen) }}" class="img-fluid " />
                    <div class="card-body">
                    <p class="card-text">{{$habitacion->capacidad}}</p>

                    <p class="card-text font-weight-bold">{{$habitacion->precio}}€</p>
                    
                    </div>
                    <div class="buttons">
                        <a href="/pedido/{{Auth::user()->id}}/restaurante/{{$habitacion->id}}" class="btn btn-secondary">Hacer Pedido</a>
                    </div><br>
                </div>
                <br><br><br><br>
            
        @endforeach
        </div>
      </div>
 </x-app-layout>
 <footer class="bg-gray-800 py-4 pt-4" style="margin-top: -20px;">
    <div class="container mx-auto px-4 flex justify-center items-center">
        <p class="text-white text-center">© 2023 Todos los derechos reservados</p>
        <ul class="flex ml-4 space-x-4">
            <li><a href="#" class="text-white hover:text-gray-400">Inicio</a></li>
            <li><a href="#" class="text-white hover:text-gray-400">Acerca de</a></li>
            <li><a href="#" class="text-white hover:text-gray-400">Contacto</a></li>
        </ul>
    </div>
  </footer>