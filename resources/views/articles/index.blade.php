@extends('app')

@section('title', '記事一覧')

@section('content')
  <!--Navbar -->
  @include('nav')
  <!--/.Navbar -->

  <div class="container">
    <h2 class="pt-4 pb-2 border-bottom">記事一覧</h2>
    <div class="row py-4 px-2 d-flex flex-nowrap overflow-auto">
      <div class="col-4">
        @include('card')
      </div>
      <div class="col-4">
        @include('card')
      </div>
      <div class="col-4">
        @include('card')
      </div>
      <div class="col-4">
        @include('card')
      </div>

    </div>
  </div>
@endsection
