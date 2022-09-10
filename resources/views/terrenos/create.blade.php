<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Nuevo Terreno
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
    <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg px-4 py-2">
            <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-10 px-12 lg:px-24 shadow-xl mb-2">

                <form action="{{ route('terrenos.store') }} " class="w-full max-w-2lg" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5">
                            <label class="tracking-wide text-black text-xs font-bold mb-2" for="foto">
                                Foto del Terreno
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="foto" id="foto" type="file" value="{{ old('foto') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class="tracking-wide text-black text-xs font-bold mb-2" for="company">
                                Area del Terreno
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="area" id="area" type="number" step="any" placeholder="Area" value="{{ old('area') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class=" tracking-wide text-black text-xs font-bold mb-2" for="title">
                                Direccion
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="direccion" id="direccion" type="text" placeholder="Direccion" value="{{ old('direccion') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class=" tracking-wide text-black text-xs font-bold mb-2" for="title">
                                Zona
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="zona" id="zona" type="text" placeholder="Zona" value="{{ old('zona') }}">
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class=" tracking-wide text-black text-xs font-bold mb-2" for="title">
                                Descripcion
                            </label>
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="descripcion" id="descripcion" type="text" placeholder="Descripcion" value="{{ old('descripcion') }}">
                        </div>
                        <div class="w-full md:w-2/2 px-5">
                            <label class=" tracking-wide text-black text-xs font-bold mb-2" for="title">
                                Seleccione su ubicacion
                            </label>
                            <div class="text-center">
                                <input name="latitud" id="latitud" type="number" step="any" value="{{ old('latitud') }}" readonly>
                                <input name="longitud" id="longitud" type="number" step="any" value="{{ old('longitud') }}" readonly>
                            </div>
                            <br>
                            <div id="googleMap" class="mt-4" style="width:60%;height:350px;margin:0 auto"></div>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mt-4 justify-center text-center mb-4">
                        <div class="px-5">
                            <button type="submit" class="md:w-full bg-gray-500 hover:bg-gray-700 text-white py-2 px-6 border-b-4 rounded-full" id="button">
                                Registrar Terreno
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8yhE-G605Nysw_HISUl0tFxzpbBiyPlc&callback=myMap">
    </script>
    <script>
        let latitudInput = document.getElementById('latitud');
        let longitudInput = document.getElementById('longitud');
        var numDeltas = 100;
        var delay = 10; //milliseconds
        var i = 0;
        var deltaLat;
        var deltaLng;
        var coordenadas = {
            lat: 51.508742,
            lng: -0.120850
        };

        var marker;

        function myMap() {

            var mapProp = {
                center: coordenadas,
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            marker = new google.maps.Marker({
                position: coordenadas,
                map: map,
                title: "Latitude:" + coordenadas.lat + " | Longitude:" + coordenadas.lng
            })

            google.maps.event.addListener(map, 'click', function(event) {
                console.log(event)
                var result = {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                };
                transition(result);
            });
        }

        function transition(result) {
            i = 0;
            deltaLat = (result.lat - coordenadas.lat) / numDeltas;
            deltaLng = (result.lng - coordenadas.lng) / numDeltas;
            moveMarker();
        }

        function moveMarker() {
            coordenadas.lat += deltaLat;
            coordenadas.lng += deltaLng;
            var latlng = new google.maps.LatLng(coordenadas.lat, coordenadas.lng);
            marker.setTitle("Latitude:" + coordenadas.lat + " | Longitude:" + coordenadas.lng);
            marker.setPosition(latlng);
            if (i != numDeltas) {
                i++;
                setTimeout(moveMarker, delay);
            }
            latitudInput.value = coordenadas.lat;
            longitudInput.value = coordenadas.lng;
            console.table(coordenadas);
        }
    </script>
</x-app-layout>