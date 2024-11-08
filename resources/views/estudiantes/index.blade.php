<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DIRECCION DISTRITAL CARAPARI') }}
        </h2>
    </x-slot>

    <div id="message" style="display:none; position:fixed; top:20px; right:20px; background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; z-index: 1000;">
        Eliminado correctamente.
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="mb-4">
                        <a href="{{ route('estudiantes.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Nuevo Estudiante</a>
                        <a href="{{ route('estudiantes.reporte') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">Ver Reporte de Estudiantes</a>
                    </div>

                    <!-- Tabla de Estudiantes -->
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Unidad Educativa</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nivel</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Grado</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Paralelo</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Total Hombres</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Total Mujeres</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estudiantes->groupBy('unidad_educativa_id') as $unidadEducativaId => $estudiantesUE)
                                @foreach($estudiantesUE->groupBy('nivel') as $nivel => $estudiantesNivel)
                                    @foreach($estudiantesNivel->groupBy('grado') as $grado => $estudiantesGrado)
                                        @foreach($estudiantesGrado->groupBy('paralelo') as $paralelo => $estudiantesParalelo)
                                            <tr>
                                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                    {{ $estudiantesParalelo->first()->unidadEducativa->nombreUE }}
                                                </td>
                                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                    @switch($nivel)
                                                        @case('inicial')
                                                            Inicial
                                                            @break
                                                        @case('primaria')
                                                            Primaria
                                                            @break
                                                        @case('secundaria')
                                                            Secundaria
                                                            @break
                                                        @default
                                                            Otro
                                                    @endswitch
                                                </td>
                                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                    @if($nivel == 'inicial')
                                                        {{ $grado }}º, Inicial
                                                    @endif
                                                    @if($nivel == 'primaria')
                                                        {{ $grado }}º, Prim.
                                                    @endif
                                                    @if($nivel == 'secundaria')
                                                        {{ $grado }}º, Sec..
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                    {{ $paralelo }}
                                                </td>
                                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                    <!--{{ $estudiantesParalelo->where('sexo', 'Hombre')->sum('cantidad_hombres') }}-->
                                                    {{ $estudiantesParalelo->sum('cantidad_hombres') }}
                                                </td>
                                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                                    <!--{{ $estudiantesParalelo->where('sexo', 'Mujer')->sum('cantidad_mujeres') }}-->
                                                    {{ $estudiantesParalelo->sum('cantidad_mujeres') }}
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    <div class="flex justify-center">
                                                        <a href="{{ route('estudiantes.edit', $estudiantesParalelo->first()->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $estudiantesParalelo->first()->id }}')">Eliminar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        const confirmation = confirm("¿Estás seguro de eliminar el estudiante seleccionado?");
        
        if (confirmation) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/estudiantes/' + id;
            form.innerHTML = '@csrf @method("DELETE")'; // Asegúrate de que esto funcione en tu entorno
            document.body.appendChild(form);
            form.submit();

            // Mostrar mensaje flotante
            const message = document.getElementById('message');
            message.style.display = 'block';

            // Ocultar mensaje después de 3 segundos
            setTimeout(() => {
                message.style.display = 'none';
            }, 3000);
        } else {
            console.log("Eliminación cancelada.");
        }
    }
</script>

