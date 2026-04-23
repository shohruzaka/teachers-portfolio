@extends('layouts.app')

@section('title', 'Maqola qo\'shish')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
<main id="main-container">

    {{-- Hero Section --}}
    @include('partials.hero', ['title' => 'Maqola qo\'shish'])

    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded block-themed">
            <div class="block-header bg-xinspire-light">
                <h3 class="block-title">Maqola ma'lumotlari</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Maqolaning nomi, annotatsiyasi va chop etilgan jurnaldagi sahifalarni *pdf yoki word formatida kiriting!
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-8">
                            <div class="mb-4">
                                <label class="form-label" for="title-input">Maqola sarlavhasi</label>
                                <input type="text" class="form-control" id="title-input" name="title" placeholder="Sarlavhani kiriting...">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="annotation-input">Annotatsiya</label>
                                <textarea class="form-control" id="annotation-input" name="annotation" rows="4" placeholder="Maqola annotatsiyasi..."></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="journal-input">Jurnal nomi</label>
                                <input type="text" class="form-control" id="journal-input" name="journal_name" placeholder="Jurnal nomini kiriting...">
                            </div>

                            <div class="col-xl-4 mb-4">
                                <label class="form-label" for="flatpickr-default">Nashr qilingan sana</label>
                                <input type="text" class="js-flatpickr form-control js-flatpickr-enabled flatpickr-input" id="flatpickr-default" name="pub_date" placeholder="YYYY-MM-DD">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="file-input">Faylni yuklang</label>
                                <input class="form-control" type="file" id="file-input" name="file_url">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="select2-multiple">Muallif qo'shish</label>
                                <select class="js-select2 form-select" id="select2-multiple" name="users[]" data-placeholder="Hammuallif qo'shish.." multiple>
                                    <option></option>
                                    @foreach($users as $v)
                                    <option value="{{ $v['id'] }}" {{ auth()->id() == $v['id'] ? 'selected' : '' }}>
                                        {{ $v['first_name'] }} {{ $v['last_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                @include('partials.errors')
                            </div>

                            <button type="submit" class="btn btn-hero btn-primary mb-3 text-end">
                                <i class="fa fa-fw fa-upload me-1"></i> Yuklash
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Elements -->
    </div>
</main>
@endsection

@push('js')
<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    Dashmix.onLoad(function(){
        flatpickr("#flatpickr-default", {});
        $('#select2-multiple').select2();
    });
</script>
@endpush