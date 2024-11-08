<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte Total de Estudiantes por Unidad Educativa y Sexo') }}
        </h2> 
        <h4 class="text-xl font-bold text-gray-800 dark:text-gray-200">Total Estudiantes</h4>
        <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400">{{ $totalEstudiantes }}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Total de Estudiantes por Unidad Educativa</h3>

                <!-- Contenedor del gráfico -->
                <div class="flex items-center">
                    <canvas id="chart-total" width="800" height="800"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Cargar Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Configuración del gráfico -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const labels = [];
            const dataValues = [];
            const backgroundColors = [];
            const hoverColors = [];

            // Genera colores de fondo y etiquetas dinámicas
            const colorPairs = ['#36A2EB', '#FF6384']; // Azul para hombres, rosa para mujeres
            let colorIndex = 0;

            @foreach ($reporteDatos as $unidadID => $datos)
                const nombreUnidad = '{{ $datos->first()->unidadEducativa->nombreUE ?? "Unidad desconocida" }}';
                labels.push(nombreUnidad + ' - Hombres', nombreUnidad + ' - Mujeres');
                
                dataValues.push(
                    {{ $datos->where('sexo', 'masculino')->sum('total') }},
                    {{ $datos->where('sexo', 'femenino')->sum('total') }}
                );
                
                // Añadir colores dinámicos para cada unidad
                backgroundColors.push(colorPairs[colorIndex % 2], colorPairs[(colorIndex + 1) % 2]);
                hoverColors.push('#4A90E2', '#FF7F9A'); // Colores de hover diferentes
                colorIndex += 2;
            @endforeach

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Total de Estudiantes por Unidad Educativa',
                    data: dataValues,
                    backgroundColor: backgroundColors,
                    hoverBackgroundColor: hoverColors
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: { size: 14 },
                                color: '#333'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw + ' estudiantes';
                                }
                            }
                        }
                    }
                }
            };

            new Chart(document.getElementById('chart-total'), config);
        });
    </script>
</x-app-layout>
