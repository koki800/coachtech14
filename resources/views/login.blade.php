<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/login.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  @endif
  <title>ログイン</title>
</head>
<body>
  <div class="form">
    <div>
      <p class="login">ログイン</p>
    </div>
    <form action="/" method="post">
    @csrf  
    <div><input type="email" placeholder="メールアドレス"></div>
    <div><input type="text" placeholder="パスワード"></div>
    <div><button>ログイン</button></div>
    </form>
    <div class="link">
      <p>アカウントをお持ちでない方はこちらから</p>
      <p><a href="/register">会員登録</a></p>
    </div>
    <div>
      <p>{{$text}}</p>
    </div>
  </div>
</body>
</html>