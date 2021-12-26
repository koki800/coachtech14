<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/index.css') }}" rel="stylesheet">
  @else
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
  @endif
  <title>打刻ページ</title>
</head>
<body>
  <div class="index_container">
    <div class="text">
      <p>{{$user_name}}さんお疲れ様です！</p>
    </div>
    <div class="stamp_container">
      <form action="/work_start" method="post">
      @csrf
        <div class="stamp">
          <input type="hidden" name="id">
          <button name="start_at" id="time_start" disabled>勤務開始</button>
        </div>
      </form>
      <form action="/work_finish" method="post">
      @csrf
        <div class="stamp">
          <input type="hidden" name="id"  value="{{$time_id}}">
          <button name="finish_at" id="time_finish" disabled>勤務終了</button>
        </div>
      </form>
      <form action="/rest_start" method="post">
      @csrf
        <div class="stamp">
          <input type="hidden" name="id">
          <button name="start_at" id="rest_start" disabled>休憩開始</button>
        </div>
      </form>
      <form action="rest_finish" method="post">
      @csrf
        <div class="stamp">
          <input type="hidden" name="id"  value="{{$rest_id}}">
          <button name="finish_at" id="rest_finish" disabled>休憩終了</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    
  const time_id = @json($time_id);
  const rest_id = @json($rest_id);

　//ボタン要素取得
  button1 = document.getElementById('time_start');
  button2 = document.getElementById('time_finish');
  button3 = document.getElementById('rest_start');
  button4 = document.getElementById('rest_finish');

　//ボタン無効条件分岐
  if(time_id === null){
    //勤務開始前
    //オフ：勤務終了・休憩開始・休憩終了
    button1.disabled = false;

    button2.disabled = true;
    button2.style.opacity = 0.5;

    button3.disabled = true;
    button3.style.opacity = 0.5;

    button4.disabled = true;
    button4.style.opacity = 0.5;
  }else if(rest_id === null){
    //勤務開始後
    //オフ：勤務開始・休憩終了
    button1.disabled = true;
    button1.style.opacity = 0.5;

    button2.disabled = false;

    button3.disabled = false;

    button4.disabled = true;
    button4.style.opacity = 0.5;
  }else(rest_id !== null){
    //休憩開始後
    //オフ：勤務開始・勤務終了・休憩開始
    button1.disabled = true;
    button1.style.opacity = 0.5;

    button2.disabled = true;
    button2.style.opacity = 0.5;

    button3.disabled = true;
    button3.style.opacity = 0.5;

    button4.disabled = false;
  }
  
  </script>
</body>
</html>