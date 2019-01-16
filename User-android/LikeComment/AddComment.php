<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

  $result = "";

 $id_store = $_POST['id_store'];
 $id_user = $_POST['id_user'];
 $comment = $_POST['Comment'];
 // $id_store = "25";
 // $id_user = "58";
 // $comment = "55555";

    $sql = "INSERT INTO tb_comment (id_store, id_user, comment)
        VALUES ('$id_store', '$id_user', '$comment')";

      $result = mysqli_query($connection,$sql);

        if($result){
          $result = "แสดงความเรียบร้อย";
             echo $result;
        }else {
          $result = "แสดงความไม่สำเร็จ";
             echo $result;
        }


 mysqli_close($connection);

 ?>
