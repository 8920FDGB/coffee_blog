@extends('app')

@section('title', $article->title)

@section('content')

  @include('nav')

  <div class="container">
    <div class="row">
      <div class="col mx-auto mt-5 col-12 col-md-10 col-lg-7 col-xl-6">
        <div class="pb-3 mb-4">
          <img class="w-100" src="{{ asset('storage/' . $article->thumbnail) }}" alt="">
        </div>

        {{-- blog title --}}
        <h2 class="font-weight-bold py-3 mb-4">{{ $article->title }}</h2>

        {{-- profile --}}
        <div class="d-flex pb-3 mb-4">
          <!-- Avatar -->
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle d-inline-block mr-3" height="30px" width="30px" alt="avatar">
          <!-- Subtitle & username -->
          <div class="">
            <p class="small text-black-50 m-0"><i class="far fa-clock pr-2"></i>{{ $article->created_at->format('Y/m/d') }}</p>
            <p class="small text-black-50 m-0">{{ $article->user->name }}</p>
          </div>
        </div>

        {{-- body --}}
        <p class="h5">{{ $article->body }}</p>
      </div>
    </div>
  </div>
@endsection
