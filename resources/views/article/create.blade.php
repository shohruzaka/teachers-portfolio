@extends('layouts.app')


@section('content')
<main id="main-container">

    <div class="bg-header-dark">
        <div class="content content-full py-1">
            <div class="row pt-3">
                <div class="col-md py-3 d-md-flex align-items-md-center text-center">
                    <h1 class="text-white mb-0">
                        <span class="fw-semibold">Boshqaruv paneli</span>
                        <span class="fw-medium fs-base text-white-75 d-block d-md-inline-block">Xush kelibsiz {{ auth()->user()->first_name }} </span>
                    </h1>
                </div>

            </div>
        </div>
    </div>
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded block-themed">
            <div class="block-header bg-xinspire-light">
                <h3 class="block-title">Maqola qo'shish</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Elements -->
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Maqolaning nomi, annotatsiyasi va chop etilgan jurnaldagi sahifalarni *pdf yoki word formatida kiriting !
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-8">
                            <div class="mb-4">
                                <label class="form-label" for="text-input">Maqola sarlavhasi</label>
                                <input type="text" class="form-control" id="text-input" name="title" placeholder="sarlavhani kiriting...">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="textarea-input">Annotatsiya</label>
                                <textarea class="form-control" id="textarea-input" name="annotation" rows="4" placeholder="Maqola annotatsiyasi.."></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="journal-input">Jurnal nomi</label>
                                <input type="text" class="form-control" id="journal-input" name="journal_name" placeholder="Jurnal nomini kiriting...">
                            </div>

                            <div class="col-xl-4 mb-4">
                                <label class="form-label" for="flatpickr-default">Nashr qilingan sana</label>
                                <input type="text" class="js-flatpickr form-control js-flatpickr-enabled flatpickr-input" id="flatpickr-default" name="pub_date" placeholder="2023-01-01">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="file-input">Faylni yuklang</label>
                                <input class="form-control" type="file" id="file-input" name="file_url">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="select2-multiple">Muallif qo'shish</label>
                                <select class="js-select2 form-select" id="select2-multiple" name="users[]" data-placeholder="Hammuallif qo'shish.." multiple>
                                    <option></option>
                                    @foreach($users as $k => $v)
                                    <!-- <option value="{{ $v['id'] }}">{{ $v['first_name'] ." ". $v['last_name'] }}</option> -->
                                    <option value="{{ $v['id'] }}" "@if(auth()->user()->id == $v['id'])" selected @endif>
                                        {{ $v['first_name'] ." ". $v['last_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
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