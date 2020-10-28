@section('navbar')
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar__brand navbar__main" href="/">グルシェア</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-md-auto align-items-center">
            <li class="nav-item ">
              <a class="nav-link" href="/posts/new">投稿</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/users/{{ Auth::user()->id }}">マイページ</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
@endsection