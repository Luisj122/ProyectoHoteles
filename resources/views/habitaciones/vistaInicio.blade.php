<x-app-layout>
  <div class="flex flex-col min-h-screen">
      <div class="container py-4">
          <form class="row g-3 align-items-center mt-4" method="POST" action="/reserva/habitacion" enctype="multipart/form-data">
              @csrf
              <div class="col-md-4">
                  <label for="ciudad" class="form-label">¿A dónde quieres ir?</label>
                  <select id="ciudad" class="form-select form-control form-control-lg" name="ciudad">
                      @foreach ($hoteles as $value)
                          <option value="{{ $value }}">{{ $value }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-4">
                  <label for="fecha1" class="form-label">Fecha entrada</label>
                  <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" value="{{ old('fecha_entrada') }}" min="{{ date('Y-m-d') }}" required>
              </div>
              <div class="col-md-4">
                  <label for="fecha2" class="form-label">Fecha salida</label>
                  <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ old('fecha_salida') }}" min="{{ date('Y-m-d') }}" required>
              </div>
              <div class="col-md-4">
                  <button class="btn btn-danger">Buscar</button>
              </div>
          </form>
      </div>

      <x-footer />


  
  </div>

  
</x-app-layout>
