<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['oldpasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['oldpasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}



if(isset($_POST['update_password_btn'])){

        $user_id = $_SESSION['user_session'];
        $update = new User();
        $new_password = password_hash($_POST['update_password'], PASSWORD_DEFAULT);
   
        $update_password = $update->update_password($user_id, $new_password);
        if($update_password == true){
            return false;
            $error = '*Password is updated';
            echo $error; 
        }else{
            $error = '*Password update error';
            echo $error; 
        
        } 

   
 


}
