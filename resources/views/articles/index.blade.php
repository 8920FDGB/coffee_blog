@extends('app')

@section('title', '記事一覧')

@section('content')
  <!--Navbar -->
  @include('nav')
  <!--/.Navbar -->

  <div class="container">

    @foreach ($articles as $category => $articlesList)
      <div class="mb-4">
        <h2 class="h4 pt-4 pb-1 border-bottom font-weight-bold text-dark">{{$category}}</h2>
        <div class="row pt-2 pb-4 px-2 d-flex flex-nowrap overflow-auto">
          @foreach ($articlesList as $article)
            <div class="col-3">
              @include('card', ['article' => $article])
            </div>
          @endforeach
        </div>
      </div>
    @endforeach

@endsection
