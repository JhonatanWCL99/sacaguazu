<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Nueva Reserva
        </h2>
    </x-slot>
    <form action="{{ route('reservas.store')}}" method="POST">
        @csrf
        <div class="w-full py-2 sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg px-4 py-4">
                <div class="flex justify-start">
                    <div class="w-full md:w-1/2 px-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                            Fecha de Inicio
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="fecha_inicio" name="fecha_inicio" type="date" placeholder="Nombre..." value="{{ old('fecha_inicio') }}">
                    </div>
                    <div class="w-full md:w-1/2 px-5 mb-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="apellido">
                            Fecha Fin
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="fecha_fin" name="fecha_fin" type="date" placeholder="Apellido..." value="{{ old('fecha_fin') }}">
                    </div>
                    <div class="w-full md:w-1/2 px-5 mb-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="correo">
                            Seleccione el Cliente
                        </label>
                        <select name="cliente_id" id="terreno_id" class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="detalle_reserva">

                    </div>
                </div>
            </div>
        </div>
        <div class="w-full py-2 sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg px-4 py-4">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 px-5 mb-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="direccion">
                            Seleccione el Terreno
                        </label>
                        <select name="terreno" id="terreno" class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option value="">Seleccione el Terreno</option>
                            @foreach($terrenos as $terreno)
                            <option value="{{$terreno->id}}">Terreno Nro {{$terreno->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-5 mb-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="area_terreno">
                            Area del Terreno
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="area_terreno" name="area_terreno" type="number" placeholder="Area..." readonly>
                    </div>
                    <div class="w-full md:w-1/2 px-5 mb-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subtotal_terreno">
                            Subtotal Costo Terreno
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="subtotal_costo_terreno" name="subtotal_costo_terreno" type="number" placeholder="Subtotal Terreno..." readonly>
                    </div>
                    <div class="px-6 py-4">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3" id="agregar_terreno">
                            Agregar Terreno
                        </button>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 m:auto">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3" id="button">
                Registrar Reserva
            </button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script>
        var i = 0;
        const csrfToken = document.head.querySelector(
            "[name~=csrf-token][content]"
        ).content;
        let costo_area_cuadrada = 5;
        let rutaObtenerDatos = "{{ route('reservas.obtenerDatosTerreno') }}";
        let area_terreno = document.getElementById('area_terreno');
        let subtotal_costo_terreno = document.getElementById('subtotal_costo_terreno');
        let agregar_terreno = document.getElementById("agregar_terreno");
        let terreno = document.getElementById("terreno");
        let detalle_reserva = document.getElementById("detalle_reserva");
        let direccion_terreno = "";
        terreno.addEventListener('change', (e) => {
            console.log("ss");
            fetch(rutaObtenerDatos, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-Token": csrfToken,
                    },
                    body: JSON.stringify({
                        terreno_id: terreno.value,
                    }),
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    console.log(data);
                    area_terreno.value = data.terreno.area_terreno;
                    subtotal_costo_terreno.value = data.terreno.area_terreno * costo_area_cuadrada;
                    direccion_terreno = data.terreno.direccion;

                })
                .catch((error) => {

                });
        });

        agregar_terreno.addEventListener('click', (e) => {
            row = '<tr><td  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900;">' + terreno.value +
                '</td> <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap";>' + direccion_terreno +
                '</td> <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap";>' + area_terreno.value +
                '</td> <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap";>' + subtotal_costo_terreno.value + '</td> </tr>';

            $("#detalle").append(row);


            inputForm =
                '<input type="hidden" name="terrenos[]" value="' + terreno.value + '">' +
                '<input type="hidden" name="direcciones[]" value="' + direccion_terreno + '">' +
                '<input type="hidden" name="areas[]" value="' + area_terreno.value + '">' +
                '<input type="hidden" name="subtotales[]" value="' + subtotal_costo_terreno.value + '">';
            $("#detalle_reserva").append(inputForm);
            i = i + 1;
        });
    </script>
</x-app-layout>