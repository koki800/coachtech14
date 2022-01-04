　//ボタン要素取得
  button1 = document.getElementById('time_start');
  button2 = document.getElementById('time_finish');
  button3 = document.getElementById('rest_start');
  button4 = document.getElementById('rest_finish');

　//ボタン無効条件分岐
  if(time_start === null){
    //勤務開始前
    //オフ：勤務終了・休憩開始・休憩終了
    button1.disabled = false;

    button2.disabled = true;
    button2.style.opacity = 0.5;

    button3.disabled = true;
    button3.style.opacity = 0.5;

    button4.disabled = true;
    button4.style.opacity = 0.5;
  }else if(rest_start === null){
    //勤務開始後
    //オフ：勤務開始・休憩終了
    button1.disabled = true;
    button1.style.opacity = 0.5;

    button2.disabled = false;

    button3.disabled = false;

    button4.disabled = true;
    button4.style.opacity = 0.5;
  }else if(rest_start !== null && rest_finish === null){
    //休憩開始後
    //オフ：勤務開始・勤務終了・休憩開始
    button1.disabled = true;
    button1.style.opacity = 0.5;

    button2.disabled = true;
    button2.style.opacity = 0.5;

    button3.disabled = true;
    button3.style.opacity = 0.5;

    button4.disabled = false;
  }else if(rest_start !== null && rest_finish !== null){
    //休憩終了後
    //オフ：勤務開始・休憩終了
    button1.disabled = true;
    button1.style.opacity = 0.5;

    button2.disabled = false;

    button3.disabled = false;

    button4.disabled = true;
    button4.style.opacity = 0.5;
}