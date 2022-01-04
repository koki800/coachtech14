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

<script src="{{ asset('/js/index.js') }}">
  const time_start = @json($time_start);
  const time_finish = @json($time_finish);
  const rest_start = @json($rest_start);const rest_finish = @json($rest_finish);
</script>
</body>
</html>