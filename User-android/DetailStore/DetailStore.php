<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

class DetailStore {

             public $user_fk = "";

             public $Address = "";
             public $latitude = "";
             public $longitude = "";

             public $Phone = "";
             public $Mail = "";

        }

      $obj = new DetailStore();

     $id_store = $_POST['id_store'];
    //  $id_store = "21";

      $sql = "SELECT tb_store.user_fk, tb_user.tel, tb_user.email, tb_credit.address,
      tb_credit.latitude, tb_credit.longitude
      FROM tb_store
      INNER JOIN tb_user ON tb_store.user_fk = tb_user.id_user
      INNER JOIN tb_credit ON tb_user.id_user = tb_credit.user_fk
      WHERE tb_store.id_store ='". $id_store."' ";

      $result = mysqli_query($connection,$sql);

        while($row = mysqli_fetch_assoc($result)) {

          $obj->user_fk = $row["user_fk"];
          $obj->Address = $row["address"];
          $obj->latitude = $row["latitude"];
          $obj->longitude = $row["longitude"];
          $obj->Phone = $row["tel"];
          $obj->Mail = $row["email"];

          echo json_encode($obj);

        }

 mysqli_close($connection);

 ?>
