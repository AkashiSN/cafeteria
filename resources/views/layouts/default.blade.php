<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NITAC Cafeteria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<nav class="theme-color-{{ (Auth::check() && Auth::user() -> is_admin) ? 'admin' : 'student' }} navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Nitac Cafeteria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img src="{{ Auth::getUser()->avatar }}" style="border-radius: 50%;" width="40"> {{ Auth::getUser()->name }}<span class="caret"></span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('menus.search') }}" >メニュー検索</a>
                            @if (Auth::user() -> is_admin)
                                <a class="dropdown-item" href="{{ route('admin.menus.create') }}" >管理者ページ</a>
                            @else
                                <a class="dropdown-item" href="{{ route('my_page') }}" >マイページ</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" >ログアウト</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Sign in with Google</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- main content -->
<div id="app" class="container container-stack mt-70 mb-10">
    @yield('content')
</div>

<!-- Footer -->
<footer class="theme-color-{{ (Auth::check() && Auth::user() -> is_admin) ? 'admin' : 'student' }} py-3">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Team3 2019</p>
    </div>
</footer>

</body>
<script>
    window.Laravel = {!! json_encode([
        'apiToken' => \Auth::user()->api_token ?? null
    ]) !!};
</script>
<script src="{{ asset('js/app.js') }}"></script>
</html>
