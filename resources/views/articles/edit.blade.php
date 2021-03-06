@extends('app')

@section('title', '記事編集')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col mx-auto mt-5 col-12 col-md-10 col-lg-8 col-xl-7">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              ブログ記事を編集
            </div>

            <form action="{{ route('articles.update', ['article' => $article]) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="md-form">
                <label for="title" class="mdb-main-label">タイトル</label>
                <input type="text" name="title" id="title" class="form-control px-2 @error('password') is-invalid @enderror" required value="{{ $article->title }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div>
                <select class="browser-default custom-select @error('password') is-invalid @enderror" name="category_id" id="category" required>
                  <option disabled selected>カテゴリー</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if ($category->id === $article->category_id) selected @endif>
                        {{ $category->name }}
                      </option>
                  @endforeach

                  @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </select>

              </div>

              <div class="md-form">
                <label for="body"></label>
                <textarea type="text" name="body" id="body" class="form-control p-2 @error('password') is-invalid @enderror" rows="16" required placeholder="本文">{{ $article->body }}</textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="pb-2 mb-4 border-bottom">
                <label for="thumbnail" class="btn btn-brown">ファイルを選択</label>
                <input type="file" name="thumbnail" id="thumbnail" accept=".png, .jpg, .jpeg, .pdf, .doc" class="d-none">
              </div>
              <button type="submit" class="btn btn-block btn-brown rounded-lg">更新する</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
