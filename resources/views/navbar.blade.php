@section('navbar')
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar__brand navbar__main" href="/">グルシェア</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-md-auto align-items-center">
            <form class="form-inline" action="/" accept-charset="UTF-8" method="post">
              @csrf
              <input class="form-control mr-sm-2" type="search" placeholder="search" aria-label="例）ラーメン、ステーキ、パスタ、etc..." name="search">
              <button class="btn btn-outline my-2 my-sm-0 search-btn" type="submit">探す</button>
            </form>
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