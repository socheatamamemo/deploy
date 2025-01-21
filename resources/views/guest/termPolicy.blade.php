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
      max-width: 1600px;
      padding: 5px;
      background: rgba(235, 233, 233, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 10px;
      margin: 0px auto;
      color: #fff;
  }

  .content-container h1, .content-container p {
      color: #fff;
  }

  .min-h-custom {
      min-height: 100vh; 
  }

  .flex-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
  }

  .text-content {
      width: 100%;
      padding: 20px;
  }
</style>

<div class="background-overlay"></div>
<section>
  <div class="container mt-5">
    <div class="row justify-content-center align-items-center min-h-custom">
      <div class="col-md-8 content-container">
        <div class="flex-container">
          <div class="text-content">
            <h1 class="font-italic font-bold text-4xl text-danger">Terms & Policy</h1>
            <br><br>
            <h2 class="text-xl font-bold text-primary">1. Introduction</h2>
            <p class="text-xl">
              Welcome to CrimeTrack, a platform dedicated to providing comprehensive crime tracking and analysis tools. By using our website, you agree to comply with and be bound by the following terms and conditions. Please review them carefully.
            </p>
            <br>
            <h2 class="text-xl font-bold text-primary">2. User Submissions</h2>
            <p class="text-xl">
              Users can submit crime or incident reports through our platform. By submitting a report, you agree to provide accurate and truthful information. CrimeTrack reserves the right to review, verify, and approve or reject any submission.
            </p>
            <br>
            <h2 class="text-xl font-bold text-primary">3. Data Privacy</h2>
            <p class="text-xl">
              We value your privacy and are committed to protecting your personal information. CrimeTrack collects and uses your data solely for the purpose of providing and improving our services. We do not share your data with third parties without your consent, except as required by law.
            </p>
            <br>
            <h2 class="text-xl font-bold text-primary">4. Use of the Map</h2>
            <p class="text-xl">
              Our interactive map displays crime incidents based on user submissions. The accuracy of the map depends on the accuracy of the submissions. CrimeTrack is not responsible for any errors or omissions in the data presented.
            </p>
            <br>
            <h2 class="text-xl font-bold text-primary">5. Limitation of Liability</h2>
            <p class="text-xl">
              CrimeTrack is not liable for any damages arising from the use of our website, including but not limited to direct, indirect, incidental, punitive, and consequential damages.
            </p>
            <br>
            <h2 class="text-xl font-bold text-primary">6. Changes to Terms</h2>
            <p class="text-xl">
              CrimeTrack reserves the right to modify these terms and conditions at any time. Any changes will be posted on this page. Your continued use of the website after any changes signifies your acceptance of the new terms.
            </p>
            <br>
            <h2 class="text-xl font-bold text-primary">7. Contact Us</h2>
            <p class="text-xl">
              If you have any questions about these terms and conditions, please contact us at support@crimetrack.com.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
