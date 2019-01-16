<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

class Check {

       public $im_profile = "";
       public $name = "";
       public $last_name = "";
       public $email = "";
       public $tel = "";

        }

        $obj = new Check();

    $id_user = $_POST['id_user'];
  //$user_fk = "57";

      $sql = "SELECT * FROM tb_user WHERE id_user = '".$id_user."' ";

       $result = mysqli_query($connection,$sql);

       $row = mysqli_fetch_assoc($result); //ดึงข้อมูลเป็นเเถวนั้นๆ

       $obj->im_profile = $row["im_profile"];
       $obj->name = $row["name"];
       $obj->last_name = $row["last_name"];
       $obj->email = $row["email"];
       $obj->tel = $row["tel"];

       echo json_encode($obj);

 mysqli_close($connection);

 ?>
