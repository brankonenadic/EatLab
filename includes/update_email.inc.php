<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['emailpasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['emailpasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}


if(isset($_POST['update_email_btn'])){


        $user_id = $_SESSION['user_session'];
        $update = new User();
        $email = $_POST['update_email'];
   
        $update_email = $update->update_email($user_id, $email);
        if($update_email == true){
            $error = '*Email is updated';
            echo $error; 
        }else{
            $error = '*Email update error';
            echo $error; 
        
        } 


}
