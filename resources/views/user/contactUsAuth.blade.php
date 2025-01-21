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
      z-index: -1;
  }

  .form-container {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 700px;
      padding: 20px;
      background: rgba(235, 233, 233, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 10px;
      margin: 80px auto 80px auto;
      color: #fff;
  }

  .form-container h1, .form-container label, .form-container p {
      color: #fff;
  }

  .form-container input, .form-container textarea, .form-container button {
      color: #fff;
  }

  .form-container input::placeholder, .form-container textarea::placeholder {
      color: #ddd;
  }

  .min-h-custom {
      min-height: 60vh; /* Adjusted minimum height */
  }
</style>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="background-overlay"></div>
<section>
  <div class="container mt-5">
    <div class="row justify-content-center align-items-center min-h-custom">
      <div class="col-md-8 text-center content-wrapper">
        <h1 class="display-4 text-white fw-bold">Contact CrimeTrack</h1>
        <p class="lead text-red-800 font-medium">Need help? We're here for you!</p>
        <p class="content text-white">Whether you have a question, need support, or simply want to learn more, feel free to reach out to us using the form below. Our team will respond to you as soon as possible.</p>
      </div>

      <div class="col-md-8 form-container">
        <form action="{{ route('contact.authSubmit') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="full_name" class="form-label">Full Name</label>
              <input type="text" class="form-control bg-transparent border border-gray-300" id="full_name" name="full_name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email_address" class="form-label">Email Address</label>
              <input type="email" class="form-control bg-transparent border border-gray-300" id="email_address" name="email_address" value="{{ Auth::user()->email }}" readonly required>
            </div>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control bg-transparent border border-gray-300" id="message" name="message" rows="5" required></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
