<?php
header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

    $result = "";

    $IDuser = $_POST['ID_user'];
    //$IDuser = "61";

    $name = $_POST['name'];
    $lastname = $_POST['last_name'];
    $birth = $_POST['birth'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    $sql = "UPDATE tb_user SET name='".$name."', last_name='".$lastname."', birth='".$birth."',
    email= '".$email."', tel='".$tel."' WHERE id_user='".$IDuser."' ";

    $result = mysqli_query($connection,$sql);

     if($result){
       $result = "เเก้ไขสำเร็จ";
          echo $result;
     }else {
       $result = "เเก้ไขไม่สำเร็จ";
          echo $result;
     }

  mysqli_close($connection);


 ?>
