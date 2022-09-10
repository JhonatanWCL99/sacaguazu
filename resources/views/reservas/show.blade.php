<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Detalle de la Reserva
        </h2>
    </x-slot>
    <div class="w-full py-2 sm:px-6 lg:px-8">
        <div class="bg-white sm:rounded-lg px-4 py-4">
            <div class="flex justify-start">
                <div class="w-full overflow-x-auto relative shadow-md sm:rounded-lg m-10">
                    <table class="w-full text-sm text-left ">
                        <tbody>
                            <tr class="border-b ">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-200 ">
                                    Fecha de Reserva
                                </th>
                                <td class="py-4 px-10">
                                    {{ $reserva->fecha }}
                                </td>
                            </tr>
                            <tr class="border-b ">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-200 ">
                                    Fecha de Vigencia de la Reserva
                                </th>
                                <td class="py-4 px-10">
                                    {{ $reserva->fecha_fin }}
                                </td>
                            </tr>
                            <tr class="border-b">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-200 ">
                                    Estado
                                </th>
                                <td class="py-4 px-10">
                                    @if($reserva->estado=="P")
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Pendiente</span>
                                    @else
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Concluido</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="border-b ">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-200">
                                    Cliente
                                </th>
                                <td class="py-4 px-10">
                                    {{ $reserva->cliente->nombre }} {{ $reserva->cliente->apellido }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-200">
                                    Usuario
                                </th>
                                <td class="py-4 px-10">
                                    {{ $reserva->user->name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full py-2 sm:px-6 lg:px-8">
        <div class="bg-white sm:rounded-lg px-4 py-4">
            <div class="flex flex-wrap">
                <table class="min-w-full text-center" id="detalle">
                    <thead class="border-b bg-gray-800">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Nro de Terreno
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Foto del Terreno
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Direccion
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Area de Terreno
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Subtotal
                            </th>
                        </tr>
                    </thead class="border-b">
                    <tbody>
                        @foreach($reserva->detalleReservas as $detalle)
                        <tr>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{$detalle->terreno->id}}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" style="display: flex;justify-content: center;">
                                <img src="{{url($detalle->terreno->fotos[0]->imagen)}}" alt="" width="100px">
                            </td>
                            <td>
                                {{$detalle->terreno->direccion}}
                            </td>
                            <td>
                                {{$detalle->terreno->area_terreno}}
                            </td>
                            <td>
                                {{$detalle->subtotal_cuota_inicial}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>