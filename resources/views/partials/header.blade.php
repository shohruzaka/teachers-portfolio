{{-- Sayt Header va Navigatsiya --}}
<header id="page-header">
  <div class="content-header">
    {{-- Chap qism — Logo --}}
    <div class="d-flex align-items-center">
      <a class="fw-semibold text-white tracking-wide" href="{{ route('home') }}">
        Port<span class="opacity-75">folio</span>
        <span class="fw-normal">Cyber Uni</span>
      </a>
    </div>

    {{-- O'ng qism — Foydalanuvchi --}}
    <div>
      @auth
      <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-user d-sm-none"></i>
          <span class="d-none d-sm-inline-block">
            <i class="si si-user me-1"></i>
            {{ auth()->user()->first_name }}
          </span>
          <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
          <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
            Foydalanuvchi
          </div>
          <div class="p-2">
            <a class="dropdown-item" href="{{ route('cabinet') }}">
              <i class="far fa-fw fa-user me-1"></i> Kabinet
            </a>
            <div role="separator" class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">
                <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Chiqish
              </button>
            </form>
          </div>
        </div>
      </div>
      @endauth

      @guest
      <a class="btn btn-alt-primary" href="{{ route('login') }}">
        <i class="si si-login me-1"></i> Kirish / Ro'yxatdan o'tish
      </a>
      @endguest
    </div>
  </div>
</header>

{{-- Navigatsiya --}}
<div class="bg-white p-3 rounded push">
  <div class="d-lg-none">
    <button type="button" class="btn w-100 btn-light d-flex justify-content-between align-items-center"
            data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered" data-class="d-none">
      Asosiy menu
      <i class="fa fa-bars"></i>
    </button>
  </div>

  <div id="horizontal-navigation-hover-centered" class="d-none d-lg-block mt-2 mt-lg-0">
    <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
      <li class="nav-main-item">
        <a class="nav-main-link" href="{{ route('home') }}">
          <i class="nav-main-link-icon far fa-address-book"></i>
          <span class="nav-main-link-name">O'qituvchilar tarkibi</span>
        </a>
      </li>
      <li class="nav-main-item">
        <a class="nav-main-link" href="{{ route('home') }}">
          <i class="nav-main-link-icon far fa-lightbulb"></i>
          <span class="nav-main-link-name">Ilmiy maqolalar</span>
        </a>
      </li>
      <li class="nav-main-item">
        <a class="nav-main-link" href="{{ route('home') }}">
          <i class="nav-main-link-icon far fa-file-lines"></i>
          <span class="nav-main-link-name">Tezislar</span>
        </a>
      </li>
      <li class="nav-main-item">
        <a class="nav-main-link" href="{{ route('home') }}">
          <i class="nav-main-link-icon far fa-folder"></i>
          <span class="nav-main-link-name">O'quv materiallari</span>
        </a>
      </li>
      <li class="nav-main-item">
        <a class="nav-main-link" href="{{ route('home') }}">
          <i class="nav-main-link-icon far fa-credit-card"></i>
          <span class="nav-main-link-name">Mualliflik guvohnomalari</span>
        </a>
      </li>
    </ul>
  </div>
</div>
