@extends('app')

@section('title', '記事一覧')

@section('content')

  <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <div class="bg-image" style="
          background-image: url({{ asset('storage/slide/slide01.jpg') }});
          height: 260px; background-size: cover; background-position: center; ">
        </div>
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">あなたのコーヒーを語ろう</h3>
        <p>味も 場所も 体験も</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <div class="bg-image" style="
          background-image: url({{ asset('storage/slide/slide02.jpg') }});
          height: 260px; background-size: cover; background-position: center; ">
        </div>
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">知りたいのは味だけじゃなく</h3>
        <p>暮らしの中の１ページです</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <div class="bg-image" style="
          background-image: url({{ asset('storage/slide/slide03.jpg') }});
          height: 260px; background-size: cover; background-position: center; ">
        </div>
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">行きつけは独占せずに</h3>
        <p>みんなで共有してみましょう</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

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
  </div>
@endsection
