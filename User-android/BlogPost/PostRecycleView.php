<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';


    $sql = "SELECT id_post, caption, im_post, tb_user.name, tb_user.im_profile
    FROM tb_blockpost INNER JOIN tb_user ON tb_blockpost.user_fk = tb_user.id_user";


    $result = mysqli_query($connection,$sql);

    $object_arry = array();

    while ($row = mysqli_fetch_assoc($result)) {
      array_push($object_arry, $row);
    }

    $json_array = json_encode($object_arry);
    echo $json_array;




   mysqli_close($connection);

 ?>
