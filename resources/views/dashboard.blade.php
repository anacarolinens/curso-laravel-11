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
                    <div class="flex space-x-4 mb-10">
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

                    <!-- Gráficos em Flex -->
                    <div class="flex flex-wrap lg:flex-nowrap space-y-4 lg:space-y-0 lg:space-x-4 mb-5">
                        <!-- Card com Gráfico de Linhas CREATES -->
                        <div class="w-full lg:w-1/2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Criação de Usuários</h3>
                                <div class="flex justify-center">
                                    <canvas id="lineChartCreates" width="800" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Card com Gráfico de Linhas DELETES -->
                        <div class="w-full lg:w-1/2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Deleção de Usuários</h3>
                                <div class="flex justify-center">
                                    <canvas id="lineChartDeletes" width="800" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Card com Gráfico de Linhas EDITS -->
                    <div class="flex flex-wrap lg:flex-nowrap space-y-4 lg:space-y-0 lg:space-x-4 mb-5">
                        <div class="w-full lg:w-1/2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Edição de Usuários</h3>
                                <div class="flex justify-center">
                                    <canvas id="lineChartEdits" width="800" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Card com Gráfico de Linhas de deleção por mês -->
                        <div class="w-full lg:w-1/2 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Deleção de Usuários por Mês</h3>
                                <div class="flex justify-center">
                                    <canvas id="barChartDeletesMonth" width="800" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctxCreates = document.getElementById('lineChartCreates').getContext('2d');
            var myChartCreates = new Chart(ctxCreates, {
                type: 'line',
                data: {
                    labels: [@php echo $userAno; @endphp],
                    datasets: [{
                        label: @php echo $userLabel; @endphp,
                        data: [@php echo $userTotal; @endphp],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: true
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

        document.addEventListener('DOMContentLoaded', function () {
            var ctxDeletes = document.getElementById('lineChartDeletes').getContext('2d');
            var myChartDeletes = new Chart(ctxDeletes, {
                type: 'line',
                data: {
                    labels: [@php echo $deletedUserAno; @endphp],
                    datasets: [{
                        label: @php echo $deletedUserLabel; @endphp,
                        data: [@php echo $deletedUserTotal; @endphp],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: true
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

        document.addEventListener('DOMContentLoaded', function () {
            var ctxEdits = document.getElementById('lineChartEdits').getContext('2d');
            var myChartEdits = new Chart(ctxEdits, {
                type: 'line',
                data: {
                    labels: [@php echo $editedUserAno; @endphp],
                    datasets: [{
                        label: @php echo $editedUserLabel; @endphp,
                        data: [@php echo $editedUserTotal; @endphp],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1,
                        fill: true
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

        document.addEventListener('DOMContentLoaded', function () {
            var ctxDeletesMonth = document.getElementById('barChartDeletesMonth').getContext('2d');
            var myChartDeletesMonth = new Chart(ctxDeletesMonth, {
                type: 'bar',
                data: {
                    labels: [@php echo $deletedUserMes; @endphp],
                    datasets: [{
                        label: @php echo $deletedUserLabelMes; @endphp,
                        data: [@php echo $deletedUserTotalMes; @endphp],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true
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
