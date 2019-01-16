<?php

header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';


class upload {

       public $status  = "";

}

  @mkdir("upload-Store");


 $obj = new upload();

 $IDuser = $_POST['ID_user'];

 $Caption = $_POST['Caption'];
 $Price = $_POST['Price'];


  if(is_uploaded_file($_FILES['upload_file']['tmp_name'])) {          //Upload image

    do{

      $temp = explode(".", $_FILES['upload_file']['name']);
      $newfilename = round(microtime(true)) . '.' . end($temp);  //check the same image name

    }while (file_exists("upload-Store/" . $newfilename));

	       $target = "upload-Store/" . $newfilename;
 	       move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);


  $imStore = $newfilename;



  $sql = "INSERT INTO tb_store (caption, price, im_store, user_fk)
      VALUES ('$Caption', '$Price', '$imStore', '$IDuser')";


  $result = mysqli_query($connection,$sql);


  if($result){
        $obj->status = "โพสต์สำเร็จ";
  	     echo json_encode($obj);
  }else {
        $obj->status ="โพสต์ไม่สำเร็จ";
          echo json_encode($obj);
      }


}

  else {
        $obj->status ="รูปภาพใหญ่เกินขนาด";
	        echo json_encode($obj);
        }


mysqli_close($connection);


?>
