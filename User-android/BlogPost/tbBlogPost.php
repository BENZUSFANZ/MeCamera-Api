<?php

header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';



class upload {

       public $status  = "";

}

  @mkdir("upload-Post");


 $obj = new upload();

 $IDuser = $_POST['ID_user'];
 $Caption = $_POST['Caption'];



  if(is_uploaded_file($_FILES['upload_file']['tmp_name'])) {          //Upload image

    do{

      $temp = explode(".", $_FILES['upload_file']['name']);
      $newfilename = round(microtime(true)) . '.' . end($temp);  //check the same image name

    }while (file_exists("../upload-Post/" . $newfilename));

	       $target = "../upload-Post/" . $newfilename;
 	       move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);


  $imStore = $newfilename;



  $sql = "INSERT INTO tb_blockpost (caption, im_post, user_fk)
      VALUES ('$Caption', '$imStore', '$IDuser')";


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
