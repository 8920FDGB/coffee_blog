@extends('app')

@section('title', $user->name)

@section('content')

  @include('nav')

  <div class="container">
    <div class="row justify-content-md-center pt-4 mt-5">
      <div class="col-2">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle d-inline-block mr-3" height="120px" width="120px" alt="avatar">
      </div>
      <div class="col-8 mt-2">
        <div class="d-flex">
          <p class="h2">{{ $user->name }}</p>
          <form action="{{ route('users.follow', ['id' => $user->id]) }}" method="POST" class="ml-auto">
            @csrf
            {{-- ログイン中かつ自分でない場合にフォローボタンを表示 --}}
            @if (Auth::user() && $user->id !== Auth::user()->id)
            {{-- フォロー中かそうでないかでボタンを出し分け --}}
              @if ($user->isFollowedBy(Auth::user()))
                @method('DELETE')
                <button type="submit" class="btn btn-block btn-primary ml-auto py-3 px-4"><i class="fas fa-user-check mr-2"></i>フォロー中</button>
              @else
                @method('PUT')
                <button type="submit" class="btn btn-block btn-outline-primary ml-auto py-3 px-4"><i class="fas fa-user-plus mr-2"></i>フォロー</button>
              @endif
            @endif
          </form>
        </div>
        <div>
          <span class="text-muted mr-2">{{ $user->count_followings }} フォロー</span>
          <span class="text-muted mr-2">{{ $user->count_followers }} フォロワー</span>
        </div>
      </div>
    </div>

    <!-- Classic tabs -->
<div class="mt-5">

  <ul class="nav md-tabs brown rounded-lg p-3 pt-4 shadow" id="myClassicTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link text-white rounded-lg d-inline-block waves-light active show" id="profile-tab-classic" data-toggle="tab" href="#profile-classic"
        role="tab" aria-controls="profile-classic" aria-selected="true">投稿記事<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white rounded-lg waves-light" id="follow-tab-classic" data-toggle="tab" href="#follow-classic" role="tab"
        aria-controls="follow-classic" aria-selected="false">いいねした記事</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white rounded-lg waves-light" id="contact-tab-classic" data-toggle="tab" href="#contact-classic" role="tab"
        aria-controls="contact-classic" aria-selected="false">フォロー</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white rounded-lg waves-light" id="awesome-tab-classic" data-toggle="tab" href="#awesome-classic" role="tab"
        aria-controls="awesome-classic" aria-selected="false">フォロワー</a>
    </li>
  </ul>
  <div class="tab-content p-3 " id="myClassicTabContent">
    {{-- 投稿記事 --}}
    <div class="tab-pane fade active show" id="profile-classic" role="tabpanel" aria-labelledby="profile-tab-classic">
      <div class="row">
        @foreach ($user->articles as $article)
          <div class="col-3 mb-3">
            @include('card', ['article' => $article])
          </div>
        @endforeach
        <div class="col-3">
            @include('card', ['article' => $article])
          </div>
          <div class="col-3">
            @include('card', ['article' => $article])
          </div>
          <div class="col-3">
            @include('card', ['article' => $article])
          </div>
          <div class="col-3">
            @include('card', ['article' => $article])
          </div>
          <div class="col-3">
            @include('card', ['article' => $article])
          </div>
      </div>
    </div>

    {{-- いいねした記事 --}}
    <div class="tab-pane fade" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab-classic">
      <div class="row">
        @foreach ($user->likes_articles as $likes_article)
            <div class="col-3 mb-3">
              @include('card', ['article' => $likes_article])
            </div>
        @endforeach
      </div>
    </div>

    {{-- フォロー --}}
    <div class="tab-pane fade" id="contact-classic" role="tabpanel" aria-labelledby="contact-tab-classic">
      <div class="row">
        @foreach ($user->followings as $followings)
          <div class="col-12 mb-2">
            @include('card_user', ['user' => $followings])
          </div>
        @endforeach
      </div>
    </div>

    {{-- フォロワー --}}
    <div class="tab-pane fade" id="awesome-classic" role="tabpanel" aria-labelledby="awesome-tab-classic">
      <div class="row">
        {{-- {{ $user->followers }} --}}
        @foreach ($user->followers as $followers)
          <div class="col-12 mb-2">
            @include('card_user', ['user' => $followers])
          </div>
        @endforeach
      </div>
    </div>
  </div>

</div>
<!-- Classic tabs -->
  </div>
@endsection
