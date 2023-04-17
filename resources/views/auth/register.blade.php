@extends('auth.layout')

@section('content')
<main id="main-container">
  <!-- Page Content -->
  <div class="bg-image" style="background-image: url('assets/media/photos/photo14@2x.jpg');">
    <div class="row g-0 justify-content-center bg-black-75">
      <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
        <!-- Sign Up Block -->
        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
          <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
            <!-- Header -->
            <div class="mb-2 text-center">
              <a class="link-fx fw-bold fs-1" href="index.html">
                <span class="text-dark">Nur</span><span class="text-primary">afshon</span>
              </a>
              <p class="text-uppercase fw-bold fs-sm text-muted">Ro'yxatdan o'tish</p>
            </div>
            <!-- END Header -->

            <!-- Sign Up Form -->
            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form class="js-validation-signup" action="{{route('register')}}" method="POST">
              @csrf

              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="signup-username" name="first_name" placeholder="Ismingiz...">
                  <span class="input-group-text">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  @error('first_name')
                    <div class="invalid-feedback"> {{ $message}} </div>
                  @enderror
                </div>
              </div>
              <!-- ism -->
              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="signup-username" name="last_name" placeholder="Familiya...">
                  <span class="input-group-text">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  @error('last_name')
                    <div class="invalid-feedback"> {{ $message}} </div>
                  @enderror
                </div>
              </div>
              <!-- familiyasi -->
              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="signup-email" name="email" placeholder="Email">
                  <span class="input-group-text">
                    <i class="fa fa-envelope-open"></i>
                  </span>
                  @error('email')
                    <div class="invalid-feedback"> {{ $message}} </div>
                  @enderror
                </div>
              </div>
              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="signup-password" name="password" placeholder="Password">
                  <span class="input-group-text">
                    <i class="fa fa-asterisk"></i>
                  </span>
                  @error('password')
                    <div class="invalid-feedback"> {{ $message}} </div>
                  @enderror
                </div>
              </div>
              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="signup-password-confirm" name="password_confirmation" placeholder="Password Confirm">
                  <span class="input-group-text">
                    <i class="fa fa-asterisk"></i>
                  </span>
                  @error('password')
                    <div class="invalid-feedback"> {{ $message}} </div>
                  @enderror

                </div>
              </div>
              <div class="text-center mb-4">
                <button type="submit" class="btn btn-hero btn-primary">
                  <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Register
                </button>
              </div>
            </form>
            <!-- END Sign Up Form -->
          </div>
        </div>
      </div>
      <!-- END Sign Up Block -->
    </div>
  </div>
  <!-- END Page Content -->
</main>

@endsection