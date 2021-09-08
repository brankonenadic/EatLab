<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['addressupdateEmployeesAddressPasswordCheckedpasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateEmployeesAddressPasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_employees_address_btn'])){


        $employees_id = $_SESSION['employees_id'];
    
        $update = new User();
    
        $address = $_POST['update_employees_address'];
   
        $update_address = $update->update_address($employees_id, $address);
        if($update_address == true){
            $error = '*Address is updated';
            echo $error; 
        }else{
            $error = '*Address update error';
            echo $error; 
        
        } 

}
