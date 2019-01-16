<?php

header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

 $result = "";

 $IDuser = $_POST['ID_user'];

 $lat = $_POST['lat'];
 $lng = $_POST['lng'];

  $sql = "INSERT INTO tb_credit (latitude, longitude, user_fk)
      VALUES ('$lat', '$lng', '$IDuser')";

  $result = mysqli_query($connection,$sql);

  if($result){
    $result = "ระบุสถานที่เรียบร้อย";
       echo $result;
  }else {
    $result = "ระบุสถานที่ไม่สำเร็จ";
       echo $result;
      }

mysqli_close($connection);


?>
