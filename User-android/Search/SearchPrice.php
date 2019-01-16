<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

 $Low = $_POST['low'];
 $Height = $_POST['height'];

      $sql = "SELECT id_store, caption, price, im_store, tb_user.name, tb_user.im_profile
       FROM tb_store
       INNER JOIN tb_user ON tb_store.user_fk = tb_user.id_user
       WHERE tb_store.price
       BETWEEN '".$Low."'
       AND '".$Height."' ";

       $result = mysqli_query($connection,$sql);

       $object_arry = array();

       while ($row = mysqli_fetch_assoc($result)) {
         array_push($object_arry, $row);
       }

       $json_array = json_encode($object_arry);
       echo $json_array;

   mysqli_close($connection);

 ?>
