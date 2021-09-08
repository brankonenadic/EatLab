<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';


if(isset($_POST['newPasswordChecked'])){

   if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST['newPasswordChecked'])) {
      $error = '*Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters';
      echo $error;
  }else{

      $error = '*New password is checked and we are succcess';
      echo $error;

  }


 }

      
   if(isset($_POST['new_password_btn'])){

      
      $reset_password = $_POST['new_password'];

      $id = $_SESSION['new_pw_id'];
      $user_email = $_SESSION['new_pw_email'];
      $datetime = date('Y-m-d H:i:s');
      $token = md5($id.$user_email.$datetime);
      $reset = new User();
      $new = $reset->new_password($reset_password, $id);

      if($new == true){

      Include ("sendmail.inc.php");
 
        $to = "$user_email";
       
        $coll = new EmailBody();
        $body = $coll->newpw_email($id , $token);      
    
        $subject = "New password confirmation";
        if(send_mail($to, $body, $subject)) {
            $error = '*Email is sent';
            echo $error;
            }else{
            $error = '*Email is not sent';
            echo $error;
            } 

      $error = '*New password is updated!';
      echo $error;
   }else{
      $error = '*New password is not updated!';
      echo $error; 
   }

    $error = '*New password is valid and we are succcess';
    echo $error;



 }