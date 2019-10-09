<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Laravel Quickstart - Basic</title>
</head>

<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
    <div class="my-navbar-control">
      @if(Auth::check())
        <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
        ｜
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
      @endif
    </div>
    <div>
      @if(Auth::check())
        <script>
          document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
          });
        </script>
    @endif
    </div>
  </nav>
</header>
<main>
<div class="container">
    <nav class="navbar navbar-default"></nav>
</div>

@yield('content')
</body>
</html>
