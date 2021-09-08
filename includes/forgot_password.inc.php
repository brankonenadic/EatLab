<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';
$result = new User();
if (isset($_POST['checkEmail1'])){
    $chack_email= $result->check_email($_POST['checkEmail1']);
    if ($chack_email){
        return false;
        $error = '*Email is valid';
        echo $error;
    } else { 
        $error = '*Email is not valid';
        echo $error; 
    }
 }
 if (isset($_POST['forgot_password'])){
    $user_email = $_POST['forgot_password_email'];
    $id = $result->forgot_pw_user_id($user_email);
    $datetime = date('Y-m-d H:i:s');
    $token = md5($id.$user_email.$datetime);
    $_SESSION['new_pw_email'] = $_POST['forgot_password_email'];
    $_SESSION['new_pw_id'] = $id;
    $update_token = $result->forgot_password($id , $token , $datetime);
    if ($update_token == true){
        Include ("sendmail.inc.php");
        $to = "$user_email";
        $coll = new EmailBody();
        $body = $coll->forgotpw_email($id, $token);      
        $subject = "New password";
        if (send_mail($to, $body, $subject)) {
            $error = '*Email is sent';
            echo $error;
        } else{
            $error = '*Email is not sent';
            echo $error;
        } 
    } else {
        $error = '*Error update token';
        echo $error;
    }
 }
