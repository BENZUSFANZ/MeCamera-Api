<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

class Like {
             public $likeCount = "";
          //   public $liked = "";
        }

      $obj = new Like();

 $id_store = $_POST['id_store'];
 $id_user = $_POST['id_user'];
// $id_store = "22";
// $id_user = "57";

  $sql = "INSERT INTO tb_like (id_store, id_user)
      VALUES ('$id_store', '$id_user')";

      if (mysqli_query($connection,$sql)) {

          // ถ้ามันเชื่อมต่อได้ ไม่ต้องทำอะไร

      }else {

        $sql = "DELETE FROM tb_like WHERE id_store='$id_store' AND id_user = '$id_user'";

        mysqli_query($connection,$sql);

      }

      $sql1 = "SELECT * FROM tb_like WHERE id_store ='".$id_store."' "; //นับคนที่กดไลค์

      $result1 = mysqli_query($connection,$sql1);

      $obj->likeCount =  mysqli_num_rows($result1);

        echo json_encode($obj);

 mysqli_close($connection);

 ?>
