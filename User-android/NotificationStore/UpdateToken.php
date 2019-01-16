<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

    $IDuser = $_POST['id_user'];
    $Token = $_POST['token'];

    $sql = "UPDATE tb_user SET token ='".$Token."'
    WHERE id_user='".$IDuser."' ";

    $result = mysqli_query($connection,$sql);

  mysqli_close($connection);

 ?>
