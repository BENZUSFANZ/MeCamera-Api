<?php
header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

  @mkdir("upload-Credit");

    $result = "";

    $IDuser = $_POST['ID_user'];

    $store = $_POST['Store'];
    $category = $_POST['Category'];
    $address = $_POST['Address'];

    if(is_uploaded_file($_FILES['upload_file']['tmp_name'])) {          //Upload image

         do{

           $temp = explode(".", $_FILES['upload_file']['name']);
           $newfilename = round(microtime(true)) . '.' . end($temp);  //check the same image name

         }while (file_exists("upload-Credit/" . $newfilename));

             $target = "upload-Credit/" . $newfilename;
               move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);


       $imCredit = $newfilename;

    $sql = "UPDATE tb_credit SET store='".$store."', category='".$category."', address='".$address."', im_credit ='".$imCredit."'
    WHERE user_fk='".$IDuser."' ";

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
