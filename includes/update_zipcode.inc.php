<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['zipcodepasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['zipcodepasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_zipcode_btn'])){


        $user_id = $_SESSION['user_session'];
    
        $update = new User();
    
        $zipcode = $_POST['update_zipcode'];
   
        $update_zipcode = $update->update_zipcode($user_id, $zipcode);
        if($update_zipcode == true){
            $error = '*Zipcode is updated';
            echo $error; 
        }else{
            $error = '*Zipcode update error';
            echo $error; 
        
        } 

}
