<?php
if(isset($_POST['new_employees'])){

    $fullname = $_POST['employees_fullname'];
    $user_email = $_POST['employees_email'];
    $user_password = password_hash($_POST['employees_password'], PASSWORD_DEFAULT);
    $user_type = $_POST['position'];
    $datetime = date('Y-m-d H:i:s');
    $token = md5($fullname.$user_password.$datetime);
    $user_id = $_SESSION['user_session'];
    $registar = new User();
   

    if( $new_user = $registar->registar_employees($fullname,$user_email,$user_password,$user_type,$token,$datetime, $user_id)){

      $id = $registar->user_id($user_email, $user_password);
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

