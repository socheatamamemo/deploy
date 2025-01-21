@extends('layout.mappagelayout')

@section('content')
<section class="hero relative flex items-center justify-center min-h-screen" style="z-index: 10;">
<div id="map"></div>
</section>
@endsection

@section('scripts')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>

<style>
    #map {
        height: 80vh;
    }
</style>
@endsection

@section('subscript')
@endsection
