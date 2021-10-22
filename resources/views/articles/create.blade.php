@extends('app')

@section('title', '記事作成')

@section('content')

  @include('nav')

  <div class="container">
    <div class="row">
      <div class="col mx-auto mt-5 col-12 col-md-10 col-lg-7 col-xl-6">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('articles.store') }}" method="post">
              @csrf
              <div class="md-form">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" required>
              </div>
              <div class="md-form">
                <label for="body"></label>
                <textarea type="text" name="body" id="body" class="form-control p-2" rows="30" required placeholder="本文"></textarea>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
