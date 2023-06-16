<x-app-layout>
    <x-slot name="header">
            <a href="/hotel/nuevo/"><button type='button' class="bg-blue-400 hover:bg-blue-600 text-black py-2 px-4 rounded">Nuevo</button></a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500" >
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Direccion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ciudad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pais
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Categoria
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Accion
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hoteles as $value)
                            <form method="POST" action='/hotel/update/{{ $value->id }}' enctype="multipart/form-data">
                                @csrf
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $value->nombre }}" required autofocus autocomplete="nombre" />
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" value="{{ $value->direccion }}" required autofocus autocomplete="direccion" />
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" value="{{ $value->ciudad }}" required autofocus autocomplete="ciudad" />
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" value="{{ $value->pais }}" required autofocus autocomplete="pais" />
                                    </td>

                                    <td class="px-6 py-4">

                                        <select name="categoria">
                                            <option value="{{ $value->categoria }}">
                                                {{ $value->categoria }}
                                            </option>
                                            <option value="uno">Uno</option>
                                            <option value="dos">Dos</option>
                                            <option value="tres">Tres</option>
                                            <option value="cuatro">Cuatro</option>
                                            <option value="cinco">Cinco</option>
                                        </select>
                                    </td>

                                    <td class="px-6 py-4">
                                        <textarea class="border-gray-300  focus:border-indigo-500 0 focus:ring-indigo-500  rounded-md shadow-sm block mt-1 w-full" id="descripcion" name="descripcion"  required autofocus autocomplete="descripcion" rows="1" cols="50">{{$value->descripcion}}</textarea>
                                    </td>

                                    <td class="flex justify-center items-center pt-4">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                            </svg>
                                        </button> 
                                        
                                        </form> 
                                    
                                        <a href="/hotel/borrar/{{$value->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                        </a>

                                        <a href="/hotel/detalle/{{$value->id}}">
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