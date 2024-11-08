<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Método para indicar que es una actualización -->
                    
                    <div class="form-group mb-6">
                        <x-label for="unidad_educativa_id">{{ __('Unidad Educativa') }}</x-label>
                        <select name="unidad_educativa_id" id="unidad_educativa_id" class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" required>
                            @foreach($unidadesEducativas as $unidad)
                                <option value="{{ $unidad->id }}" {{ $estudiante->unidad_educativa_id == $unidad->id ? 'selected' : '' }}>
                                    {{ $unidad->nombreUE }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <h3 class="font-semibold text-lg">Grados y Paralelos</h3>
                    <!-- Repetir la estructura de grados y paralelos, preseleccionando los valores actuales -->
                    <!-- Ejemplo para Inicial -->
                    <div class="grid grid-cols-1 gap-4 mt-4">
                        <div class="flex flex-col border-b border-gray-300 pb-4 mb-4">
                            <span class="font-semibold">Inicial</span>
                            <div class="flex">
                                @foreach([1, 2, 3] as $grado)
                                    <label class="flex items-center mr-4">{{ $grado }}<input type="checkbox" name="grado[inicial][]" value="{{ $grado }}" class="mr-1" {{ in_array($grado, json_decode($estudiante->grado)->inicial ?? []) ? 'checked' : '' }}></label>
                                @endforeach
                            </div>
                            <div class="font-semibold text-lg">
                                <span class="font-semibold">Paralelos</span>
                                @foreach(['A', 'B', 'C'] as $paralelo)
                                    <label class="flex items-center"><input type="checkbox" name="paralelo[inicial][]" value="{{ $paralelo }}" class="mr-1" {{ in_array($paralelo, json_decode($estudiante->paralelos)->inicial ?? []) ? 'checked' : '' }}> {{ $paralelo }}</label>
                                @endforeach
                            </div>
                        </div>
                        <!-- Repite la misma estructura para Primaria y Secundaria -->
                    </div>

                    <div class="form-group mt-4">
                        <x-label for="cantidad">{{ __('Cantidad de Estudiantes') }}</x-label>
                        <input type="number" name="cantidad" id="cantidad" value="{{ $estudiante->cantidad }}" class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" required min="1">
                    </div>

                    <div class="form-group mt-4">
                        <x-label for="sexo">{{ __('Sexo') }}</x-label>
                        <select name="sexo" id="sexo" class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" required>
                            <option value="masculino" {{ $estudiante->sexo == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ $estudiante->sexo == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('estudiantes.index') }}">
                            {{ __('Cancelar') }}
                        </a>
                        <button type="submit" class="bg-blue-600 text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 ms-4 p-2 transition duration-150 ease-in-out overflow-hidden hover:bg-blue-700">
                            {{ __('Actualizar Estudiante') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
