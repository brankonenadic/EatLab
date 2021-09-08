<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['citypasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['citypasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_city_btn'])){


        $user_id = $_SESSION['user_session'];
    
        $update = new User();

        $city = $_POST['update_city'];
   
        $update_city = $update->update_city($user_id, $city);
        if($update_city == true){
            $error = '*City is updated';
            echo $error; 
        }else{
            $error = '*City update error';
            echo $error; 
        
        } 

}
