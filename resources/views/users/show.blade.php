@extends('app')

@section('title', $user->name)

@section('content')

  @include('nav')
  {{ $user->name }}
@endsection
