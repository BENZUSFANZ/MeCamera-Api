<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

    $result = "";

    $id_store = $_POST['id_store'];

    $Caption = $_POST['caption'];
    $Price = $_POST['price'];


    $sql = "UPDATE tb_store SET caption='".$Caption."', price='".$Price."'
    WHERE id_store='".$id_store."' ";

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
