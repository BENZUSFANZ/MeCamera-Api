<?php

header("Content-type: text/plain; charset=utf-8");

  // $result = "";

  // $DateIn = $_POST['DateIn'];
  // $DateOut = $_POST['DateOut'];

  // $DateIn = "2018/10/30";
  // $DateOut = "2018/10/20";

  $date1=date_create($_POST['DateIn']);
  $date2=date_create($_POST['DateOut']);

  $diff=date_diff($date2,$date1 );

  $diff=date_diff($date1,$date2);
  echo $diff->format("%a");

  // $result = $diff->format("%R%a days");
  // echo $result;

?>
