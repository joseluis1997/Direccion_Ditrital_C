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
                        <a href="{{ route('UnidadesEducativas.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Nueva Unidad Educativa</a>
                    </div>
                    <div class="overflow-x-auto" style="max-height: 400px;">
                        <table id="miDataTable" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombre U.E.</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombre D.</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombre Junta E.</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Codigo Sie</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nivel Educativo</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Cantidad Est.</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Cantidad M.</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Descripcion Geo.</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nucleo</th>
                                    <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($UnidadesEd as $UnidadEd)
                                <tr>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->id }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->nombreUE }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->nombreDir }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->nombreJE }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->codigosie }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->nivelEd }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->cantidadE }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->cantidadM }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->descripcionG }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $UnidadEd->nucleo->nombreNu }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('UnidadesEducativas.edit', $UnidadEd->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded">Editar</a>
                                            <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $UnidadEd->id }}')">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function confirmDelete(id) {
        const confirmation = confirm("¿Estás seguro de eliminar la Unidad Educativa seleccionado?");
            
            if (confirmation) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/UnidadesEducativas/' + id;
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
