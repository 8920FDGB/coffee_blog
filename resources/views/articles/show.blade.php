@extends('app')

@section('title', $article->title)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col mx-auto mt-5 col-12 col-md-10 col-lg-7 col-xl-6">
        <div class="pb-3 mb-4">
          <img class="w-100" src="{{ asset('storage/' . $article->thumbnail) }}" alt="">
        </div>

        {{-- blog title --}}
        <h2 class="font-weight-bold py-3 mb-4">{{ $article->title }}</h2>

        {{-- profile --}}
        <div class="d-flex pb-3 mb-2">
          <!-- Avatar -->
          <a href="{{ route('users.show', ['id' => $article->user_id]) }}"><img src="{{ asset('storage/' . $article->user->avatar) }}" class="rounded-circle d-inline-block mr-3" height="34px" width="34px" alt="avatar"></a>
          <!-- Subtitle & username -->
          <div class="">
            <p class="small text-black-50 m-0"><i class="far fa-clock pr-2"></i>{{ $article->created_at->format('Y/m/d') }}</p>
            <p class="small text-black-50 m-0"><a href="{{ route('users.show', ['id' => $article->user_id]) }}" class="text-muted">{{ $article->user->name }}</a></p>
          </div>

          @if (Auth::id() === $article->user_id)
            <div class="ml-auto">
              <a href="{{ route('articles.edit', ['article' => $article]) }}" class="btn btn-outline-brown rounded-lg">記事を編集</a>
              <button type="button" href="" class="btn btn-brown rounded-lg" data-toggle="modal" data-target="#centralModal">
                記事を削除
              </button>
            </div>

            <!-- Central Modal Medium Danger -->
            <div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-notify" role="document">
                <!--Content-->
                <div class="modal-content">
                  <!--Header-->
                  <div class="modal-header brown lighten-2">
                    <p class="heading lead">ブログ削除</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                  </div>

                  <!--Body-->
                  <form action="{{ route('articles.destroy', ['article' => $article]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                      <div class="text-center">
                        <p>ブログを削除します。<br>よろしいですか？</p>
                      </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a type="button" class="btn btn-outline-brown rounded-lg waves-effect" data-dismiss="modal">キャンセル</a>
                      <button type="submit" class="btn btn-danger rounded-lg">削除する</button>
                    </div>
                  </form>
                </div>
                <!--/.Content-->
              </div>
            </div>
          @endif
        </div>

        <div class="mb-5">
          <form action="{{ route('articles.like', ['article' => $article]) }}" method="post" class="d-inline p-0">
            @csrf
            @if ($article->isLikedBy(Auth::user()))
              @method('DELETE')
            @else
              @method('PUT')
            @endif
            <button type="submit" class="btn m-0 p-0 shadow-none">
              <i class="fas fa-heart {{ $article->isLikedBy(Auth::user()) ? 'red-text' : 'text-muted' }} p-1 mr-1" data-toggle="tooltip" data-placement="top" title="I like it"></i>
            </button>
          </form>
          <span>{{ $article->count_likes }}</span>
        </div>

        {{-- body --}}
        <p class="h5">{{ $article->body }}</p>
      </div>
    </div>
  </div>
@endsection
