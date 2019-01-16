<?php
header("Content-type: text/plain; charset=utf-8");

include '../libs/connectDB.php';

class ShowProfile {

             public $Store = "";
             public $Category = "";
             public $Address = "";

             public $latitude = "";
             public $longitude = "";

             public $imCredit = "";

        }

      $obj = new ShowProfile();

      $IDuser = $_POST['ID_user'];


      $sql = "SELECT store, category, address, latitude, longitude, im_credit
      FROM tb_credit where user_fk ='".$IDuser."' ";

      $result = mysqli_query($connection,$sql);

      //mysqli_num_rows($result) > 0;

      $row = mysqli_fetch_assoc($result);

      $obj->Store = $row["store"];
      $obj->Category = $row["category"];
      $obj->Address = $row["address"];
      $obj->latitude = $row["latitude"];
      $obj->longitude = $row["longitude"];
      $obj->imCredit = $row["im_credit"];

      echo json_encode($obj);


 mysqli_close($connection);
 ?>
