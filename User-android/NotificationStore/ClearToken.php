<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

    $IDuser = $_POST['id_user'];
    $Clear = "0";

    $sql = "UPDATE tb_user SET token ='".$Clear."'
    WHERE id_user='".$IDuser."' ";

    $result = mysqli_query($connection,$sql);

  mysqli_close($connection);

 ?>
