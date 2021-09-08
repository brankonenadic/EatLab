<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['deleteEmployeesPasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $delete = new User();
    $check_password = $delete->user_password($user_id, $_POST['deleteEmployeesPasswordChecked']);
    if ($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
    } else {
        $error = '*Password is incorect';
        echo $error; 
    }   
}
if (isset($_POST['eckdeleteEmployeesEmail'])){
    $delete = new User();
    $chack_email= $delete->check_email($_POST['eckdeleteEmployeesEmail']);
    if ($chack_email){
        return false;
        $error = '*Email is valid';
        echo $error;
    } else { 
        $error = '*Email is not valid';
        echo $error; 
    }
 }
 if (isset($_POST['delete_employees_btn'])){
    $user_email = $_POST['delete_employees_email'];
    $employees_id = $_SESSION['employees_id'];
    $delete = new User();
    $delete_user = $delete->delete_employees($employees_id);
    if ($delete_user == true){
        Include ("sendmail.inc.php");
        $to = "$user_email";
        $coll = new EmailBody();
        $body = $coll->delete_employees_email();      
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
