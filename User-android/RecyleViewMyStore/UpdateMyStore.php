<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

    @mkdir("upload-Store");

    $result = "";

    $id_store = $_POST['id_store'];

    $Caption = $_POST['caption'];
    $Price = $_POST['price'];


    if(is_uploaded_file($_FILES['upload_file']['tmp_name'])) {          //Upload image

         do{

           $temp = explode(".", $_FILES['upload_file']['name']);
           $newfilename = round(microtime(true)) . '.' . end($temp);  //check the same image name

         }while (file_exists("../upload-Store/" . $newfilename));

             $target = "../upload-Store/" . $newfilename;
               move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);

    $imStore = $newfilename;


    $sql = "UPDATE tb_store SET caption='".$Caption."', price='".$Price."', im_store ='".$imStore."'
    WHERE id_store ='".$id_store."' ";


    $result = mysqli_query($connection,$sql);

     if($result){
       $result = "เเก้ไขสำเร็จ";
          echo $result;
     }else {
       $result = "เเก้ไขไม่สำเร็จ";
          echo $result;
     }
   } else {
            $result = "รูปภาพใหญ่เกินขนาด";
            echo $result;
          }


    mysqli_close($connection);


 ?>
