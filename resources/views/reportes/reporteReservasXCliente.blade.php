<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            {{ __('Reporte de Total Reservas por Clientes') }}
        </h2>
    </x-slot>
    <div class="py-1">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">
                <table class="table-auto w-full my-3 divide-y divide-gray-200" id="table_main">
                    <tr class="bg-gray-100">
                        <th class="">Nro</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Direccion</th>
                        <th class="px-4 py-2">Total Reserva</th>
                    </tr>
                    @foreach ($clientes as $key => $cliente)
                    <tr>
                        <td class="border text-center">{{ $cliente->id }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cliente->nombre }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cliente->correo }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cliente->direccion }}</td>
                        <td class="border px-4 py-2 text-center">Bs {{ $cliente->reservas->sum('total_cuota') }} </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.css" rel="stylesheet" />
        <script src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>

        <script type="text/javascript" src="//cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_main').DataTable({
                    "buttons": [
                        'copy', 'excel', 'pdf'
                    ],
                    'bSort': false,
                    'aoColumns': [{
                            sWidth: "15%",
                            bSearchable: false,
                            bSortable: false
                        },
                        {
                            sWidth: "15%",
                            bSearchable: false,
                            bSortable: false
                        },
                        {
                            sWidth: "15%",
                            bSearchable: false,
                            bSortable: false
                        },
                        {
                            sWidth: "15%",
                            bSearchable: false,
                            bSortable: false
                        },
                        {
                            sWidth: "15%",
                            bSearchable: false,
                            bSortable: false
                        },
                    ],
                    "scrollCollapse": false,
                    "info": true,
                    "paging": true
                });
            });
        </script>

</x-app-layout>