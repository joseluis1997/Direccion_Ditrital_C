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

                <form  action="{{ route('nucleos.store') }}" method="post">
                    @csrf
                    <div>
                        <x-label for="nombreNu">{{ __('Numero del Nucleo') }}</x-label>
                            <input 
                                type="text" 
                                id="nombreNu" 
                                name="nombreNu" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                required 
                                autofocus 
                                autocomplete="nombreNu"
                        >
                    </div>
                    <div>
                        <x-label for="codigo">{{ __('Codigo Cie') }}</x-label>
                            <input 
                                type="text" 
                                id="codigo" 
                                name="codigo" 
                                class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full p-2 transition duration-150 ease-in-out" 
                                required 
                                autofocus 
                                autocomplete="codigo"
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
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('nucleos.index') }}">
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