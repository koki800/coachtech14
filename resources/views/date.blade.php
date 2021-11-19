<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/Todo.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/Todo.css') }}" rel="stylesheet">
  @endif
  <title>日付別勤怠ページ</title>
</head>
<body>
  @if($items != null)
  @foreach($items as $item)
  <div>
    <p>{{$item -> links()}}</p>
  </div>
  <div>
    <table>
      <tr>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
      <tr>
        <td>{{$item -> links()}}</td>
        <td>{{$item -> links()}}</td>
        <td>{{$item -> links()}}</td>
        <td>{{$item -> links()}}</td>
        <td>{{$item -> links()}}</td>
      </tr>
    </table>
  </div>
  <div>
    <p>{{$item -> links()}}</p>
  </div>
  @endforeach
  @endif
</body>
</html>