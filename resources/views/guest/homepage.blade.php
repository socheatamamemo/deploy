@extends('layout.master')
@section('content')

<section class="hero relative min-h-screen flex items-center justify-center overflow-hidden">
  <img src="https://pp.walk.sc/tile/e/0/1496x1200/loc/lat=11.561631/lng=104.927955.png" class="absolute inset-0 w-full h-full object-cover z-0" alt="Crime map">
  <div class="relative z-10 p-8 bg-gray-300 bg-opacity-90 rounded-lg shadow-md">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">Find Crime in Your Lovely Hood</h1>
      <p class="flex justify-center font-semibold text-red-600 font-bold text-2xl mb-6">Search by location</p>
      <form class="space-y-4" type="get" action="{{ url('/search') }}">
          <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
              <div class="flex-grow">
                  <input type="text" class="w-full md:w-80 p-3 bg-gray-100 text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" id="address" name="address" placeholder="Enter your address" required>
              </div>
              <div class="flex-grow">
                  <input type="date" class="w-full md:w-80 p-3 bg-gray-100 text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" id="date" name="date" required>
              </div>
          </div>
          <div class="flex justify-center">
              <button type="submit" class="px-5 py-2 bg-green-500 text-white font-bold text-xl rounded-md hover:bg-green-900">Go</button>
          </div>
      </form>
      @if(session('error'))
          <div class="alert alert-danger mt-4">
              {{ session('error') }}
          </div>
      @endif
  </div>
</section>

@endsection

@section('subcontent')

<section class="data-info bg-secondary py-5">
  <div class="container">
    <div class="row">
    <div class="col-md-12 text-center">
        <h3 class="text-2xl font-bold text-black">Where Does Our Data Come From?</h3>
        <p class="text-xl text-white">We use an automated process to extract data from participating law enforcement agencies' existing record systems.</p>
        <p class="text-xl text-white">You can be assured that the data we display is always the most current available.</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <img class="img-fluid rounded-circle mx-auto d-block" src="{{ URL('storage/data.png') }}" alt="Data icon">
      </div>
    </div>
  </div>
</section>

@endsection

@section('subcontents')
<section class="cops-profile bg-light py-5">
  <div class="container">
    <h3 class="text-center mb-4 text-3xl font-bold">Cops Profile</h3>
    <div class="row justify-content-center">
      <div class="col-md-3 mb-4">
        <div class="image-box">
          <img src="https://0.soompi.io/wp-content/uploads/2020/07/16150220/lee-joon-gi3.jpg" alt="Police 1" class="img-fluid rounded-circle mx-auto d-block profile-image">
        </div>
        <p class="text-center mt-2 font-semibold">Lee Joon Gi</p>
        <p class="text-center">Patrol Officer</p>
      </div>
      <div class="col-md-3 mb-4">
        <div class="image-box">
          <img src="https://lovekpop95.com/wp-content/uploads/2023/03/Nam-Joo-hyuk-military.jpg" alt="Police 2" class="img-fluid rounded-circle mx-auto d-block profile-image">
        </div>
        <p class="text-center mt-2 font-semibold">Nam Joo hyuk</p>
        <p class="text-center">Detective</p>
      </div>
      <div class="col-md-3 mb-4">
        <div class="image-box">
          <img src="https://i.pinimg.com/564x/ed/93/7f/ed937fa18071c55052431b0512c39bb6.jpg"  alt="Police 3" class="img-fluid rounded-circle mx-auto d-block profile-image">
        </div>
        <p class="text-center mt-2 font-semibold">Lee minho</p>
        <p class="text-center">Sergeant</p>
      </div>
      <div class="col-md-3 mb-4">
        <div class="image-box">
          <img src="https://pbs.twimg.com/media/EWsFo6vU4AE_tQ-?format=jpg&name=medium" alt="Police 4" class="img-fluid rounded-circle mx-auto d-block profile-image">
        </div>
        <p class="text-center mt-2 font-semibold">Jung Hae in</p>
        <p class="text-center">Police Officer</p>
      </div>
    </div>
  </div>
</section>

@endsection

