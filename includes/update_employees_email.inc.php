<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['updateEmployeesEmailPasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateEmployeesEmailPasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}


if(isset($_POST['update_employees_email_btn'])){


        $employees_id = $_SESSION['employees_id'];
        $update = new User();
        $email = $_POST['update_employees_email'];
   
        $update_email = $update->update_email($employees_id, $email);
        if($update_email == true){
            $error = '*Email is updated';
            echo $error; 
        }else{
            $error = '*Email update error';
            echo $error; 
        
        } 


}
