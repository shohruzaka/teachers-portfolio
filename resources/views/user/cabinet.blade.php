@extends('layouts.app')

@section('content')
<main id="main-container">
  <!-- Hero -->
  <div class="bg-header-dark">
    <div class="content content-full py-1">
      <div class="row pt-3">
        <div class="col-md py-3 d-md-flex align-items-md-center text-center">
          <h1 class="text-white mb-0">
            <span class="fw-semibold">Boshqaruv paneli</span>
            <span class="fw-medium fs-base text-white-75 d-block d-md-inline-block">Xush kelibsiz {{ auth()->user()->first_name }} </span>
          </h1>
        </div>
        <!-- <div class="col-md py-3 d-md-flex align-items-md-center justify-content-md-end text-center">
          <button type="button" class="btn btn-primary me-1">
            <i class="fa fa-plus opacity-50 me-1"></i> New Project
          </button>
          <button type="button" class="btn btn-primary">
            <i class="fa fa-cog"></i>
          </button>
        </div> -->
      </div>
    </div>
  </div>
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

      <!-- Quick Stats -->
      @if(auth()->user()->is_admin)
      <div class="row">
        <div class="col-md-6">
          <div class="block block-rounded">
            <div class="block-header bg-xinspire">
              <h3 class="block-title text-white">Kafedralar</h3>
              <div class="block-options">
                <!-- <button type="button" class="btn btn-sm btn-danger">+Qo'shish</button> -->
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-block-popout">+Qo'shish</button>
              </div>
            </div>
            <div class="block-content">
              <table class="table table-hover table-vcenter">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Kafedra</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">PO' soni</th>
                    <th class="text-center" style="width: 100px;">Amallar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($deps as $dep)
                  <tr>
                    <th class="text-center" scope="row">{{$dep->id}}</th>
                    <td class="fw-semibold">
                      <a href="#">{{$dep->dep_name}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <span class="badge bg-info">15</span>
                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <!-- modal -->
          <div class="modal fade" id="modal-block-popout" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout" role="document">
              <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Kafedra yaratish</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                      </button>
                    </div>
                  </div>

                  <div class="block-content">
                    <form action="{{route('department.create')}}" method="POST">
                      @csrf
                      <div class="mb-4">
                        <div class="input-group">
                          <input type="text" class="form-control form-control-alt" id="example-group3-input2-alt2" name="dep_name" placeholder="Kafedra nomi">
                          <button type="submit" class="btn btn-secondary">Qo'shish</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- modal -->
        </div>
      </div>
      @endif


      <div class="row">
        <div class="col-12">
          <h2 class="content-heading">
            <i class="fa fa-clock text-success me-1"></i> Barcha maqolalar
          </h2>
          @foreach($article as $ar)
          <div class="block block-rounded">
            <div class="block-content block-content-full">
              <div class="d-sm-flex">
                <div class="ms-sm-2 me-sm-4 py-2 text-center">
                  <a class="item item-rounded bg-body-dark text-dark fs-2 mb-2 mx-auto" href="{{ route('download',[$ar->id])}}">
                    <i class="si si-doc text-info"></i>
                  </a>
                  <a class="btn btn-sm btn-primary">
                    <i class="si si-pencil"></i> Edit
                  </a>
                  <form action="{{route('articles.destroy', $ar->id)}}">
                    @csrf @method('METHOD')
                    <button type="submit" class="btn btn-sm btn-danger my-1" onclick="return confirm('delete')">Delete</button>
                  </form>
                </div>
                <div class="py-2">
                  <a class="link-fx h4 mb-1 d-inline-block text-dark" href="be_pages_jobs_listing.html">
                    {{$ar->title}}
                  </a>
                  <div class="fs-sm fw-semibold text-muted mb-2">
                    {{$ar->journal_name}} - {{$ar->pub_date}}
                  </div>
                  <p class="text-muted mb-2">
                    {{$ar->annotation}}
                  </p>
                  <div>
                    @foreach($ar->users as $user)
                    <span class="badge bg-primary">{{ $user->first_name}} {{$user->last_name}} </span>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
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