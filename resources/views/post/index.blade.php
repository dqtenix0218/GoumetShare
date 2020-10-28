@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
@foreach ($posts as $post)
  <div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
      <div class="card">
        <div class="card-header">
          <a class="no-text-decoration" href="/users/{{ $post->user->id }}">
            {{--@if ($user->profile_photo)
                  <p>
                    <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_photo) }}"/>
                  </p>
                @else
                  <img class="round-img" src="{{ asset('/images/blank_profile.png') }}"/>
                @endif--}}
                {{----}}
            @if ($post->user->image)
                <img class="post-profile-icon round-img" src="data:image/png;base64,{{ $post->user->image }}"/>
            @else
                <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
            @endif
          </a>
          <a class="black-color no-text-decoration" title="{{ $post->user->name }}" href="/users/{{ $post->user->id }}">
            <strong>{{ $post->user->name }}</strong>
          </a>
        </div>

          <img src="data:image/png;base64,{{ $post->image }}" class="card-img-top" />
          <div class="ml-auto mx-0 my-auto">
            <img class="pin-icon" src="{{ asset('/images/pin.png') }}"/>
            <span class="place-text">{{$post->place}} ({{$post->genre}})</span>
          <a class="address-link" title="{{$post->address}}" href="/posts/{{ $post->id }}">場所を確認する</a>
          </div>
            @if ($post->user->id == Auth::user()->id)
          	  <a class="ml-auto mx-0 my-auto" rel="nofollow" href="/posts_delete/{{ $post->id }}">
                <div class="delete-post-icon"></div>
          	  </a>
            @endif

        <div class="card-body">
          <div class="row parts ">
            <div id="like-icon-post-{{ $post->id }}">
              @if ($post->likedBy(Auth::user())->count() > 0)
                <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="/likes/{{ $post->likedBy(Auth::user())->firstOrFail()->id }}">いいねを取り消す</a>
              @else
                <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/posts/{{ $post->id }}/likes">いいね</a>
              @endif
            </div>
          </div>
          <div class="like-text">
            @if (count($post->likes))
                {{count($post->likes)}}人がいいねしました!
            @endif
          </div>
          <div>
            <span>{{ $post->caption }}</span>
            <div class="light-color post-time text-right">{{ $post->created_at }}</div>
              @include('post.comment_list')
            <hr>
            <div class="row actions" id="comment-form-post-{{ $post->id }}">
               <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post">
                @csrf
                <input name="utf8" type="hidden" value="&#x2713;" />
                <input value="{{ Auth::user()->id }}" type="hidden" name="user_id" />
                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
@endforeach
  {{$posts->links()}}
@endsection
