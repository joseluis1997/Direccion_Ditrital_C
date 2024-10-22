<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DIRECCION DISTRITAL CARAPARI') }}
        </h2>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar Profesor') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-40">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                    <form  action="{{ route('profesores.update', $profesore) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="carnet">{{ __('Numero de Carnet') }}</x-label>
                            <input 
                                type="text" 
                                id="carnet" 
                                name="ci" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                value="{{ old('ci', $profesore->ci) }}" 
                                required 
                                autofocus 
                                autocomplete="ci"
                            >
                        </div>
                        <div>
                            <x-label for="rda">{{ __('RDA Profesor') }}</x-label>
                            <input 
                                id="rda" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                type="text" 
                                name="rda" 
                                value="{{old('rda',$profesore->rda)}}" 
                                required 
                                autofocus 
                                autocomplete="rda"
                            >
                        </div>
                        <div>
                            <x-label for="nombre">{{ __('Nombre Profesor') }}</x-label>
                            <input 
                                id="nombre" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                type="text" 
                                name="nommbre" 
                                value="{{old('nommbre',$profesore->nommbre)}}" 
                                required 
                                autofocus 
                                autocomplete="nommbre"
                            >
                        </div>
                        <div>
                            <x-label for="apellidos">{{ __('Apellidos') }}</x-label>
                            <input 
                                id="apellidos" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                type="text" 
                                name="apellidos" 
                                value="{{old('apellidos',$profesore->apellidos)}}" 
                                required 
                                autofocus 
                                autocomplete="apellidos"
                            >
                        </div>                
                        <div>
                            <x-label for="celular">{{ __('Celular') }}</x-label>
                            <input 
                                id="celular" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                type="text" 
                                name="celular" 
                                value="{{old('celular',$profesore->celular)}}" 
                                required 
                                autofocus 
                                autocomplete="celular"
                            >
                        </div>
                        <div>
                            <x-label for="correo">{{ __('Correo Electronico') }}</x-label>
                            <input 
                                id="correo" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                type="text" 
                                name="correo" 
                                value="{{old('correo', $profesore->correo)}}" 
                                required 
                                autofocus 
                                autocomplete="correo"
                            >
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('profesores.index') }}">
                                {{ __('Cancelar') }}
                            </a>
                            <button class="bg-blue-600 text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 ms-4 p-2 transition duration-150 ease-in-out overflow-hidden hover:bg-blue-700">
                                {{ __('Modificar Profesor') }}
                            </button>
                        </div>

                    </form>
            </div>
        </div>
    </div>
</x-app-layout>