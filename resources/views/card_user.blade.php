<div class="card p-3 d-flex flex-row">
  <div class="">
    <a href="{{ route('users.show',  ['id' => $user->id]) }}"><img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle d-inline-block mr-3" height="40px" width="40px" alt="avatar"></a>
  </div>
  <div class="">
    <p class="h5 mb-1"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="text-dark">{{ $user->name }}</a></p>
    <div>
      <span class="text-muted mr-2">10 フォロー</span>
      <span class="text-muted mr-2">10 フォロワー</span>
    </div>
  </div>
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
