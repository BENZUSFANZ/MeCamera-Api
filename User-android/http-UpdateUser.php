<?php

header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

    @mkdir("upload-Profile");

    $result = "";

    $IDuser = $_POST['ID_user'];
    //$IDuser = "61";

    $name = $_POST['name'];
    $lastname = $_POST['last_name'];
    $birth = $_POST['birth'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    //$imPro = $_POST['imPro'];

/*  $name = "eeeee";
    $lastname = "eeeee";
    $birth = "eeeee";
    $email = "eeeee";
    $tel = "eeeee";

    $imProfile = "5555555";*/

    /*if(isset($_FILES['upload_file'])) {          //Upload image

      is_uploaded_file($_FILES['upload_file']['tmp_name']);*/

      /*/check the same image name
	     $target = "upload-img/" . $imPro;
 	     move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);*/

    if(is_uploaded_file($_FILES['upload_file']['tmp_name'])) {          //Upload image

         do{

           $temp = explode(".", $_FILES['upload_file']['name']);
           $newfilename = round(microtime(true)) . '.' . end($temp);  //check the same image name

         }while (file_exists("upload-Profile/" . $newfilename));

     	       $target = "upload-Profile/" . $newfilename;
      	       move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);


       $imProfile = $newfilename;


    $sql = "UPDATE tb_user SET name='".$name."', last_name='".$lastname."', birth='".$birth."',
    email= '".$email."', tel='".$tel."',  im_profile ='".$imProfile."' WHERE id_user='".$IDuser."' ";

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



  /*  }else {

          $imProfile = $newfilename;

          $sql = "UPDATE tb_user SET name='".$name."', last_name='".$lastname."', birth='".$birth."',
          email= '".$email."', tel='".$tel."', im_profile ='".$imProfile."' WHERE id_user='".$IDuser."' ";

          $result = mysqli_query($connection,$sql);

           if($result){
             $result = "เเก้ไขสำเร็จ";
                echo $result;
           }else {
             $result = "เเก้ไขไม่สำเร็จ";
                echo $result;
           }
        }*/


    mysqli_close($connection);


 ?>
