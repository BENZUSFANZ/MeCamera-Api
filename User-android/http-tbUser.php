<?php

header("Content-type: text/plain; charset=utf-8");


include '../libs/connectDB.php';

  @mkdir("upload-Profile");

  $result = "";

  $name = $_POST['name'];
  $lastname = $_POST['last_name'];
  $birth = $_POST['birth'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = "YES";
  $store = "NO";

  if(is_uploaded_file($_FILES['upload_file']['tmp_name'])) {          //Upload image

    do{

      $temp = explode(".", $_FILES['upload_file']['name']);
      $newfilename = round(microtime(true)) . '.' . end($temp);  //check the same image name

    }while (file_exists("upload-Profile/" . $newfilename));

	       $target = "upload-Profile/" . $newfilename;
 	       move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);


  $imProfile = $newfilename;


  $sql = "INSERT INTO tb_user (name, last_name, birth, email, tel, username, password, im_profile, user, store)
 VALUES ('$name', '$lastname', '$birth', '$email', '$tel', '$username', '$password', '$imProfile', '$user', '$store')";

 $result = mysqli_query($connection,$sql);

   if($result){
     $result = "ลงทะเบียนสำเร็จ";
        echo $result;
   }else {
     $result = "ลงทะเบียนไม่สำเร็จ";
        echo $result;
   }

 } else {
          $result = "รูปภาพใหญ่เกินขนาด";
          echo $result;
         }


 mysqli_close($connection);

 ?>
