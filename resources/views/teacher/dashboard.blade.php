@extends('layouts.app')

@section('content')
<main id="main-container">
  <!-- Hero -->
  @include('partials.hero', ['title' => 'Boshqaruv paneli'])
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="bg-body-extra-light">
    <div class="content content-full">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Bosh sahifa</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Boshqaruv paneli</li>
        </ol>
      </nav>
      <!-- END Breadcrumb -->

      <!-- Quick Menu -->

      <div class="row">
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="my-2">
                <i class="fa fa-circle-user fa-2x text-muted"></i>
              </p>
              <p class="fw-semibold">Profil <br>sozlamalari</p>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-modern ribbon-primary text-center" href="{{route('articles.create')}}">
            <div class="ribbon-box">{{$article->count()}}</div>
            <div class="block-content">
              <p class="my-2">
                <!-- <i class="fa fa-envelope-open "></i> -->
                <i class="si si-book-open fa-2x text-muted"></i>
              </p>
              <p class="fw-semibold">Maqola <br>qo'shish</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-modern ribbon-success text-center" href="javascript:void(0)">
            <div class="ribbon-box">3</div>
            <div class="block-content">
              <p class="my-2">
                <i class="si si-notebook fa-2x text-muted"></i>
                <!-- <i class="fa fa-books fa-2x text-muted"></i> -->

              </p>
              <p class="fw-semibold">O'quv materiallari</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="my-2">
                <i class="si si-note fa-2x text-muted"></i>
              </p>
              <p class="fw-semibold">Uslubiy ko'rsatmalar</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-modern ribbon-primary text-center" href="javascript:void(0)">
            <div class="ribbon-box">24</div>
            <div class="block-content">
              <p class="my-2">
                <i class="si si-credit-card fa-2x text-muted"></i>
              </p>
              <p class="fw-semibold">Dasturiy guvohnomalar</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="my-2">
                <i class="si si-briefcase fa-2x text-muted"></i>
              </p>
              <p class="fw-semibold">Boshqa <br>hujjatlar</p>
            </div>
          </a>
        </div>
      </div>
      <!-- END Quick Menu -->

      <!-- Statistics -->

      <!-- END Statistics -->




      <div class="row">
        <div class="col-12">
          <h2 class="content-heading">
            <i class="fa fa-clock text-success me-1"></i> Mening maqolalarim
          </h2>
          @if($article->isEmpty())
              <div class="alert alert-info">
                  Hozircha maqolalar mavjud emas.
              </div>
          @endif
          @foreach($article as $ar)
              @include('partials.article-card', ['article' => $ar, 'showActions' => true])
          @endforeach
        </div>
      </div>
      <!-- END Quick Stats -->

    </div>
  </div>
  <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Footer -->
@endsection