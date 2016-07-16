<?php

//-----------------------------------------------------
//
// date - ローカルの日付/時刻を書式化
// http://php.net/manual/ja/function.date.php
//
// mktime - 日付をUnixのタイムスタンプとして取得
// http://php.net/manual/ja/function.mktime.php
//
//-----------------------------------------------------

// $count数値回の空セル出力
class Print_Calendar extends Today_Calendar {
  function space_cell ($count) {
    if ($count != 0) {
      for ( $i = 0; $i < $count; $i++ ) {
        print "<td></td>";
      }
    }
  }
}

// 今日の日付を太字にする
class Today_Calendar {
  function today ($day) {
    if ( date("Y/m/d") == date("Y/m/d", mktime(0, 0, 0, date("n"), $day, date("Y"))) ) {
      return "<b>".$day."</b>";
    } else {
      return $day;
    }
  }
}

$month_name = date("F");
$year = date("Y");
$month = date("n");
$date_of_month = date("t");
$today = date("Y/m/d");
$arrayweek = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");


// 以下カレンダー出力

print "<h1>".$month_name."</h1>";
print "Today: ".$today;
print "<br>";
print "<table border=1><tr>";
foreach ( $arrayweek as $value ) print "<th>".$value."</th>";
print "</tr><tr>";

for ( $i = 0; $i < $date_of_month; $i++ ) {

  $today_stamp = mktime(0, 0, 0, $month, $i+1, $year);

  // 日曜：0 ~ 土曜：6
  $week_number = date("w", $today_stamp);

  // 繰り返し1回目の場合
  if ( $i == 0 ) {
    print "<tr>";
    // 日曜から1日までの空セル出力
    Print_Calendar::space_cell($week_number);
  }
  // 日曜の場合
  elseif ( $week_number == 0 ) {
    print "<tr>";
  }

  print "<td>".Print_Calendar::today($i+1)."</td>";

  // 月末の場合
  if ( $i+1 == $date_of_month ) {
    // 土曜までの空セル出力
    Print_Calendar::space_cell(6-$week_number);
    print "</tr>";
  }
  // 土曜の場合
  elseif ( $week_number == 6 ) {
    print "</tr>";
  }

}
print "</table>";

?>