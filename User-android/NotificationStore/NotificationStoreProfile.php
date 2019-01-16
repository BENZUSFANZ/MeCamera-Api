<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

class Check {

       public $name = "";
       public $im_profile = "";

        }

        $obj = new Check();

    $User_fk = $_POST['User_fk'];

      $sql = "SELECT * FROM tb_user WHERE id_user = '".$User_fk."' ";

       $result = mysqli_query($connection,$sql);

       $row = mysqli_fetch_assoc($result); //ดึงข้อมูลเป็นเเถวนั้นๆ

       $obj->name = $row["name"];
       $obj->im_profile = $row["im_profile"];

       echo json_encode($obj);

 mysqli_close($connection);

 ?>
