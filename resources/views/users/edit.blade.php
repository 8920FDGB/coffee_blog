@extends('app')

@section('title', 'ユーザー情報編集 - ' . $user->name)

@section('content')

  @include('nav')

  <div class="container">
    <div class="row">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            <h1 class="text-center">cofee blog</h1>
            <!-- Material form register -->
            <div class="card">

                <h5 class="card-header brown lighten-2 white-text text-center py-4">
                    <strong>ユーザー情報編集</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <!-- name -->
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="materialRegisterFormPasswordHelpBlock" required value="{{ $errors->any() ? old('name') : $user->name }}">
                            <label for="name">ユーザー名</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- E-mail -->
                        <div class="md-form">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ $errors->any() ? old('email') : $user->email }}">
                            <label for="email">メールアドレス</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sign up button -->
                        <button class="btn btn-outline-brown waves-effect rounded-lg btn-block my-4" type="submit">変更を保存する</button>

                        <div class="mt-0">
                            <a href="{{ route('register') }}" class="card-text">ユーザー登録はこちら</a>
                        </div>

                    </form>
                    <!-- Form -->

                </div>

            </div>
            <!-- Material form register -->

            <a class="pt-2 d-block" href="{{ route('articles.index') }}">トップページへ戻る</a>
        </div>
    </div>
</div>
@endsection
