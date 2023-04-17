@extends('layouts.app')

@section('content')
<div id="page-container" class="page-header-dark main-content-boxed">
  <!-- Header -->
  <header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
      <!-- Left Section -->
      <div class="d-flex align-items-center">
        <!-- Logo -->
        <a class="fw-semibold text-white tracking-wide" href="index.html">
          Port<span class="opacity-75">folio</span>
          <span class="fw-normal">TATU</span>
        </a>
        <!-- END Logo -->

        <!-- Open Search Section -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <!-- <button type="button" class="btn btn-alt-secondary ms-2" data-toggle="layout" data-action="header_search_on">
              <i class="fa fa-search"></i>
            </button> -->
        <!-- END Open Search Section -->
      </div>
      <!-- END Left Section -->

      <!-- Right Section -->
      <div>
        <!-- User Dropdown -->
        @auth
        <div class="dropdown d-inline-block">
          <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user d-sm-none"></i>

            <!-- @guest
            <span class="d-none d-sm-inline-block"><i class="si si-user me-1"></i>
              Mehmon
            </span>
            @endguest -->


            <span class="d-none d-sm-inline-block"><i class="si si-user me-1"></i>
              {{auth()->user()->first_name}}
            </span>

            <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
              Foydalanuvchi
            </div>
            <div class="p-2">
              <a class="dropdown-item" href="{{route('cabinet')}}">
                <i class="far fa-fw fa-user me-1"></i> Kabinet
              </a>
              
              <div role="separator" class="dropdown-divider"></div>

              <!-- Toggle Side Overlay -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

              <!-- END Side Overlay -->

              <div role="separator" class="dropdown-divider"></div>
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Log Out
                </button>
              </form>

            </div>
          </div>
        </div>
        @endauth
        @guest
        <button type="button" class="btn btn-alt-primary ">
          <a href="{{route('login')}}"> <i class="si si-login me-1"></i> Login / Registr </a>
        </button>
        @endguest
        <!-- END User Dropdown -->
      </div>
      <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-header-dark">
      <div class="content-header">
        <form class="w-100" action="be_pages_generic_search.html" method="POST">
          <div class="input-group">
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
              <i class="fa fa-fw fa-times-circle"></i>
            </button>
            <input type="text" class="form-control" placeholder="Where to?" id="page-header-search-input" name="page-header-search-input">
          </div>
        </form>
      </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-header-dark">
      <div class="content-header">
        <div class="w-100 text-center">
          <i class="fa fa-fw fa-2x fa-sun fa-spin text-primary"></i>
        </div>
      </div>
    </div>
    <!-- END Header Loader -->
  </header>
  <!-- END Header -->

  <!-- Main Container -->
  <main id="main-container">
    <!-- Top Navigation -->
    <div class="bg-white p-3 rounded push">
      <!-- Toggle Navigation -->
      <div class="d-lg-none">
        <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
        <button type="button" class="btn w-100 btn-light d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered" data-class="d-none">
          Asosiy menu
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <!-- END Toggle Navigation -->

      <!-- Navigation -->
      <div id="horizontal-navigation-hover-centered" class="d-none d-lg-block mt-2 mt-lg-0">
        <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
          <li class="nav-main-item">
            <a class="nav-main-link" href="be_ui_navigation_horizontal.html">
              <i class="nav-main-link-icon far fa-address-book"></i>
              <span class="nav-main-link-name">O'qituvchilar tarkibi</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link" href="be_ui_navigation_horizontal.html">
              <i class="nav-main-link-icon far fa-lightbulb"></i>
              <span class="nav-main-link-name">Ilmiy maqolalar</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link" href="be_ui_navigation_horizontal.html">
              <i class="nav-main-link-icon far fa-file-lines"></i>
              <span class="nav-main-link-name">Tezislar </span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link" href="be_ui_navigation_horizontal.html">
              <i class="nav-main-link-icon far fa-folder"></i>
              <span class="nav-main-link-name">O'quv materiallari</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link" href="be_ui_navigation_horizontal.html">
              <i class="nav-main-link-icon far fa-credit-card"></i>
              <span class="nav-main-link-name">Mualliflik guvohnomalari</span>
            </a>
          </li>

        </ul>
      </div>
      <!-- END Navigation -->
    </div>
    <!-- END Top Navigation -->

    <!-- Search -->
    <div class="content">
      <div class="text-center py-3">
        <h1 class="h3 fw-bold mb-2">Muhammad al-Xorazmiy nomidagi Toshkent axborot texnologiyalari universiteti Nurafshon filiali</h1>
        <h2 class="h5 fw-normal text-muted">Filial professor-o'qituvchilari ilmiy maqolalalari, tezislari</h2>
      </div>
      <h2 class="content-heading">
        <i class="fa fa-clock text-darker me-1"></i> So'nggi joylangan maqolalar
      </h2>

      @foreach($arts as $art)
      <div class="block block-rounded">
        <div class="block-content block-content-full">
          <div class="d-sm-flex">

            <div class="ms-sm-2 me-sm-4 py-3">
              <span class="item item-rounded bg-body-dark text-dark fs-2 mb-2 mx-auto">
                <i class="fa fa-fw fa-file-arrow-down"></i>
              </span>
              <a class="btn btn-sm btn-primary w-100" href="{{ route('download',[$art->id]) }}">
                Yuklash
              </a>
            </div>

            <div class="py-2">
              <p class="link-fx h4 mb-1 d-inline-block text-dark" href="be_pages_jobs_listing.html">
                {{ $art->title }}
              </p>
              <div class="fs-sm fw-semibold text-muted mb-2">
                {{ $art->journal_name}} - {{$art->pub_date}}
              </div>
              <p class="text-muted mb-2">
                {{$art->annotation}}
              </p>
              <div>
                @foreach($art->users as $user)
                <span class="badge bg-primary fw-semibold">{{$user->first_name}} {{$user->last_name}}</span>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </div>
      @endforeach
      {{$arts->links()}}




      <h2 class="content-heading">
      <i class="far fa-user me-1"></i> Professor o'qituvchilar
      </h2>
      <div class="row items-push">
        @foreach($userlar as $user)
        <div class="col-md-6 col-xl-3">
          <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content block-content-full">
              <img class="img-avatar" src="assets/media/avatars/avatar14.jpg" alt="">
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light">
              <p class="fw-semibold mb-0">{{$user->first_name}} {{$user->last_name}}</p>
              <p class="fs-sm fw-medium text-muted mb-0">
                PhD
              </p>
              <p class="fs-sm fw-medium text-muted mb-0">
                {{$user->department->dep_name}}
              </p>
              
            </div>
            <div class="block-content block-content-full">
              <div class="row g-sm">
                <div class="col-6">
                  <p class="mb-2">
                    <i class="far fa-fw fa-file-lines text-body-color-dark"></i>
                  </p>
                  <p class="fs-sm fw-medium text-muted mb-0">
                    7 Tezis
                  </p>
                </div>
                <div class="col-6">
                  <p class="mb-2">
                    <i class="far fa-fw fa-file-pdf text-body-color-dark"></i>
                  </p>
                  <p class="fs-sm fw-medium text-muted mb-0">
                    {{$user->articles->count()}} Articles
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>
    <!-- END Search -->

    <!-- Travel Packages -->
    <!-- END Travel Packages -->

    <!-- My Bookings -->

    <!-- END My Bookings -->
  </main>
  <!-- END Main Container -->

  <!-- Footer -->

  <!-- END Footer -->
</div>
@endsection