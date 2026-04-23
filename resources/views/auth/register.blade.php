@extends('auth.layout')

@section('title', 'Ro\'yxatdan o\'tish')

@section('content')
<main id="main-container">
  <!-- Page Content -->
  <div class="bg-image" style="background-image: url('{{ asset('assets/media/photos/photo14@2x.jpg') }}');">
    <div class="row g-0 justify-content-center bg-black-75">
      <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
        <!-- Sign Up Block -->
        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
          <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
            <!-- Header -->
            <div class="mb-2 text-center">
              <a class="link-fx fw-bold fs-1" href="{{ route('home') }}">
                <span class="text-dark">Nur</span><span class="text-primary">afshon</span>
              </a>
              <p class="text-uppercase fw-bold fs-sm text-muted">Ro'yxatdan o'tish</p>
            </div>
            <!-- END Header -->

            <!-- Sign Up Form -->
            <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
              @csrf

              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="signup-firstname" name="first_name" placeholder="Ismingiz..." value="{{ old('first_name') }}">
                  <span class="input-group-text">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="signup-lastname" name="last_name" placeholder="Familiyangiz..." value="{{ old('last_name') }}">
                  <span class="input-group-text">
                    <i class="fa fa-user-circle"></i>
                  </span>
                  @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="signup-email" name="email" placeholder="Elektron pochta" value="{{ old('email') }}">
                  <span class="input-group-text">
                    <i class="fa fa-envelope-open"></i>
                  </span>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="signup-password" name="password" placeholder="Parol">
                  <span class="input-group-text">
                    <i class="fa fa-asterisk"></i>
                  </span>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="mb-4">
                <div class="input-group input-group-lg">
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="signup-password-confirm" name="password_confirmation" placeholder="Parolni tasdiqlash">
                  <span class="input-group-text">
                    <i class="fa fa-asterisk"></i>
                  </span>
                </div>
              </div>

              <div class="text-center mb-4">
                <button type="submit" class="btn btn-hero btn-primary w-100">
                  <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Ro'yxatdan o'tish
                </button>
              </div>
            </form>

            {{-- Ajratuvchi chiziq --}}
            <div class="d-flex align-items-center mb-3">
              <hr class="flex-grow-1">
              <span class="px-3 text-muted fs-sm fw-medium">yoki</span>
              <hr class="flex-grow-1">
            </div>

            {{-- GitHub orqali ro'yxatdan o'tish --}}
            <div class="text-center mb-3">
              <a class="btn btn-lg btn-dark w-100" href="{{ route('auth.github') }}">
                <i class="fa-brands fa-github me-2"></i> GitHub orqali ro'yxatdan o'tish
              </a>
            </div>
            
            <div class="text-center mb-2">
              <span class="fs-sm text-muted">Allaqachon hisobingiz bormi?</span>
              <a class="btn btn-lg btn-alt-primary w-100 mt-2" href="{{ route('login') }}">
                <i class="fa fa-fw fa-sign-in-alt me-1"></i> Kirish
              </a>
            </div>

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