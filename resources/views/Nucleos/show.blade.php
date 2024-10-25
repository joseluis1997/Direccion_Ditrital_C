<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Núcleo') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="border-b border-gray-300 pb-4">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $nucleo->nombreNu }}</h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400"><strong>Código:</strong> {{ $nucleo->codigo }}</p>
                    <p class="text-lg text-gray-600 dark:text-gray-400"><strong>Descripción Geográfica:</strong> {{ $nucleo->descripcionG }}</p>
                </div>

                <h4 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Unidades Educativas:</h4>
                <ul class="mt-2 list-disc list-inside">
                    @foreach($nucleo->unidades as $unidad)
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>{{ $unidad->nombreUE }}</strong> (Código CIE: {{ $unidad->codigosie }})
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4">
                    <a href="{{ route('nucleos.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded transition duration-200">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
