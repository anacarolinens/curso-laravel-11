<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                   <div class="flex space-x-4">
                        <div class="w-1/3 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg flex items-center">
                            <div class="p-4 bg-blue-500 text-white rounded-full">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="ml-4 text-gray-900 dark:text-gray-100">
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Total de Usuários
                                </div>
                                <div class="text-2xl font-bold">
                                    {{ $userCount }}
                                </div>
                            </div>
                        </div>

                        <div class="w-1/3 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg flex items-center">
                            <div class="p-4 bg-red-500 text-white rounded-full">
                                <i class="fas fa-user-times"></i>
                            </div>
                            <div class="ml-4 text-gray-900 dark:text-gray-100">
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Total de Usuários Deletados
                                </div>
                                <div class="text-2xl font-bold">
                                    {{ $deletedUserCount }}
                                </div>
                            </div>
                        </div>

                        <div class="w-1/3 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg flex items-center">
                            <div class="p-4 bg-orange-500 text-white rounded-full">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <div class="ml-4 text-gray-900 dark:text-gray-100">
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                   Total de Usuários Editados
                                </div>
                                <div class="text-2xl font-bold">
                                    {{ $editedUserCount }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card com Gráfico de Linhas -->
                    <div class="w-2/2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Overview</h3>
                            <div class="flex justify-center">
                                <canvas id="lineChart" width="800" height="400"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('lineChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Início', 'Atual'],
                            datasets: [{
                                label: 'Total de Usuários',
                                data: [0, {{ $userCount }}],
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 4,
                                pointRadius: 7,
                                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                                pointBorderColor: '#fff',
                                fill: false
                            }, {
                                label: 'Usuários Deletados',
                                data: [0, {{ $deletedUserCount }}],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 4,
                                pointRadius: 7,
                                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                pointBorderColor: '#fff',
                                fill: false
                            }, {
                                label: 'Usuários Editados',
                                data: [0, {{ $editedUserCount }}],
                                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                borderColor: 'rgba(255, 206, 86, 1)',
                                borderWidth: 4,
                                pointRadius: 7,
                                pointBackgroundColor: 'rgba(255, 206, 86, 1)',
                                pointBorderColor: '#fff',
                                fill: false
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
            });
    </script>

</x-app-layout>
