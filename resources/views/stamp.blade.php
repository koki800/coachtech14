<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/stamp.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/stamp.css') }}" rel="stylesheet">
  @endif
  <title>打刻ページ</title>
</head>
<body>
  <div>
    <div class="text">
      <p>{{$text}}さんお疲れ様です！</p>
    </div>
    <div class="stamp_container">
      <form action="" method="post">
      @csrf
        <div>
          <input type="hidden" name="id"  value="{{$item -> id}}">
          <button name="start_at" onclick="this.disabled = true;">勤務開始</button>
        </div>
      </form>
      <form action="" method="post">
      @csrf
        <div>
          <input type="hidden" name="id"  value="{{$item -> id}}">
          <button name="finish_at" onclick="this.disabled = true;">勤務終了</button>
        </div>
      </form>
      <form action="" method="post">
      @csrf
        <div>
          <input type="hidden" name="id"  value="{{$item -> id}}">
          <button name="start_at" onclick="this.disabled = true;">休憩開始</button>
        </div>
      </form>
      <form action="" method="post">
      @csrf
        <div>
          <input type="hidden" name="id"  value="{{$item -> id}}">
          <button name="finish_at" onclick="this.disabled = true;">休憩終了</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>