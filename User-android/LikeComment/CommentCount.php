<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

class Comment {
             public $CommentCount = "";
          //   public $liked = "";
        }

      $obj = new Comment();

      $id_store = $_POST['id_store'];
      $id_user = $_POST['id_user'];
      // $id_store = "41";
      // $id_user ="75";

      $sql = "SELECT * FROM tb_comment WHERE id_store ='".$id_store."' ";  //นับยอดไลค์ของ ID นั้นๆ

      $result = mysqli_query($connection,$sql);

      $obj->CommentCount =  mysqli_num_rows($result);  //นัยยอดไลค์

        echo json_encode($obj);

 mysqli_close($connection);

 ?>
