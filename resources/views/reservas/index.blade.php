<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            {{ __('Gestion de Reservas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">
                <a class="px-8 py-2 bg-gray-300 hover:bg-gray-400 rounded-full" href="{{ route('reservas.create') }}"> Nueva Reserva</a>
                <br><br>
                <table class="table-auto w-full my-3 divide-y divide-gray-200">
                    <tr class="bg-gray-100">
                        <th class="">Nro</th>
                        <th class="px-4 py-2">Fecha Inicio</th>
                        <th class="px-4 py-2">Fecha Fin</th>
                        <th class="px-4 py-2">Total Cuota</th>
                        <th class="px-4 py-2">Total Reservas</th>
                        <th class="px-4 py-2">Cliente</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                    @foreach ($reservas as $key => $reserva)
                    <tr>
                        <td class="border text-center">{{ $reserva->id }}</td>
                        <td class="border px-4 py-2 text-center">{{ $reserva->fecha_inicio }}</td>
                        <td class="border px-4 py-2 text-center">{{ $reserva->fecha_fin }}</td>
                        <td class="border px-4 py-2 text-center">{{ $reserva->detalleReservas->count() }}</td>
                        <td class="border px-4 py-2 text-center">{{ $reserva->total_cuota }}</td>
                        <td class="border px-4 py-2 text-center">{{ $reserva->cliente->nombre }}</td>
                        <td class="border px-4 py-2 text-center">
                            @if($reserva->estado=="P")
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Pendiente</span>
                            @else
                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Concluido</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <div class="mt-2">
                                <form action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                                    <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded " href="{{ route('reservas.show',$reserva->id) }}">Detalle</a>
                                    @csrf
                                    @method('Delete')
                                    <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $reservas->render() !!}
            </div>
        </div>

</x-app-layout>