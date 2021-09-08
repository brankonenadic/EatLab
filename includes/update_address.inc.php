<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['addresspasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['addresspasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_address_btn'])){


        $user_id = $_SESSION['user_session'];
    
        $update = new User();
    
        $address = $_POST['update_address'];
   
        $update_address = $update->update_address($user_id, $address);
        if($update_address == true){
            $error = '*Address is updated';
            echo $error; 
        }else{
            $error = '*Address update error';
            echo $error; 
        
        } 

}
