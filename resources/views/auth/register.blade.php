@extends('app')

@section('title', 'ユーザー登録')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center">cofee blog</h1>
        <!-- Material form register -->
        <div class="card">

            <h5 class="card-header brown lighten-2 white-text text-center py-4">
                <strong>ユーザー登録</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- name -->
                    <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                        <label for="name">ユーザー名</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted mb-4">
                            3〜20文字以内
                        </small>
                    </div>

                    <!-- E-mail -->
                    <div class="md-form">
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                        <label for="email">メールアドレス</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                        <label for="password">パスワード</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            8文字以上で設定してください
                        </small>
                    </div>

                    <!-- Password Confirm -->
                    <div class="md-form">
                        <input type="password" id="password-confirmation" name="password_confirmation" class="form-control @error('password-confirmation') is-invalid @enderror" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                        <label for="password-confirmation">パスワード（確認用）</label>
                        @error('password-confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sign up button -->
                    <button class="btn btn-outline-brown waves-effect rounded-lg btn-block my-4" type="submit">登録する</button>

                    <div class="mt-0">
                        <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
                    </div>

                </form>
                <!-- Form -->

            </div>

        </div>
        <!-- Material form register -->

        <a class="pt-2 d-block" href="{{ route('index') }}">トップページへ戻る</a>
      </div>
    </div>
  </div>
@endsection
