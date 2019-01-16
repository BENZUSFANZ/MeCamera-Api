<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

  $Category = $_POST['category'];
  $Brand = $_POST['brand'];
  $Age = $_POST['age'];

      $sql = "SELECT id_store, caption, price, im_store, tb_user.name, tb_user.im_profile
       FROM tb_store
       INNER JOIN tb_user ON tb_store.user_fk = tb_user.id_user
       INNER JOIN tb_credit ON tb_user.id_user = tb_credit.user_fk
       WHERE tb_credit.category LIKE '%".$Category."%'
       AND tb_store.caption LIKE '%".$Brand."%'
       OR tb_store.caption LIKE '%".$Age."%' ";

       $result = mysqli_query($connection,$sql);

       $object_arry = array();

       while ($row = mysqli_fetch_assoc($result)) {
         array_push($object_arry, $row);
       }

       $json_array = json_encode($object_arry);
       echo $json_array;

   mysqli_close($connection);

 ?>
