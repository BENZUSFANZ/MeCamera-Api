<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

class Check {
       public $im_store = "";
       public $caption = "";
       public $days = "";
       public $ttPrice = "";
       public $dateIn = "";
       public $dateOut = "";
        }

        $obj = new Check();

    $id_booking = $_POST['id_booking'];
    $id_store = $_POST['id_store'];

      //ตาราง tb_booking เพื่อเอารายละเอียดการเช่า
      $sql = "SELECT date_in, date_out, days, price FROM tb_booking WHERE id_booking = '".$id_booking."' ";

        //ตาราง tb_store เพื่อเอา รูป เเคปชัน ของโพสต์เช่านั้นๆ
        $sql1 = "SELECT caption, im_store FROM tb_store WHERE id_store = '".$id_store."' ";

      $result = mysqli_query($connection,$sql);
        $result1 = mysqli_query($connection,$sql1);

      $row = mysqli_fetch_assoc($result);
         $row1 = mysqli_fetch_assoc($result1);

       $obj->dateIn = $row["date_in"];
       $obj->dateOut = $row["date_out"];
       $obj->days = $row["days"];
       $obj->ttPrice = $row["price"];

       $obj->im_store = $row1["im_store"];
       $obj->caption = $row1["caption"];

       echo json_encode($obj);

 mysqli_close($connection);

 ?>
