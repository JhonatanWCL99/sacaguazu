<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Nuevo Cliente
        </h2>
    </x-slot>


    @if ($errors->any())
    <div class="bg-gray-300 rounded-lg py-5 px-6 mb-4 text-base text-gray-800 m-8" role="alert">
        <strong>¡Revise los campos!</strong>
        @foreach ($errors->all() as $error)
        <span class="bg-red-100 text-red-800 text-sm font-semibold mr-5 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{ $error }}</span>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="w-full mx-auto py-2 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg px-4 py-4">
            <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-10 px-12 lg:px-24 shadow-xl mb-25">
                <form class="w-full max-w-2lg" method="POST" action="{{ route('clientes.store') }}">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                                Nombre
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="nombre" name="nombre" type="text" placeholder="Nombre..." value="{{ old('nombre') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5 mb-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="apellido">
                                Apellido
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="apellido" name="apellido" type="text" placeholder="Apellido..." value="{{ old('apellido') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5 mb-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="correo">
                                Correo
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="correo" name="correo" type="text" placeholder="Correo Electronico..." value="{{ old('correo') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="direccion">
                                Direccion
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="direccion" name="direccion" type="text" placeholder="Direccion..." value="{{ old('direccion') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telefono">
                                Telefono
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="telefono" name="telefono" type="text" placeholder="Telefono..." value="{{ old('telefono') }}">
                        </div>

                        <div class="px-6 py-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3" id="button">
                                Registrar Cliente
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>