<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DIRECCION DISTRITAL CARAPARI') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <form  action="{{ route('actividades.update', $actividad->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="nombreAct">{{ __('Nombre Actividad') }}</x-label>
                            <input 
                                type="text" 
                                id="nombreAct" 
                                name="nombreAct" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                required 
                                value="{{ old('nombreAct',$actividad->nombreAct) }}"
                                autofocus 
                                autocomplete="nombreAct"
                        >
                    </div>
                    <div>
                        <x-label for="fechaI">{{ __('Fecha Inicio') }}</x-label>
                            <input 
                                type="date" 
                                id="fechaI" 
                                name="fechaI" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                required 
                                value="{{ old('fechaI',$actividad->fechaI) }}"
                                autofocus 
                                autocomplete="fechaI"
                        >
                    </div>
                    <div>
                        <x-label for="fechaI">{{ __('Fecha Fin') }}</x-label>
                            <input 
                                type="date" 
                                id="fechaF" 
                                name="fechaF" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                required 
                                value="{{ old('fechaF',$actividad->fechaF) }}"
                                autofocus 
                                autocomplete="fechaF"
                        >
                    </div>
                    <div>
                        <x-label for="descripcionA">{{ __('Descripcion Actividad') }}</x-label>
                            <textarea 
                                type="text" 
                                id="descripcionA" 
                                name="descripcionA" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                required
                                autofocus 
                                autocomplete="descripcionA"
                        >{{ old('descripcionA',$actividad->descripcionA) }}</textarea>
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('actividades.index') }}">
                            {{ __('Cancelar') }}
                            </a>
                        <button class="bg-blue-600 text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 ms-4 p-2 transition duration-150 ease-in-out overflow-hidden hover:bg-blue-700">
                            {{ __('Modificar Actividad') }}
                        </button>
                    </div>
                </form> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>