<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['updateEmployeesCountryPasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateEmployeesCountryPasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_employees_country_btn'])){


        $employees_id = $_SESSION['employees_id'];
 
        $update = new User();
 
        $country = $_POST['update_employees_country'];
   
        $update_country = $update->update_country($employees_id, $country);
        if($update_country == true){
            $error = '*Country is updated';
            echo $error; 
        }else{
            $error = '*Country update error';
            echo $error; 
        
        } 


}
