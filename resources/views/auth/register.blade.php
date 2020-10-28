@extends('layouts.app')
@include('footer')
@section('content')
<div class="main">
  <div class="card devise-card">
    <div class="form-wrap">
      <div class="form-group text-center">
        <h2 class="logo">グルシェア</h2>
        <p class="text-secondary">おすすめのお店や料理をシェアしよう</p>
      </div>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="メールアドレス" autocomplete="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="error-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group">
          <input class="form-control" placeholder="ユーザーネーム" type="text" name="name" value="{{ old('name') }}" required >
        </div>

        <div class="form-group">
          <input class="form-control" placeholder="パスワード" autocomplete="off" type="password" name="password" required>
        @error ('password')
            <span class="error-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group">
          <input class="form-control" placeholder="パスワードの確認" autocomplete="off" type="password" name="password_confirmation" required>
        </div>

        <div class="actions">
          <input type="submit" name="regster" value="新規登録" class="btn btn-primary w-100">
        </div>
      </form>
      <br>

      <p class="devise-link">
        アカウントを既にお持ちの方はこちら
        <a href="/login">サインイン</a>
      </p>
    </div>
  </div>
</div>
@endsection