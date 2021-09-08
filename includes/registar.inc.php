<?php
if(isset($_POST['registar'])){

    $fullname = $_POST['fullname'];
    $user_email = $_POST['user_email'];
    $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];
    $datetime = date('Y-m-d H:i:s');
    $token = md5($fullname.$user_password.$datetime);
 
   $registar = new User();
   

    if( $new_user = $registar->registar_user($fullname,$user_email,$user_password,$user_type,$token,$datetime)){

      $id = $registar->user_id($user_email, $user_password);
    echo $id;
      Include ('sendmail.inc.php');

        $to = $user_email;
         
        $coll = new EmailBody();
        $body = $coll->validation_email($id , $token); 
         
        $subject = "Verification email";
        
        if(send_mail($to, $body, $subject)) {
          $error = '*Verification email is sent';
          echo $error;
          } 
          else {
            $error = '*Verification email is not sent';
            echo $error;
          }  
   }else{

    $error = '*Ne radi';
    echo $error;

}

 
}else{
  $error = '*Ne radi ne radi';
    echo $error;
}

