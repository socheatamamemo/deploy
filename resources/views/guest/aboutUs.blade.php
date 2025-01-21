@extends('layout.master')

@section('content')
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
        z-index: -1;
    }
  
    .content-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 1350px;
        padding: 20px;
        background: rgba(235, 233, 233, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        margin: 80px auto;
        color: #fff;
    }
  
    .content-container h1, .content-container p {
        color: #fff;
    }
  
    .min-h-custom {
        min-height: 60vh;
    }
  
    .flex-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
    }
  
    .text-content {
        flex: 1;
        padding: 20px;
    }
  
    .image-content {
        flex: 1;
        padding: 0;
    }
  
    .image-content img {
        max-width: 100%;
        height: auto;
        border-radius: 20px;
    }
  </style>
  
  <div class="background-overlay"></div>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center align-items-center min-h-custom">
        <div class="col-md-8 content-container">
          <div class="flex-container">
            <div class="text-content">
              <h1 class="font-italic font-bold text-4xl text-danger">CrimeTrack</h1>
              <br><br>
              <p class="text-xl">
                CrimeTrack is your premier online resource for tracking and analyzing crime incidents in Cambodia. We understand the complexities of criminal activity and are committed to developing a dynamic real-time crime mapping tool to empower individuals and communities to proactively prevent crime.
                <br><br>
                Our user-friendly interface provides access to comprehensive crime data, interactive maps, and insightful analyses. This empowers users to make informed decisions and develop strategies to mitigate risks and safeguard communities. We continuously update our platform to ensure you have access to the latest information and trends in crime dynamics.
                <br><br>
              </p>
              <p class="text-xl font-bold">Join us in building a safer Cambodia. Explore CrimeTrack today!</p>
            </div>
            <div class="image-content">
              <img src="{{ asset('storage/crime.png') }}" class="img-fluid" alt="CrimeTrack">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  