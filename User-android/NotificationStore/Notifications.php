<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

$IDuser = $_POST['ID_user'];
// $IDuser = "66";

// 0 = ได้เช่าอุปกรณ์ของคุณ
// 1 = ได้ตอบรับการเช่า
// 2 = ได้ยกเลิกการเช่า

// store  //ดึงชื่อ,รูปโปรไฟล์ customer
$sql = "SELECT tb_booking.status, tb_booking.id_booking, tb_store.id_store, tb_store.user_fk,
      tb_booking.customer_fk, tb_user.name, tb_user.im_profile
      FROM tb_booking
      INNER JOIN tb_store ON tb_booking.store_fk = tb_store.id_store
      INNER JOIN tb_user ON tb_booking.customer_fk = tb_user.id_user
      WHERE tb_store.user_fk = '$IDuser' AND (tb_booking.status = '0' OR tb_booking.status = '1' OR tb_booking.status = '2') ";

      //customer //ดึงชื่อ,รูปโปรไฟล์ store ไม่ได้ ต้องไปดึงทีในจาวา
      $sql1 = "SELECT tb_booking.status, tb_booking.id_booking, tb_store.id_store, tb_store.user_fk,
            tb_booking.customer_fk, tb_user.name, tb_user.im_profile
            FROM tb_booking
            INNER JOIN tb_user ON tb_booking.customer_fk = tb_user.id_user
            INNER JOIN tb_store ON tb_booking.store_fk = tb_store.id_store
            WHERE tb_user.id_user = '$IDuser' AND (tb_booking.status = '0' OR tb_booking.status = '1' OR tb_booking.status = '2') ";

   $result = mysqli_query($connection,$sql); //เพื่อตรวจสอบว่าใครเช่าอุได้เช่าอุปกรณ์

        $result1 = mysqli_query($connection,$sql1); //เพื่อตอบกลับให้คนที่เช่านั้นๆ

   $object_arry = array();

     while ($row = mysqli_fetch_assoc($result)) {
       array_push($object_arry, $row);
     }

           while ($row = mysqli_fetch_assoc($result1)) {
             array_push($object_arry, $row);
           }

     $json_array = json_encode($object_arry);
     echo $json_array;

 mysqli_close($connection);

 ?>
