<?php
header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

    $result = "";

    $IDuser = $_POST['ID_user'];

    $store = $_POST['Store'];
    $category = $_POST['Category'];
    $address = $_POST['Address'];

    $sql = "UPDATE tb_credit SET store='".$store."', category='".$category."', address='".$address."'
    WHERE user_fk='".$IDuser."' ";

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
