@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')

<div class="row justify-content-center my-md-4 ">
  <div class="col-md-8">
    <strong class="follow-list-text ">フォロワー</strong>
    @foreach ($followers as $follower)
      <div class="card">
        <div class="card-haeder p-2 w-100 d-flex">
          <a class="no-text-decoration" href="/users/{{ $follower->id }}">
            @if ($follower->image)
                <img class="post-profile-icon round-img" src="data:image/png;base64,{{ $follower->image }}"/>
            @else
              <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
            @endif
          </a>
          <div class="ml-2 d-flex flex-column">
            <a class="black-color no-text-decoration p-2" href="/users/{{ $follower->id }}">
              <strong>{{ $follower->name }}</strong>
            </a>
          </div>
          <div class="ml-auto mx-0 my-auto ">
            @if ($follower->id != Auth::user()->id)
              @if(Auth::user()->is_following($follower->id))
                <a class="btn btn-primary" href="/users/{{$follower->id}}/unfollow">フォローを外す</a>
              @else
                <a class="btn btn-primary" href="/users/{{$follower->id}}/follow">フォローする</a>
             @endif
            @endif
          </div>
        </div>
      </div>
    @endforeach
    <div class="m-4">
    {{$followers->links()}}
    </div>
  </div>
</div>
@endsection
