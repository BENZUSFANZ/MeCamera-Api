<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

$id_store = $_POST['id_store'];
// $id_store = "25";

   $sql = "SELECT tb_comment.comment, tb_user.name, tb_user.im_profile
      FROM tb_comment
      INNER JOIN tb_store ON tb_comment.id_store = tb_store.id_store
      INNER JOIN tb_user ON tb_comment.id_user = tb_user.id_user
      WHERE  tb_comment.id_store ='".$id_store."'
      ORDER BY tb_comment.id_comment ASC ";

     $result = mysqli_query($connection,$sql);

     $object_arry = array();

     while ($row = mysqli_fetch_assoc($result)) {
       array_push($object_arry, $row);

     }

     $json_array = json_encode($object_arry);
     echo $json_array;

 mysqli_close($connection);

 ?>
