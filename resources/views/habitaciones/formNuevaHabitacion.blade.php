<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg text-green-500">Nuevo Habitacion</h3>
                    
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
