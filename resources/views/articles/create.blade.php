@extends('app')

@section('title', '記事作成')

@section('content')

  @include('nav')

  <div class="container">
    <div class="row">
      <div class="col mx-auto mt-5 col-12 col-md-10 col-lg-8 col-xl-7">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              ブログ記事を作成
            </div>

            <form action="{{ route('articles.store') }}" method="post">
              @csrf
              <div class="md-form">
                <label for="title" class="mdb-main-label">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" required>
              </div>
              <div>
                <select class="browser-default custom-select" required>
                  <option selected>カテゴリー</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                </select>
              </div>
              <div class="md-form">
                <label for="body"></label>
                <textarea type="text" name="body" id="body" class="form-control p-2" rows="16" required placeholder="本文"></textarea>
              </div>
              <div class="pb-2 mb-4 border-bottom">
                <label for="thumbnail" class="btn btn-brown">ファイルを選択</label>
                <input type="file" name="thumbnail" id="thumbnail" accept=".png, .jpg, .jpeg, .pdf, .doc" class="d-none">
              </div>
              <button type="submit" class="btn btn-block btn-brown rounded-lg">投稿する</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
