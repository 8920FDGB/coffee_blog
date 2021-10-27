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
          {{-- ログイン中かつ自分でない場合にフォローボタンを表示 --}}
          @if (Auth::user() && $user->id !== Auth::user()->id)
          {{-- フォロー中かそうでないかでボタンを出し分け --}}
            @if ($user->isFollowedBy(Auth::user()))
              <a href="#" class="btn btn-primary ml-auto py-3 px-4"><i class="fas fa-user-check mr-2"></i>フォロー中</a>
            @else
              <a href="#" class="btn btn-outline-primary ml-auto py-3 px-4"><i class="fas fa-user-plus mr-2"></i>フォロー</a>
            @endif
          @endif
        </div>
        <div>
          <span class="text-muted mr-2">10 フォロー</span>
          <span class="text-muted mr-2">10 フォロワー</span>
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
    <div class="tab-pane fade" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab-classic">
      <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
        aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
        quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
    <div class="tab-pane fade" id="contact-classic" role="tabpanel" aria-labelledby="contact-tab-classic">
      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
        provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
        Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
        eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
        assumenda est, omnis dolor repellendus. </p>
    </div>
    <div class="tab-pane fade" id="awesome-classic" role="tabpanel" aria-labelledby="awesome-tab-classic">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        deserunt mollit anim id est laborum.</p>
    </div>
  </div>

</div>
<!-- Classic tabs -->
  </div>
@endsection
