<?php

header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

    $result = "";

    $IDuser = $_POST['ID_user'];
    //$IDuser = "70";

    $noStore ="NO";

    $sql = "DELETE tb_store , tb_credit FROM tb_store
    INNER JOIN tb_user ON tb_store.user_fk = tb_user.id_user
    INNER JOIN tb_credit ON tb_user.id_user = tb_credit.user_fk
    WHERE tb_store.user_fk = '".$IDuser."' ";

    $sql2 = "UPDATE tb_user SET store ='".$noStore."' WHERE id_user='".$IDuser."' ";

    $result = mysqli_query($connection,$sql);

    $result2 = mysqli_query($connection,$sql2);

     if($result && $result2){
       $result = "คุณได้ลบข้อมูลร้านเรีบยร้อย";
          echo $result;
     }else {
       $result = "ลบข้อมูลร้านไม่สำเร็จ";
          echo $result;
     }

 mysqli_close($connection);
 ?>
