@extends('app')

@section('title', $article->title)

@section('content')

  @include('nav')

  <div class="container">
    <p>{{ $article->body }}</p>
  </div>
@endsection
