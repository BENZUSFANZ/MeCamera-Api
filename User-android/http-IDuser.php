<?php

header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

class IDuser {

             public $name = "";
             public $imProfile = "";
        }


       $obj = new IDuser();

       $IDuser = $_POST['ID_user'];


        $sql = "SELECT name, im_profile FROM tb_user where id_user ='".$IDuser."' ";


      $result = mysqli_query($connection,$sql);

        // Fetch one and one row
        while ($row=mysqli_fetch_row($result))
          {
              $obj->name = $row[0];
              $obj->imProfile = $row[1];

              echo json_encode($obj);
          }

    mysqli_close($connection);

 ?>
