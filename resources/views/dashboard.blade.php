<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-wrap -mx-5 justify-center p-4">
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-8">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-gray dark:opacity-60 text-sm">Clientes Nuevos de Hoy</p>
                                            <h5 class="mb-2 font-bold dark:text-gray">{{$cardCliente['countClienteNews']}}</h5>
                                            <p class="mb-0 dark:text-gray dark:opacity-60">
                                                <span class="font-bold leading-normal text-sm text-emerald-500">+{{$cardCliente['porcentajeClienteNews']}}%</span>
                                                Desde Ayer
                                            </p>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                            <i class="fa fa-usd text-lg relative top-3.5 text-gray"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-8">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-black dark:opacity-60 text-sm">Usuarios Nuevos Hoy</p>
                                            <h5 class="mb-2 font-bold dark:text-black">{{$cardUser['countUserNews']}}</h5>
                                            <p class="mb-0 dark:text-black dark:opacity-60">
                                                <span class="font-bold leading-normal text-sm text-emerald-500">+{{ number_format($cardUser['porcentajeUsuarioNews'],2) }}%</span>
                                                Desde la ultima Semana
                                            </p>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                            <i class="fa fa-user text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-1 sm:w-1/2 sm:flex-none xl:w-1/4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-8">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-black dark:opacity-60 text-sm">Reservas</p>
                                            <h5 class="mb-2 font-bold dark:text-black">Bs {{ $cardReserva['totalReservas'] }}</h5>
                                            <p class="mb-0 dark:text-black dark:opacity-60">
                                                <span class="font-bold leading-normal text-sm text-emerald-500">+ {{ $cardReserva['porcentajetotalReservas'] }} %</span>
                                                Mas del mes pasado
                                            </p>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                            <i class="fa fa-shopping-cart text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-10">
                    <canvas id="myChart" width="500px" height="100px"></canvas>
                </div>
                <!--      -->
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Ventas',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</x-app-layout>