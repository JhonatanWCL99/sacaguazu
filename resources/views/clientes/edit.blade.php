<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg px-4 py-4">
            <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-10 px-12 lg:px-24 shadow-xl mb-25">
                <form class="w-full max-w-2lg" method="POST" action="{{ route('clientes.update',$cliente->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap ">
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                                Nombre
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="nombre" name="nombre" type="text" value="{{$cliente->nombre}}">
                        </div>
                        <div class="w-full md:w-1/2 px-5 mb-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="correo">
                                Correo
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="correo" name="correo" type="text" value="{{$cliente->correo}}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="direccion">
                                Direccion
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="direccion" name="direccion" type="text" value="{{$cliente->direccion}}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telefono">
                                Telefono
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="telefono" name="telefono" type="text" value="{{$cliente->telefono}}">
                        </div>

                        <div class="px-6 py-4">
                            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded my-3" id="button">
                                Actualizar Cliente
                            </button>
                            <a href="{{ route('clientes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Volver
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>