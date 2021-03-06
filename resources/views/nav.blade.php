<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark brown lighten-2 sticky-top">
  <a class="navbar-brand" href="{{ route('articles.index') }}">Coffee Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">ログイン
          <span class="sr-only">(current)</span>
        </a>
      </li>
      @endguest

      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
      </li>
      @endguest

      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ route('articles.create') }}">投稿する</a>
      </li>
      @endauth

      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle d-inline-block vertical-center" height="30px" width="30px" alt="avatar">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="{{ route('users.show', ['id' => Auth::user()]) }}">マイページ</a>
          <a class="dropdown-item" href="{{ route('users.edit', ['id' => Auth::user()]) }}">ユーザー情報編集</a>
          <button type="submit" form="logout-button" class="dropdown-item pl-2" href="{{ route('logout') }}">
            ログアウト
          </button>
        </div>
      </li>
      <form action="{{ route('logout') }}" method="post" id="logout-button">
        @csrf
      </form>
      @endauth

  </div>
</nav>
<!--/.Navbar -->
