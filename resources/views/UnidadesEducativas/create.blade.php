<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('DIRECCION DISTRITAL CARAPARI') }}
        </h2>
    </x-slot>
<br>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form  action="{{ route('UnidadesEducativas.store') }}" method="post">
                            @csrf
                            <div>
                                <x-label for="id_nucleo">{{ __('Núcleo') }}</x-label>
                                <select 
                                    id="id_nucleo" 
                                    name="id_nucleo" 
                                    class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                    required
                                >
                                    <option value="">Seleccione un núcleo</option>
                                    @foreach($nucleos as $nucleo)
                                        <option value="{{ $nucleo->id }}">{{ $nucleo->nombreNu }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-label for="nombreUE">{{ __('Nombre Unidad Educativa') }}</x-label>
                                    <input 
                                        type="text" 
                                        id="nombreUE" 
                                        name="nombreUE" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="nombreUE"
                                >
                            </div>
                            <div>
                                <x-label for="nombreDir">{{ __('Nombre Director') }}</x-label>
                                    <input 
                                        type="text" 
                                        id="nombreDir" 
                                        name="nombreDir" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="nombreDir"
                                >
                            </div>
                            <div>
                                <x-label for="nombreJE">{{ __('Nombre Junta Escolar') }}</x-label>
                                    <input 
                                        type="text" 
                                        id="nombreJE" 
                                        name="nombreJE" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="nombreJE"
                                >
                            </div>
                            <div>
                                <x-label for="codigosie">{{ __('Codigo Cie') }}</x-label>
                                    <input 
                                        type="text" 
                                        id="codigosie" 
                                        name="codigosie" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="codigosie"
                                >
                            </div>
                            <div>
                                <x-label for="nivelEd">{{ __('Niveles Educativos') }}</x-label>
                                <div class="mt-2 space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="nivelEd[]" value="Inicial" class="form-checkbox h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <span class="ml-2 text-gray-700">Inicial</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="nivelEd[]" value="Primaria" class="form-checkbox h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <span class="ml-2 text-gray-700">Primaria</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="nivelEd[]" value="Secundaria" class="form-checkbox h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <span class="ml-2 text-gray-700">Secundaria</span>
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <x-label for="cantidadE">{{ __('Cantidad Estudiantes') }}</x-label>
                                    <input 
                                        type="text" 
                                        id="cantidadE" 
                                        name="cantidadE" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="cantidadE"
                                >
                            </div>
                            <div>
                                <x-label for="cantidadM">{{ __('Cantidad Estudiantes Mujeres') }}</x-label>
                                    <input 
                                        type="text" 
                                        id="cantidadM" 
                                        name="cantidadM" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="cantidadM"
                                >
                            </div>
                            <div>
                                <x-label for="cantidadM">{{ __('Cantidad Estudiantes Hombres') }}</x-label>
                                    <input 
                                        type="text" 
                                        id="cantidadV" 
                                        name="cantidadV" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="cantidadV"
                                >
                            </div>
                            <div>
                                <x-label for="descripcionG">{{ __('Descripcion') }}</x-label>
                                    <textarea 
                                        type="text" 
                                        id="descripcionG" 
                                        name="descripcionG" 
                                        class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                        required 
                                        autofocus 
                                        autocomplete="descripcionG"
                                    ></textarea>
                            </div>
                            <div class="flex items-center justify-center mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('UnidadesEducativas.index') }}">
                                    {{ __('Cancelar') }}
                                </a>
                                <button class="bg-blue-600 text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 ms-4 p-2 transition duration-150 ease-in-out overflow-hidden hover:bg-blue-700">
                                        {{ __('Registrar Nucleo') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
