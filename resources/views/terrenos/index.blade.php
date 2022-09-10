<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            {{ __('Gestion de Terrenos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">
                <a class="px-8 py-2 bg-gray-400 hover:bg-gray-500 rounded-full " href="{{ route('terrenos.create') }}"> Nuevo Terreno</a>
                <br><br>
                <table class="table-auto w-full my-3 divide-y divide-gray-200">
                    <tr class="bg-gray-100">
                        <th class="">Nro</th>
                        <th class="px-4 py-2">Foto</th>
                        <th class="px-4 py-2">Area de Terreno</th>
                        <th class="px-4 py-2">Direccion</th>
                        <th class="px-4 py-2">Zona</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                    @foreach ($terrenos as $key => $terreno)
                    <tr>
                        <td class="border text-center">{{ $terreno->id }}</td>
                        <td class="border px-4 py-2" style="display: flex;justify-content: center;">
                            @if(isset($terreno->fotos[0]))
                            <img src=" {{ url($terreno->fotos[0]->imagen)}}" width="80px" alt="">
                            @else
                            <img src=" {{ url('img/no-img.jpg')}}" width="80px" alt="">
                            @endif
                        </td>
                        <td class="border px-4 py-2 text-center">{{ $terreno->area_terreno }}</td>
                        <td class="border px-4 py-2 text-center">{{ $terreno->direccion }}</td>
                        <td class="border px-4 py-2 text-center">{{ $terreno->zona }}</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="mt-1">
                                <form action="{{ route('terrenos.destroy',$terreno->id) }}" method="POST">
                                    <a class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded " href="{{ route('terrenos.show',$terreno->id) }}">Detalle</a>
                                    @csrf
                                    @method('Delete')
                                    <button class="bg-red-400 hover:bg-red-500 text-black font-bold py-2 px-4 rounded">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $terrenos->render() !!}
            </div>
        </div>

</x-app-layout>