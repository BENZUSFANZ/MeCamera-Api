<?php
header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';


//$result = "";
class Check {
       public $user = "";
       public $store = "";
        }

        $obj = new Check();

$IDuser = $_POST['ID_user'];
//$IDuser = "58";

    $sql = "SELECT user, store FROM tb_user where id_user ='".$IDuser."' ";

    $result = mysqli_query($connection,$sql);

    //if (mysqli_num_rows($result) > 0) { //ตรวจสอบเเถวว่ามีค่าไหม
    mysqli_num_rows($result) > 0;

        $row = mysqli_fetch_assoc($result); //ดึงข้อมูลเป็นเเถวนั้นๆ

        $obj->user = $row["user"];
        $obj->store = $row["store"];
        echo json_encode($obj);

    /*  }else {
          $obj->user = "0";
          $obj->store = "ผิดพลาด";
        echo json_encode($obj);
      }*/

     mysqli_close($connection);

 ?>
