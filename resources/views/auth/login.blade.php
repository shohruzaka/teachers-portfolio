@extends('auth.layout')

@section('content')

<main id="main-container">
  <!-- Page Content -->
  <div class="bg-image" style="background-image: url('assets/media/photos/photo19@2x.jpg');">
    <div class="row g-0 justify-content-center bg-primary-dark-op">
      <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
        <!-- Sign In Block -->
        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
          <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-4 bg-body-extra-light">
            <!-- Header -->
            <div class="mb-2 text-center">
              <a class="link-fx fw-bold fs-1" href="index.html">
                <span class="text-dark">Nur</span><span class="text-primary">afshon</span>
              </a>
              <p class="text-uppercase fw-bold fs-sm text-muted">Profilga kirish</p>
            </div>
            <!-- END Header -->

            <!-- Sign In Form -->
            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form class="js-validation-signin" action="{{route('login')}}" method="POST">
              @csrf
              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-username" name="email" placeholder="Email">
                  <span class="input-group-text">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="login-password" name="password" placeholder="Password">
                  <span class="input-group-text">
                    <i class="fa fa-asterisk"></i>
                  </span>
                  @error('pasword')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
                <div class="form-check d-flex justify-content-center">
                  <input type="checkbox" class="form-check-input" id="login-remember-me" name="remember" checked>
                  <label class="form-check-label ms-2" for="login-remember-me">Eslab qolish</label>
                </div>
                <div class="fw-semibold fs-sm py-1">
                  <a href="javascript:void(0)">Forgot Password?</a>
                </div>
              </div>
              <div class="text-center mb-4">
                <button type="submit" class="btn btn-hero btn-primary">
                  <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Log In
                </button>
              </div>
            </form>


            <div class="text-center mb-2">
              <a class="btn btn-lg btn-alt-primary" href="{{route('register')}}">
                <i class="fa fa-fw fa-plus me-1"></i> Registratsiya
              </a>
            </div>


            <!-- END Sign In Form -->
          </div>
        </div>
        <!-- END Sign In Block -->
      </div>
    </div>
  </div>
  <!-- END Page Content -->
</main>

@endsection