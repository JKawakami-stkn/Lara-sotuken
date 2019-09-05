window.onload = function() {

  // 実行日の日時を取得
  var today = new Date();

  var formatted_date = today.getFullYear() + "年 " + (today.getMonth() + 1) + "月 " + today.getDate() + "日";

  document.getElementById('day').textContent = formatted_date
};
