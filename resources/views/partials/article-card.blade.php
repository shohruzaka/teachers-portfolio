{{-- Maqola kartochkasi --}}
{{-- Ishlatish: @include('partials.article-card', ['article' => $art, 'showActions' => false]) --}}
<div class="block block-rounded">
  <div class="block-content block-content-full">
    <div class="d-sm-flex">

      <div class="ms-sm-2 me-sm-4 py-3 text-center">
        <span class="item item-rounded bg-body-dark text-dark fs-2 mb-2 mx-auto">
          <i class="fa fa-fw fa-file-arrow-down"></i>
        </span>
        <a class="btn btn-sm btn-primary w-100" href="{{ route('download', $article->id) }}">
          Yuklash
        </a>

        @if($showActions ?? false)
        <a class="btn btn-sm btn-alt-primary w-100 my-1" href="{{ route('articles.edit', $article->id) }}">
          <i class="si si-pencil"></i> Tahrirlash
        </a>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger w-100"
                  onclick="return confirm('O\'chirishni tasdiqlaysizmi?')">
            <i class="fa fa-times"></i> O'chirish
          </button>
        </form>
        @endif
      </div>

      <div class="py-2">
        <h4 class="link-fx mb-1 d-inline-block text-dark">{{ $article->title }}</h4>
        <div class="fs-sm fw-semibold text-muted mb-2">
          {{ $article->journal_name }} - {{ $article->pub_date }}
        </div>
        <p class="text-muted mb-2">{{ $article->annotation }}</p>
        <div>
          @foreach($article->users as $user)
          <span class="badge bg-primary fw-semibold">{{ $user->first_name }} {{ $user->last_name }}</span>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</div>
