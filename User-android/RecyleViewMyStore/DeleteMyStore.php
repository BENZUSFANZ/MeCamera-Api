<?php

header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

    $result = "";

     $IDstore = $_POST['id_store'];

    $sql = "DELETE tb_store, tb_booking, tb_comment, tb_like FROM tb_store
    INNER JOIN tb_booking ON tb_store.id_store = tb_booking.store_fk
    INNER JOIN tb_comment ON tb_store.id_store = tb_comment.id_store
    INNER JOIN tb_like ON tb_store.id_store = tb_like.id_store
    WHERE tb_store.id_store = '".$IDstore."' ";

    $result = mysqli_query($connection,$sql);

     if($result){
       $result = "คุณได้ลบโพสต์เรีบยร้อย";
          echo $result;
     }else {
       $result = "ลบข้อมูลร้านไม่สำเร็จ";
          echo $result;
     }

 mysqli_close($connection);
 ?>
