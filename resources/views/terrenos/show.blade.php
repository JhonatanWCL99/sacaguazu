<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Detalle del Terreno
        </h2>
    </x-slot>
    <div class="flex flex-col m-8 bg-white items-center shadow-lg border-solid border-2">
        @if(isset($terreno->fotos[0]))
        <img src="{{ url($terreno->fotos[0]->imagen)}}" width="250px" height="100px" alt="" >
        @else
        <img src="{{ url('img/no-img.jpg')}}" width="250px" height="100px" alt="">
        @endif
        <div class="m-4">
            <h2 class="text-xl font-semibold">Area del Terreno : {{ $terreno->area_terreno }} m2</h2>
            <span class="block pb-2 text-sm dark:text-gray-400">Zona : {{ $terreno->zona }}</span>
            <span class="block pb-2 text-sm dark:text-gray-400">Direccion : {{ $terreno->direccion }}</span>
            <p>Descripcion</p>
            <p>{{ $terreno->descripcion }}</p>
        </div>
        <div class="px-6 py-4">
            <a class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3" href="{{ route('terrenos.index') }}"> Volver</a>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</x-app-layout>