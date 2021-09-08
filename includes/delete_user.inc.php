<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if (isset($_POST['deletePasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $delete = new User();
    $check_password = $delete->user_password($user_id, $_POST['deletePasswordChecked']);
    if ($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
    } else {
        $error = '*Password is incorect';
        echo $error; 
    }   
}
if (isset($_POST['checkdeleteEmail'])){
    $delete = new User();
    $chack_email= $delete->check_email($_POST['checkdeleteEmail']);
    if ($chack_email){
        return false;
        $error = '*Email is valid';
        echo $error;
    } else { 
        $error = '*Email is not valid';
        echo $error; 
    }
 }
 if (isset($_POST['delete_profile_btn'])){
    $user_email = $_POST['delete_profile_email'];
    $user_id = $_SESSION['user_session'];
    $delete = new User();
    $delete_user = $delete->delete_profile($user_id, $user_email);
    if ($delete_user == true){
        $datetime = date('Y-m-d H:i:s');
        $token = md5($user_id.$user_email.$datetime);
        Include ("sendmail.inc.php");
        $to = "$user_email";
        $coll = new EmailBody();
        $body = $coll->delete_user_email($user_id, $token);      
        $subject = "You account is deleted!";
        if (send_mail($to, $body, $subject)) {
            $error = '*Email is sent';
            echo $error;
        } else {
            $error = '*Email is not sent';
            echo $error;
        } 
    } else {
        $error = '*Error delete user';
        echo $error;
    } 
 }
