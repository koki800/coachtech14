<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/register.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/register.css') }}" rel="stylesheet">
  @endif
  <title>会員登録</title>
</head>
<body>
  <div class="form">
    <div class="ttl">
      <p>会員登録</p>
    </div>
    <div>
      <form action="/register" method="post">
      @csrf
      <input type="hidden" name="id">
      <div><input type="text" value="名前" required></div>
      <div><input type="email" value="メールアドレス" required></div>
      <div><input type="text" value="パスワード" required></div>
      <div><input type="text" value="確認用パスワード" required></div>
      <div><button>会員登録</button></div>
      </form>
    </div>
    <div class="link">
      <p>アカウントをお持ちの方はこちらから</p>
      <p><a href="/login">ログイン</a></p>
    </div>
  </div>
</body>
</html>