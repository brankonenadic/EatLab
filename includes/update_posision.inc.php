<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['updateEmployeesPosisionPasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateEmployeesPosisionPasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}
if(isset($_POST['update_employees_posision_btn'])){
    
    $employees_id = $_SESSION['employees_id'];
    $update = new User();
    $posision = $_POST['update_employees_posision'];

    $update_posision = $update->update_posision( $employees_id, $posision);
    if($update_posision == true){
        $error = '*Employees posision is updated';
        echo $error; 
    }else{
        $error = '*Employees posision update error';
        echo $error; 
    
    } 
}