<?php

header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

class login {
       public $id_user = "";
       public $status = "";
        }

        $obj = new login();

          if($_POST['username'] & $_POST['password']) {

              $idUser = $_POST['username'];
              $idPass = $_POST['password'];

            $sql = "SELECT id_user FROM tb_user where username ='".$idUser."' and password='".$idPass."' ";

            $result = mysqli_query($connection,$sql);


                if (mysqli_num_rows($result) > 0) { //ตรวจสอบเเถวว่ามีค่าไหม

                    $row = mysqli_fetch_assoc($result); //ดึงข้อมูลเป็นเเถวนั้นๆ

                    $obj->id_user = $row["id_user"];
                    $obj->status = "เข้าสู่ระบบสำเร็จ";
                    echo json_encode($obj);
                  }else {
                    $obj->user_id = "0";
                    $obj->status = "รหัสไม่ถูกต้อง";
                    echo json_encode($obj);
                  }
            }else {
              $obj->user_id ="0";
            	$obj->status = "กรุณาใส่ข้อมูลให้ครบ";
              echo json_encode($obj);
            }


   mysqli_close($connection);

 ?>
