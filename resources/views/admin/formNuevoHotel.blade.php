<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <h3 class='text-lg text-green-500 mb-4'>Nuevo Hotel</h3>
                    
                    <form method='POST' action='/hoteles/store' enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label>Nombre:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-4">
                            <label>Direccion:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="direccion" name="direccion" type="text" value="{{ old('direccion') }}" required>
                        </div>

                        <div class="mb-4">
                            <label>Ciudad:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="ciudad" name="ciudad" type="text" value="{{ old('ciudad') }}" required>
                        </div>

                        <div class="mb-4">
                            <label>Pais:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="pais" name="pais" type="text" value="{{ old('pais') }}" required>
                        </div>

                        <div class="mb-4">
                            <label>Categoria:</label>
                            <select name="categoria">
                                <option value="uno">Uno</option>
                                <option value="dos">Dos</option>
                                <option value="tres">Tres</option>
                                <option value="cuatro">Cuatro</option>
                                <option value="cinco">Cinco</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label>Descripcion:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="descripcion" name="descripcion" type="text" value="{{ old('descripcion') }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label>Imagen:</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="imagen" name="imagen" type="file" value="{{ old('imagen') }}" required>
                        </div>

                        <div class="mb-4">
                            <label>Propietario:</label>
                            <select name="propietario">
                                @foreach ($usuarios as $value)
                                    <option value="{{ $value->id}}">{{$value->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="flex justify-start">
                            <button class="btn btn-danger mt-4">Crear Hotel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
