<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

$IDuser = $_POST['id_user'];
//$IDuser = "57";

$sql = "SELECT tb_booking.id_booking, tb_booking.customer_fk, tb_booking.store_fk, tb_booking.date_in,
   tb_booking.date_out, tb_booking.price,
   tb_store.caption, tb_store.im_store,
   tb_store.user_fk,
   tb_user.name, tb_user.last_name, tb_user.email, tb_user.tel, tb_user.im_profile
   FROM tb_booking
   INNER JOIN tb_store ON tb_booking.store_fk = tb_store.id_store
   INNER JOIN tb_user ON tb_booking.customer_fk = tb_user.id_user
   WHERE  tb_store.user_fk ='".$IDuser."'
   AND tb_booking.status = '0'";

     $result = mysqli_query($connection,$sql);

     echo mysqli_num_rows($result);

 mysqli_close($connection);

 ?>
