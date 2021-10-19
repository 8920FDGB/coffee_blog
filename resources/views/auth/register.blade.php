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
                        <input type="text" id="materialRegisterFormFirstName" name="name" class="form-control" required value="{{ old('name') }}">
                        <label for="materialRegisterFormFirstName">ユーザー名</label>
                        <small class="form-text text-muted mb-4">
                            3〜20文字以内
                        </small>
                    </div>

                    <!-- E-mail -->
                    <div class="md-form">
                        <input type="email" id="materialRegisterFormEmail" name="email" class="form-control" required value="{{ old('email') }}">
                        <label for="materialRegisterFormEmail">メールアドレス</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" id="materialRegisterFormPassword" name="password" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                        <label for="materialRegisterFormPassword">パスワード</label>
                        <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            8文字以上で設定してください
                        </small>
                    </div>

                    <!-- Password Confirm -->
                    <div class="md-form">
                        <input type="password" id="materialRegisterFormPasswordConfirm" name="password_confirmation" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                        <label for="materialRegisterFormPasswordConfirm">パスワード（確認用）</label>
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
