@extends('layouts.app')
@section('content')
<div class="panel-body">
  <div class="d-flex flex-column align-items-center mt-3">
    <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
      <div class="card">
        <div class="card-header">
          投稿画面
        </div>
        <div class="card-body">
          <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('posts')}}" accept-charset="UTF-8" method="POST">
            @csrf
            <div class="form-group row mt-2">
              <div class="col-auto pr-0">
                @if (Auth::user()->image)
                  <img class="post-profile-icon round-img" src="data:image/png;base64,{{ Auth::user()->image }}"/>
                @endif
              </div>
              <div class="col pl-0">
                <input class="form-control border-0" placeholder="キャプションを書く" type="text" name="caption" value="{{ old('caption') }}"/>
                @error('caption')
                  <span class="error-block" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <input type="file" name="photo" accept="image/jpeg,image/gif,image/png" /><br>
              @error('photo')
                <span class="error-block" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="col pl-0">
              <input class="form-control place" placeholder="店名を入力" type="text" name="place" value="{{ old('place') }}"/>
              @error('place')
                <span class="error-block" role="alert">
                  {{ $message }}
                </span>
              @enderror
              <input class="form-control genre" placeholder="ジャンルを入力　例）ラーメン、和食、etc.." type="text" name="genre" value="{{ old('genre') }}" />
              @error('genre')
                <span class="error-block" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <input class="form-control address" placeholder="住所を入力" type="text" name="address" value="{{ old('address') }}" />
            @error('address')
              <span class="error-block" role="alert">
                {{ $message }}<br>
              </span>
              @enderror
              <a  class="btn btn-secondary" href="/">戻る</a>
              <input type="submit" name="commit" value="投稿する" class="btn btn-primary" data-disable-with="投稿する" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection