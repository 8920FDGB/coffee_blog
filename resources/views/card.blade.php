<!-- Card -->
<div class="card promoting-card w-auto">

  <!-- Card content -->
  <div class="card-body pb-3">

    <!-- Title -->
      <h4 class="h6 card-title font-weight-bold mb-2"><a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}</a></h4>

    <!-- Content -->
    <div class="d-flex">
      <!-- Avatar -->
      <a href="{{ route('users.show', ['id' => $article->user->id]) }}">
        <img src="{{ asset('storage/' . $article->user->avatar) }}" class="rounded-circle d-inline-block mr-3" height="30px" width="30px" alt="avatar">
      </a>

      <!-- Subtitle & username -->
      <div>
        <p class="small text-black-50 m-0"><i class="far fa-clock pr-2"></i>{{ $article->created_at->format('Y/m/d') }}</p>
        <p class="small text-black-50 m-0">
          <a href="{{ route('users.show', ['id' => $article->user->id]) }}" class="text-muted">
            {{ $article->user->name }}
          </a>
        </p>
      </div>

    </div>

  </div>

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top rounded-0" src="{{ asset('storage/' . $article->thumbnail) }}" alt="Card image cap">
    {{-- <a href="{{ route('articles.show', ['article' => $article]) }}"> --}}
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body p-1">
    <span class="p-1 mt-1 ml-2 badge badge-secondary">{{ $article->category->name }}</span>

    <i class="fas fa-share-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
    <span class="float-right mt-1 mr-2">{{ $article->count_likes }}</span>
    <i class="fas fa-heart text-muted float-right p-1 my-1 mr-1" data-toggle="tooltip" data-placement="top" title="I like it"></i>
  </div>

</div>
<!-- Card -->
