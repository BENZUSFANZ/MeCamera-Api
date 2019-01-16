<?php

header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';



class upload {

       public $status  = "";

}

  @mkdir("upload-Credit");


 $obj = new upload();

 $IDuser = $_POST['ID_user'];

 $store = $_POST['Store'];
 $category = $_POST['Category'];
 $address = $_POST['Address'];
 $lat = $_POST['lat'];
 $lng = $_POST['lng'];

 $yesStore ="YES";


  if(is_uploaded_file($_FILES['upload_file']['tmp_name'])) {          //Upload image

    do{

      $temp = explode(".", $_FILES['upload_file']['name']);
      $newfilename = round(microtime(true)) . '.' . end($temp);  //check the same image name

    }while (file_exists("upload-Credit/" . $newfilename));

	       $target = "upload-Credit/" . $newfilename;
 	       move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);


  $imCredit = $newfilename;



  $sql = "INSERT INTO tb_credit (store, category, address, latitude, longitude, im_credit, user_fk)
      VALUES ('$store', '$category', '$address', '$lat', '$lng', '$imCredit', '$IDuser')";

  $sql2 = "UPDATE tb_user SET store ='".$yesStore."' WHERE id_user='".$IDuser."' ";


  $result = mysqli_query($connection,$sql);
  $result2 = mysqli_query($connection,$sql2);

  if($result && $result2){
        $obj->status = "ลงทะเบียนสำเร็จ";
  	     echo json_encode($obj);
  }else {
        $obj->status ="ลงทะเบียนไม่สำเร็จ";
          echo json_encode($obj);
      }


}

  else {
        $obj->status ="รูปภาพใหญ่เกินขนาด";
	        echo json_encode($obj);
        }


mysqli_close($connection);


?>
