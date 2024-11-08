<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Estudiantes') }}
        </h2>
    </x-slot>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form action="{{ route('estudiantes.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="unidad_educativa_id" class="block text-sm font-medium text-gray-700">Unidad Educativa</label>
                        <select name="unidad_educativa_id" id="unidad_educativa_id" class="w-full border border-gray-300 rounded-md p-2 mt-2">
                            <option value="">Seleccione una unidad educativa</option>
                            @foreach($unidadesEducativas as $unidad)
                                <option value="{{ $unidad->id }}" @if(old('unidad_educativa_id') == $unidad->id) selected @endif>{{ $unidad->nombreUE }}</option>
                            @endforeach
                        </select>
                        @error('unidad_educativa_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Nivel Inicial -->
                    <div class="mb-6">
                        <h4 class="text-xl font-semibold mb-4 text-green-600">Nivel Inicial</h4>
                        <table class="w-full table-auto border-collapse border border-yellow-300 mt-4" id="nivel-inicial">
                            <thead>
                                <tr class="bg-orange-100 text-red-700">
                                    <th class="border p-2 text-left">Grado</th>
                                    <th class="border p-2 text-left">Paralelo</th>
                                    <th class="border p-2 text-center">Hombres</th>
                                    <th class="border p-2 text-center">Mujeres</th>
                                    <th class="border p-2 text-center">Total</th>
                                    <th class="border p-2 text-center">Guardar</th>
                                    <th class="border p-2 text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([1, 2, 3] as $grado)
                                    <tr class="paralelo-a-{{ $grado }} bg-red-50 hover:bg-yellow-50 transition duration-300">
                                        <td class="border p-2">{{ $grado }}º Inicial</td>
                                        <td class="border p-2">A</td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_hombres_inicial[{{ $grado }}][A]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalInicial()">
                                        </td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_mujeres_inicial[{{ $grado }}][A]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalInicial()">
                                        </td>
                                        <td class="border p-2 text-center total">0</td>
                                        <td class="border p-2 text-center">
                                            <input type="checkbox" name="guardar_inicial[{{ $grado }}][A]" class="guardar-paralelo" id="checkbox-inicial-{{ $grado }}-A">
                                            <label for="checkbox-inicial-{{ $grado }}-A">Guardar</label>
                                        </td>
                                        <td class="border p-2 text-center">
                                            <button type="button" onclick="agregarParalelosInicial({{ $grado }})" id="btn-agregar-inicial-{{ $grado }}" class="bg-green-500 text-white rounded px-4 py-2 hover:bg-green-600 transition duration-300">Agregar Paralelo</button>
                                        </td>
                                    </tr>
                                    <tr class="paralelos-inicial-{{ $grado }} hidden bg-yellow-50 hover:bg-green-50 transition duration-300">
                                        <td class="border p-2"></td>
                                        <td class="border p-2">B</td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_hombres_inicial[{{ $grado }}][B]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalInicial()">
                                        </td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_mujeres_inicial[{{ $grado }}][B]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalInicial()">
                                        </td>
                                        <td class="border p-2 text-center total">0</td>
                                        <td class="border p-2 text-center">
                                            <input type="checkbox" name="guardar_inicial[{{ $grado }}][B]" class="guardar-paralelo" id="checkbox-inicial-{{ $grado }}-B">
                                            <label for="checkbox-inicial-{{ $grado }}-B">Guardar</label>
                                        </td>
                                        <td class="border p-2 text-center"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="bg-orange-200 text-white font-semibold">
                                    <td class="border p-2 text-right" colspan="2">Totales</td>
                                    <td class="border p-2 text-center">
                                        <span id="total-hombres-inicial">0</span>
                                    </td>
                                    <td class="border p-2 text-center">
                                        <span id="total-mujeres-inicial">0</span>
                                    </td>
                                    <td class="border p-2 text-center">
                                        <span id="total-estudiantes-inicial">0</span>
                                    </td>
                                    <td class="border p-2 text-center"></td>
                                    <td class="border p-2 text-center"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Nivel Primaria -->
                    <div class="mb-6">
                        <h4 class="text-xl font-semibold mb-4 text-green-600">Nivel Primaria</h4>
                        <table class="w-full table-auto border-collapse border border-yellow-300 mt-4" id="nivel-primaria">
                            <thead>
                                <tr class="bg-orange-100 text-red-700">
                                    <th class="border p-2 text-left">Grado</th>
                                    <th class="border p-2 text-left">Paralelo</th>
                                    <th class="border p-2 text-center">Hombres</th>
                                    <th class="border p-2 text-center">Mujeres</th>
                                    <th class="border p-2 text-center">Total</th>
                                    <th class="border p-2 text-center">Seleccionar</th> <!-- Columna de Checkbox -->
                                    <th class="border p-2 text-center">Acción</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([1, 2, 3, 4, 5, 6] as $grado)
                                    <tr class="paralelo-a-{{ $grado }} bg-red-50 hover:bg-yellow-50 transition duration-300">
                                        <td class="border p-2">{{ $grado }}º Prim.</td>
                                        <td class="border p-2">A</td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_hombres_primaria[{{ $grado }}][A]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotal()">
                                        </td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_mujeres_primaria[{{ $grado }}][A]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotal()">
                                        </td>
                                        <td class="border p-2 text-center total">0</td>
                                        <td class="border p-2 text-center">
                                            <button type="button" onclick="agregarParalelos({{ $grado }})" id="btn-agregar-{{ $grado }}" class="bg-green-500 text-white rounded px-4 py-2 hover:bg-green-600 transition duration-300">Agregar Paralelo</button>
                                        </td>
                                        <td class="border p-2 text-center">
                                            <input type="checkbox" name="seleccionar_paralelo[{{ $grado }}][A]" value="1"> <!-- Checkbox -->
                                        </td>
                                    </tr>
                                    <tr class="paralelos-{{ $grado }} hidden bg-yellow-50 hover:bg-green-50 transition duration-300">
                                        <td class="border p-2"></td>
                                        <td class="border p-2">B</td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_hombres_primaria[{{ $grado }}][B]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotal()">
                                        </td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_mujeres_primaria[{{ $grado }}][B]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotal()">
                                        </td>
                                        <td class="border p-2 text-center total">0</td>
                                        <td class="border p-2 text-center"></td>
                                        <td class="border p-2 text-center">
                                            <input type="checkbox" name="seleccionar_paralelo[{{ $grado }}][B]" value="1"> <!-- Checkbox -->
                                        </td>
                                    </tr>
                                    <tr class="paralelos-{{ $grado }} hidden bg-green-50 hover:bg-orange-50 transition duration-300">
                                        <td class="border p-2"></td>
                                        <td class="border p-2">C</td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_hombres_primaria[{{ $grado }}][C]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotal()">
                                        </td>
                                        <td class="border p-2 text-center">
                                            <input type="number" name="cantidad_mujeres_primaria[{{ $grado }}][C]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotal()">
                                        </td>
                                        <td class="border p-2 text-center total">0</td>
                                        <td class="border p-2 text-center"></td>
                                        <td class="border p-2 text-center">
                                            <input type="checkbox" name="seleccionar_paralelo[{{ $grado }}][C]" value="1"> <!-- Checkbox -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="bg-orange-200 text-white font-semibold">
                                    <td class="border p-2 text-right" colspan="2">Totales</td>
                                    <td class="border p-2 text-center">
                                        <span id="total-hombres-primaria">0</span>
                                    </td>
                                    <td class="border p-2 text-center">
                                        <span id="total-mujeres-primaria">0</span>
                                    </td>
                                    <td class="border p-2 text-center">
                                        <span id="total-estudiantes-primaria">0</span>
                                    </td>
                                    <td class="border p-2 text-center"></td>
                                    <td class="border p-2 text-center"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <!-- Nivel Secundaria -->
                    <div class="mb-6">
    <h4 class="text-xl font-semibold mb-4 text-green-600">Nivel Secundaria</h4>
    <table class="w-full table-auto border-collapse border border-yellow-300 mt-4" id="nivel-secundaria">
        <thead>
            <tr class="bg-orange-100 text-red-700">
                <th class="border p-2 text-left">Grado</th>
                <th class="border p-2 text-left">Paralelo</th>
                <th class="border p-2 text-center">Hombres</th>
                <th class="border p-2 text-center">Mujeres</th>
                <th class="border p-2 text-center">Total</th>
                <th class="border p-2 text-center">Acción</th>
                <th class="border p-2 text-center">Seleccionar</th> <!-- Columna de Checkbox -->
            </tr>
        </thead>
        <tbody>
            @foreach([1, 2, 3, 4, 5, 6] as $grado)
                <tr class="paralelo-a-secundaria-{{ $grado }} bg-red-50 hover:bg-yellow-50 transition duration-300">
                    <td class="border p-2">{{ $grado }}º Secund.</td>
                    <td class="border p-2">A</td>
                    <td class="border p-2 text-center">
                        <input type="number" name="cantidad_hombres_secundaria[{{ $grado }}][A]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalSecundaria()">
                    </td>
                    <td class="border p-2 text-center">
                        <input type="number" name="cantidad_mujeres_secundaria[{{ $grado }}][A]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalSecundaria()">
                    </td>
                    <td class="border p-2 text-center total">0</td>
                    <td class="border p-2 text-center">
                        <button type="button" onclick="agregarParalelosSecundaria({{ $grado }})" id="btn-agregar-secundaria-{{ $grado }}" class="bg-green-500 text-white rounded px-4 py-2 hover:bg-green-600 transition duration-300">Agregar Paralelo</button>
                    </td>
                    <td class="border p-2 text-center">
                        <input type="checkbox" name="seleccionar_paralelo_secundaria[{{ $grado }}][A]" value="1"> <!-- Checkbox -->
                    </td>
                </tr>
                <tr class="paralelos-secundaria-{{ $grado }} hidden bg-yellow-50 hover:bg-green-50 transition duration-300">
                    <td class="border p-2"></td>
                    <td class="border p-2">B</td>
                    <td class="border p-2 text-center">
                        <input type="number" name="cantidad_hombres_secundaria[{{ $grado }}][B]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalSecundaria()">
                    </td>
                    <td class="border p-2 text-center">
                        <input type="number" name="cantidad_mujeres_secundaria[{{ $grado }}][B]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalSecundaria()">
                    </td>
                    <td class="border p-2 text-center total">0</td>
                    <td class="border p-2 text-center"></td>
                    <td class="border p-2 text-center">
                        <input type="checkbox" name="seleccionar_paralelo_secundaria[{{ $grado }}][B]" value="1"> <!-- Checkbox -->
                    </td>
                </tr>
                <tr class="paralelos-secundaria-{{ $grado }} hidden bg-green-50 hover:bg-orange-50 transition duration-300">
                    <td class="border p-2"></td>
                    <td class="border p-2">C</td>
                    <td class="border p-2 text-center">
                        <input type="number" name="cantidad_hombres_secundaria[{{ $grado }}][C]" class="cantidad-hombres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalSecundaria()">
                    </td>
                    <td class="border p-2 text-center">
                        <input type="number" name="cantidad_mujeres_secundaria[{{ $grado }}][C]" class="cantidad-mujeres w-full border border-gray-300 rounded-md p-1 text-center" min="0" value="0" oninput="calcularTotalSecundaria()">
                    </td>
                    <td class="border p-2 text-center total">0</td>
                    <td class="border p-2 text-center"></td>
                    <td class="border p-2 text-center">
                        <input type="checkbox" name="seleccionar_paralelo_secundaria[{{ $grado }}][C]" value="1"> <!-- Checkbox -->
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-orange-200 text-white font-semibold">
                <td class="border p-2 text-right" colspan="2">Totales</td>
                <td class="border p-2 text-center">
                    <span id="total-hombres-secundaria">0</span>
                </td>
                <td class="border p-2 text-center">
                    <span id="total-mujeres-secundaria">0</span>
                </td>
                <td class="border p-2 text-center">
                    <span id="total-estudiantes-secundaria">0</span>
                </td>
                <td class="border p-2 text-center"></td>
                <td class="border p-2 text-center"></td>
            </tr>
        </tfoot>
    </table>
</div>


                    <div class="flex items-center justify-center mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('estudiantes.index') }}">
                            {{ __('Cancelar') }}
                        </a>
                        <button type="submit" class="bg-red-600 text-white rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 ms-4 p-2 transition duration-150 ease-in-out overflow-hidden hover:bg-red-700">
                            {{ __('Registrar Estudiante') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Función para agregar paralelos (B y C) a cada grado de los niveles
        function agregarParalelos(grado) {
            const paralelos = document.querySelectorAll('.paralelos-' + grado);
            paralelos.forEach(paralelo => {
                paralelo.classList.toggle('hidden');
            });
            
            // Desactivar el botón de agregar paralelos si ya hay 3 paralelos
            const paralelosExistentes = document.querySelectorAll(`.paralelos-${grado}`);
            if (paralelosExistentes.length >= 3) {
                document.getElementById(`btn-agregar-${grado}`).style.display = 'none';
            }
        }

        function agregarParalelosInicial(grado) {
            const paralelos = document.querySelectorAll('.paralelos-inicial-' + grado);
            paralelos.forEach(paralelo => {
                paralelo.classList.toggle('hidden');
            });
            
            const paralelosExistentes = document.querySelectorAll(`.paralelos-inicial-${grado}`);
            if (paralelosExistentes.length >= 2) {
                document.getElementById(`btn-agregar-inicial-${grado}`).style.display = 'none';
            }
        }

        function agregarParalelosSecundaria(grado) {
            const paralelos = document.querySelectorAll('.paralelos-secundaria-' + grado);
            paralelos.forEach(paralelo => {
                paralelo.classList.toggle('hidden');
            });
            
            const paralelosExistentes = document.querySelectorAll(`.paralelos-secundaria-${grado}`);
            if (paralelosExistentes.length >= 3) {
                document.getElementById(`btn-agregar-secundaria-${grado}`).style.display = 'none';
            }
        }

        // Función para calcular los totales de hombres, mujeres y total general para Primaria
        function calcularTotal() {
            let totalHombresPrimaria = 0;
            let totalMujeresPrimaria = 0;
            let totalEstudiantesPrimaria = 0;

            // Iterar sobre todas las filas del nivel primaria
            const filasPrimaria = document.querySelectorAll('#nivel-primaria tbody tr');
            filasPrimaria.forEach(fila => {
                const hombres = fila.querySelector('.cantidad-hombres') ? parseInt(fila.querySelector('.cantidad-hombres').value) : 0;
                const mujeres = fila.querySelector('.cantidad-mujeres') ? parseInt(fila.querySelector('.cantidad-mujeres').value) : 0;
                const totalFila = hombres + mujeres;

                // Mostrar el total por fila
                if (fila.querySelector('.total')) {
                    fila.querySelector('.total').textContent = totalFila;
                }

                // Sumar los totales generales para primaria
                totalHombresPrimaria += hombres;
                totalMujeresPrimaria += mujeres;
                totalEstudiantesPrimaria += totalFila;
            });

            // Mostrar los totales en la fila del pie de tabla para cada nivel
            document.getElementById('total-hombres-primaria').textContent = totalHombresPrimaria;
            document.getElementById('total-mujeres-primaria').textContent = totalMujeresPrimaria;
            document.getElementById('total-estudiantes-primaria').textContent = totalEstudiantesPrimaria;
        }

        function calcularTotalInicial() {
            let totalHombresInicial = 0;
            let totalMujeresInicial = 0;
            let totalEstudiantesInicial = 0;

            const filasInicial = document.querySelectorAll('#nivel-inicial tbody tr');
            filasInicial.forEach(fila => {
                const hombres = fila.querySelector('.cantidad-hombres') ? parseInt(fila.querySelector('.cantidad-hombres').value) : 0;
                const mujeres = fila.querySelector('.cantidad-mujeres') ? parseInt(fila.querySelector('.cantidad-mujeres').value) : 0;
                const totalFila = hombres + mujeres;

                if (fila.querySelector('.total')) {
                    fila.querySelector('.total').textContent = totalFila;
                }

                totalHombresInicial += hombres;
                totalMujeresInicial += mujeres;
                totalEstudiantesInicial += totalFila;
            });

            document.getElementById('total-hombres-inicial').textContent = totalHombresInicial;
            document.getElementById('total-mujeres-inicial').textContent = totalMujeresInicial;
            document.getElementById('total-estudiantes-inicial').textContent = totalEstudiantesInicial;
        }

        function calcularTotalSecundaria() {
            let totalHombresSecundaria = 0;
            let totalMujeresSecundaria = 0;
            let totalEstudiantesSecundaria = 0;

            const filasSecundaria = document.querySelectorAll('#nivel-secundaria tbody tr');
            filasSecundaria.forEach(fila => {
                const hombres = fila.querySelector('.cantidad-hombres') ? parseInt(fila.querySelector('.cantidad-hombres').value) : 0;
                const mujeres = fila.querySelector('.cantidad-mujeres') ? parseInt(fila.querySelector('.cantidad-mujeres').value) : 0;
                const totalFila = hombres + mujeres;

                if (fila.querySelector('.total')) {
                    fila.querySelector('.total').textContent = totalFila;
                }

                totalHombresSecundaria += hombres;
                totalMujeresSecundaria += mujeres;
                totalEstudiantesSecundaria += totalFila;
            });

            document.getElementById('total-hombres-secundaria').textContent = totalHombresSecundaria;
            document.getElementById('total-mujeres-secundaria').textContent = totalMujeresSecundaria;
            document.getElementById('total-estudiantes-secundaria').textContent = totalEstudiantesSecundaria;
        }
    </script>
</x-app-layout>
