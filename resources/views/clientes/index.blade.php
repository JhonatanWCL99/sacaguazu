<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            {{ __('Gestion de clientes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">
                <a class="px-8 py-2 bg-gray-300 hover:bg-gray-400 rounded-full" href="{{ route('clientes.create') }}"> Nuevo cliente</a>
                <br><br>
                <table class="table-auto w-full my-3 divide-y divide-gray-200">
                    <tr class="bg-gray-100">
                        <th class="">Nro</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Direccion</th>
                        <th class="px-4 py-2">Telefono</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                    @foreach ($clientes as $key => $cliente)
                    <tr>
                        <td class="border text-center">{{ $cliente->id }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cliente->nombre }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cliente->correo }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cliente->direccion }}</td>
                        <td class="border px-4 py-2 text-center">{{ $cliente->telefono }}</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="mt-2">
                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                    <a class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-5 rounded " href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>
                                    @csrf
                                    @method('Delete')
                                    <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $clientes->render() !!}
            </div>
        </div>
       
</x-app-layout>
