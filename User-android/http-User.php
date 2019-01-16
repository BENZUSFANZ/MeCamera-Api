<?php

header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

class User {

             public $name = "";
             public $las_tname = "";
             public $birth = "";
             public $email = "";
             public $tel = "";

             public $imProfile = "";
        }

        $obj = new User();

        $IDuser = $_POST['ID_user'];
      //  $IDuser = "57";

        $sql = "SELECT name, last_name, birth, email, tel, im_profile
        FROM tb_user where id_user ='".$IDuser."' ";


      $result = mysqli_query($connection,$sql);

        // Fetch one and one row
        while ($row=mysqli_fetch_row($result))
          {
              $obj->name = $row[0];
              $obj->last_name = $row[1];
              $obj->birth = $row[2];
              $obj->email = $row[3];
              $obj->tel = $row[4];

              $obj->imProfile = $row[5];

              echo json_encode($obj);
          }

    mysqli_close($connection);


 ?>
