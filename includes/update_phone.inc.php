<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['phonepasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['phonepasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_phone_btn'])){


        $user_id = $_SESSION['user_session'];
        $update = new User();
        $phone = $_POST['update_phone'];
        $update_phone = $update->update_phone($user_id, $phone);
        if($update_phone == true){
            $error = '*Phone is updated';
            echo $error; 
        }else{
            $error = '*Phone update error';
            echo $error; 
        
        } 

}





