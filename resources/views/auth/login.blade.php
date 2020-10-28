@extends('layouts.app')
@include('footer')

@section('content')
<div class="main">
  <div class="card devise-card">
    <div class="form-wrap">
      <div class="form-group text-center">
        <h2 class="logo">グルシェア</h2>
      </div>
      <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
        @csrf
        <div class="form-group">
          <input id="email" type="email" class="form-control" name="email"  placeholder="メールアドレス" value="{{ old('email') }}" required autofocus>
          @error('email')
            <span class="error-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="password" type="password" class="form-control" name="password" placeholder="パスワード" required>
          @error('password')
            <span class="error-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="actions">
          <input type="submit" name="commit" value="サインイン" class="btn btn-primary w-100">

          {{--@if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                パスワードをお忘れですか？
            </a>
          @endif--}}
        </div>
      </form>

      <br>
      <p class="devise-link">
        アカウントをお持ちでない方はこちら
        <a href="{{ route('register') }}">新規登録</a>
      </p>

    </div>
  </div>
</div>
@endsection
