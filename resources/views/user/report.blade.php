@extends('layout.user')

@section('contents')
<style>
    .background-overlay {
        background-image: url('https://th.bing.com/th/id/R.f4003b06dcad5c845bda391226ed77bb?rik=JDKx%2fLuDNpc1XQ&pid=ImgRaw&r=0');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -1;
    }

    .background-overlay::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }
</style>

<div class="background-overlay"></div>

<div class="content-container">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops! Something went wrong.</strong>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('user.reportCrime') }}" method="post">
        @csrf
        <div class="flex justify-center items-center">
            <div class="w-full lg:w-[50%] h-auto bg-[#f04646] p-8 mb-32">
                <h1 class="font-bold text-xl text-red-700 mt-1 mb-5 text-center">Create a Report</h1>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-7 mb-8">
                    <div class="lg:col-span-1">
                        <div class="mb-6">
                            <label for="report_by" class="block text-sm font-bold leading-6 text-blue-600">Alerter Name</label>
                            <input type="text" name="report_by" id="report_by" value="{{ auth()->user()->name }}" class="block w-full rounded-md border border-gray-300 bg-blue-100 px-3.5 py-2 text-gray-900 shadow-sm focus:ring-2 focus:ring-blue-400 sm:text-sm sm:leading-6 mt-2" readonly>
                        </div>
                        <div class="mb-6">
                            <label for="crime_type" class="block text-sm font-bold leading-6 text-blue-600">Alert Type</label>
                            <select name="crime_type" id="crime_type" class="block w-full rounded-md border border-gray-300 bg-blue-100 px-3.5 py-2 text-gray-900 shadow-sm focus:ring-2 focus:ring-blue-400 sm:text-sm sm:leading-6 mt-2">
                                <option disabled selected>Crime</option>
                                @foreach($crimeTypes as $crimeType)
                                    <option value="{{ $crimeType->crime_type_name }}">{{ $crimeType->crime_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="date" class="block text-sm font-bold leading-6 text-blue-600">Report Date</label>
                            <input type="date" name="date" id="date" class="block w-full rounded-md border border-gray-300 bg-blue-100 px-3.5 py-2 text-gray-900 shadow-sm focus:ring-2 focus:ring-blue-400 sm:text-sm sm:leading-6 mt-2">
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-bold leading-6 text-blue-600">Description</label>
                            <textarea name="description" id="description" class="block w-full rounded-md border border-gray-300 bg-blue-100 px-3.5 py-2 text-gray-900 shadow-sm focus:ring-2 focus:ring-blue-400 sm:text-sm sm:leading-6 mt-2"></textarea>
                        </div>
                    </div>
                    <div class="lg:col-span-1">
                        <div class="mb-6">
                            <label for="address" class="block text-sm font-bold leading-6 text-blue-600">Incident Location</label>
                            <select name="address" id="address" class="block w-full rounded-md border border-gray-300 bg-blue-100 px-3.5 py-2 text-gray-900 shadow-sm focus:ring-2 focus:ring-blue-400 sm:text-sm sm:leading-6 mt-2 mb-2">
                                <option disabled selected>Select Location</option>
                                @foreach(['Phnom Penh', 'Banteay Meanchey', 'Battambang', 'Kampong Cham', 'Kampong Chhnang', 'Kampong Speu', 'Kampong Thom', 'Kampot', 'Kandal', 'Kep', 'Koh Kong', 'Kratié', 'Mondulkiri', 'Oddar Meanchey', 'Pailin', 'Preah Sihanouk', 'Preah Vihear', 'Prey Veng', 'Pursat', 'Ratanakiri', 'Siem Reap', 'Stung Treng', 'Svay Rieng', 'Takéo', 'Tboung Khmum'] as $location)
                                    <option value="{{ $location }}">{{ $location }}</option>
                                @endforeach
                            </select>
                            <div id="map" style="height: 300px;"></div>
                            <div class="grid grid-cols-2 gap-x-4 mt-2">
                                <div>
                                    <label for="latitude" class="block text-sm font-bold leading-6 text-white">Latitude</label>
                                    <input type="number" step="any" name="latitude" id="latitude" class="block w-full rounded-md border border-gray-300 bg-blue-100 px-3.5 py-2 text-gray-900 shadow-sm focus:ring-2 focus:ring-blue-400 sm:text-sm sm:leading-6 mt-1" readonly>
                                </div>
                                <div>
                                    <label for="longitude" class="block text-sm font-bold leading-6 text-white">Longitude</label>
                                    <input type="number" step="any" name="longitude" id="longitude" class="block w-full rounded-md border border-gray-300 bg-blue-100 px-3.5 py-2 text-gray-900 shadow-sm focus:ring-2 focus:ring-blue-400 sm:text-sm sm:leading-6 mt-1" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" id="submitBtn" disabled>Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" integrity="sha512-m0RXrECa1JDw+jWVTZDxjMY1C8zTAyoq3AApdLZ5JwzRsW5LdU9bhPwR3+eHTEvtiRimH73b3Ib1/7GxpMjv4Q==" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const map = L.map('map').setView([12.5657, 104.991], 7); // Centered on Cambodia

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let marker;

        map.on('click', function (e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;

            // Enable the submit button if both latitude and longitude are set
            if (document.getElementById('latitude').value && document.getElementById('longitude').value) {
                document.getElementById('submitBtn').disabled = false;
            }
        });

        document.getElementById('address').addEventListener('change', function () {
            let lat, lng;

            switch (this.value) {
                case 'Phnom Penh':
                    lat = 11.5564;
                    lng = 104.9282;
                    break;
                case 'Banteay Meanchey':
                    lat = 13.8300;
                    lng = 102.9886;
                    break;
                case 'Battambang':
                    lat = 13.0957;
                    lng = 103.2022;
                    break;
                case 'Kampong Cham':
                    lat = 12.0000;
                    lng = 105.4500;
                    break;
                case 'Kampong Chhnang':
                    lat = 12.2500;
                    lng = 104.6667;
                    break;
                case 'Kampong Speu':
                    lat = 11.4500;
                    lng = 104.5167;
                    break;
                case 'Kampong Thom':
                    lat = 12.7000;
                    lng = 104.9000;
                    break;
                case 'Kampot':
                    lat = 10.6100;
                    lng = 104.1800;
                    break;
                case 'Kandal':
                    lat = 11.5420;
                    lng = 104.4036;
                    break;
                case 'Kep':
                    lat = 10.4833;
                    lng = 104.3167;
                    break;
                case 'Koh Kong':
                    lat = 11.6158;
                    lng = 102.9834;
                    break;
                case 'Kratié':
                    lat = 12.4885;
                    lng = 106.0180;
                    break;
                case 'Mondulkiri':
                    lat = 12.4500;
                    lng = 107.2000;
                    break;
                case 'Oddar Meanchey':
                    lat = 14.2200;
                    lng = 103.6200;
                    break;
                case 'Pailin':
                    lat = 12.8488;
                    lng = 102.6092;
                    break;
                case 'Preah Sihanouk':
                    lat = 10.6333;
                    lng = 103.5000;
                    break;
                case 'Preah Vihear':
                    lat = 13.7833;
                    lng = 104.9833;
                    break;
                case 'Prey Veng':
                    lat = 11.4800;
                    lng = 105.3300;
                    break;
                case 'Pursat':
                    lat = 12.5333;
                    lng = 103.9167;
                    break;
                case 'Ratanakiri':
                    lat = 13.7500;
                    lng = 107.0000;
                    break;
                case 'Siem Reap':
                    lat = 13.3622;
                    lng = 103.8597;
                    break;
                case 'Stung Treng':
                    lat = 13.5260;
                    lng = 105.9690;
                    break;
                case 'Svay Rieng':
                    lat = 11.0870;
                    lng = 105.7990;
                    break;
                case 'Takéo':
                    lat = 10.9900;
                    lng = 104.7900;
                    break;
                case 'Tboung Khmum':
                    lat = 12.1000;
                    lng = 105.5333;
                    break;
                default:
                    lat = 12.5657;
                    lng = 104.9910;
            }

            map.setView([lat, lng], 12);
        });

        // Disable the submit button initially
        document.getElementById('submitBtn').disabled = true;
    });
</script>
@endsection
