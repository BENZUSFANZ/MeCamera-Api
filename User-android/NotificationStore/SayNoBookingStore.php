<?php
header("Content-type: text/plain; charset=utf-8");

include '../../libs/connectDB.php';

      $result = "";

    $id_booking = $_POST['id_booking'];
    $customer_fk = $_POST['customer_fk'];
    $user_fk = $_POST['user_fk'];

    $status = "2";

    $sql = "UPDATE tb_booking SET status ='".$status."'
    WHERE id_booking ='".$id_booking."' ";

    $result = mysqli_query($connection,$sql);

    if($result){
      $result = "ส่งไปยังผู้เช่าเรียบร้อย";
         echo $result;

         $sql1 = "SELECT * FROM tb_user WHERE id_user ='".$user_fk."' ";
         $result1 = mysqli_query($connection,$sql1);
         $row1 = mysqli_fetch_assoc($result1);

           $sql2 = "SELECT * FROM tb_user WHERE id_user ='".$customer_fk."' ";
           $result2 = mysqli_query($connection,$sql2);
           $row2 = mysqli_fetch_assoc($result2);

           // key server My FCM
         define( 'API_ACCESS_KEY', 'AAAAQ_k_-Cg:APA91bGp7nW4v8CbJh3N1v5HTnvdNyichVUCba6eJUcRA-j3KENS9Jfvbt996fzJweoJGPdFMpcez5XgTMlsFKdRBF2TittJAy_8-6yOURMN2Vz8YDp8y8lxhecq5GQ8dpCeyvPb4-kM' );
         $registrationIds = $row2['token'] ; //ถึง Token Database

         #prep the bundle
          $msg = array
               (
         'body' 	=> "คุณ ".$row1['name']." ได้ยกเลิกการเช่าของคุณ",
         'title'	=> 'การแจ้งเตือน',
                   'icon'	=> 'myicon',/*Default Icon*/
                   'sound' => 'mySound'/*Default sound*/
               );
       $fields = array
           (
             'to'		=> $registrationIds, //ส่งถึงใคร
             'notification'	=> $msg
           );


       $headers = array
           (
             'Authorization: key=' . API_ACCESS_KEY,
             'Content-Type: application/json'
           );

         #Send Reponse To FireBase Server
             $ch = curl_init();
             curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
             curl_setopt( $ch,CURLOPT_POST, true );
             curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
             curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
             curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
             curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
             $result = curl_exec($ch );
             curl_close( $ch );
         #Echo Result Of FireBase Server

    }else {

      $result = "ระบบมีปัญหา กรุณาลองอีกครั้ง";
         echo $result;
    }

  mysqli_close($connection);

 ?>
