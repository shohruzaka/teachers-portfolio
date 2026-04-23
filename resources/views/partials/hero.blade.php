{{-- Dashboard Hero Section --}}
{{-- Ishlatish: @include('partials.hero', ['title' => 'Boshqaruv paneli']) --}}
<div class="bg-header-dark">
  <div class="content content-full py-1">
    <div class="row pt-3">
      <div class="col-md py-3 d-md-flex align-items-md-center text-center">
        <h1 class="text-white mb-0">
          <span class="fw-semibold">{{ $title ?? 'Boshqaruv paneli' }}</span>
          @auth
          <span class="fw-medium fs-base text-white-75 d-block d-md-inline-block">
            Xush kelibsiz {{ auth()->user()->first_name }}
          </span>
          @endauth
        </h1>
      </div>
      <div class="col-md py-3 d-md-flex align-items-md-center justify-content-md-end text-center">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-alt-danger">
            <i class="fa fa-sign-out-alt opacity-50 me-1"></i> Tizimdan chiqish
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
