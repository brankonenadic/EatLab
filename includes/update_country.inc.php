<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['countrypasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['countrypasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_country_btn'])){


         $user_id = $_SESSION['user_session'];
 
        $update = new User();
 
        $country = $_POST['update_country'];
   
        $update_country = $update->update_country($user_id, $country);
        if($update_country == true){
            $error = '*Country is updated';
            echo $error; 
        }else{
            $error = '*Country update error';
            echo $error; 
        
        } 


}
