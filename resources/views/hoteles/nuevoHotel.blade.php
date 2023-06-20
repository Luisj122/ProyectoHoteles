<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h3 class='text-lg text-green-500 mb-4'>Nuevo Hotel</h3>

                    <form class="bg-white px-8 pt-6 pb-8 mb-4" method="POST" action="/hoteles/nuevo" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block">Nombre:</label>
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

<x-footer />
