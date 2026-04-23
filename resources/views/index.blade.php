@extends('layouts.app')

@section('title', 'TeachPort — Bosh sahifa')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Search -->
    <div class="content">
        <div class="text-center py-3">
            <h1 class="h3 fw-bold mb-2">"Cyber University" davlat universiteti</h1>
            <h2 class="h5 fw-normal text-muted">Professor-o'qituvchilar ilmiy maqolalalari, tezislari</h2>
        </div>
        <h2 class="content-heading">
            <i class="fa fa-clock text-darker me-1"></i> So'nggi joylangan maqolalar
        </h2>

        @foreach($arts as $art)
            @include('partials.article-card', ['article' => $art])
        @endforeach

        {{ $arts->links() }}

        <h2 class="content-heading">
            <i class="far fa-user me-1"></i> Professor o'qituvchilar
        </h2>
        
        <div class="row items-push">
            @foreach($userlar as $user)
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar14.jpg') }}" alt="{{ $user->first_name }} avatari">
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <p class="fw-semibold mb-0">{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p class="fs-sm fw-medium text-muted mb-0">PhD</p>
                        <p class="fs-sm fw-medium text-muted mb-0">
                            {{ $user->department->dep_name ?? 'Kafedra biriktirilmagan' }}
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
                                    {{ $user->articles->count() }} Maqola
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
</main>
<!-- END Main Container -->
@endsection