<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Profesor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">{{ $profesor->nombre }} {{ $profesor->apellidos }}</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 bg-gray-100 rounded shadow">
                        <p class="font-semibold"><strong>N. Carnet:</strong> {{ $profesor->id }}</p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded shadow">
                        <p class="font-semibold"><strong>Unidad Educativa:</strong> {{ $profesor->unidadEducativa->nombreUE ?? 'No asignada' }}</p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded shadow">
                        <p class="font-semibold"><strong>RDA:</strong> {{ $profesor->rda }}</p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded shadow">
                        <p class="font-semibold"><strong>Celular:</strong> {{ $profesor->celular }}</p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded shadow">
                        <p class="font-semibold"><strong>Correo Electrónico:</strong> {{ $profesor->correo }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="font-semibold"><strong>Documento RDA, Archivo PDF:</strong></p>
                    <div class="mt-2">
                        <a href="{{ route('profesores.pdf', $profesor->id) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Ver PDF</a>

                        <!--<a href="{{ asset('storage/' . $profesor->pdf_path) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Ver PDF</a>-->
                        <a href="{{ asset('storage/' . $profesor->pdf_path) }}" download class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Descargar PDF</a>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('profesores.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
