@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')

<div class="row justify-content-center my-md-4 ">
  <div class="col-md-8">
    <strong class="follow-list-text ">フォロー</strong>
    @foreach ($followings as $following)
      <div class="card">
        <div class="card-haeder p-2 w-100 d-flex">
          <a class="no-text-decoration" href="/users/{{ $following->id }}">
            @if ($following->image)
                <img class="post-profile-icon round-img" src="data:image/png;base64,{{ $following->image }}"/>
            @else
              <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
            @endif
          </a>
          <div class="ml-2 d-flex flex-column">
            <a class="black-color no-text-decoration p-2" href="/users/{{ $following->id }}">
              <strong>{{ $following->name }}</strong>
            </a>
          </div>
          <div class="ml-auto mx-0 my-auto ">
            @if ($following->id != Auth::user()->id)
              @if(Auth::user()->is_following($following->id))
                <a class="btn btn-primary" href="/users/{{$following->id}}/unfollow">フォローを外す</a>
              @else
                <a class="btn btn-primary" href="/users/{{$following->id}}/follow">フォローする</a>
             @endif
            @endif
          </div>
        </div>
      </div>
    @endforeach
    <div class="m-4">
    {{$followings->links()}}
    </div>
  </div>
</div>
@endsection
