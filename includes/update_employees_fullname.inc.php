<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['updateEmployeesFullnamePasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateEmployeesFullnamePasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}

if(isset($_POST['update_employees_fullname_btn'])){


        $employees_id = $_SESSION['employees_id'];
        $update = new User();

        $fullname = $_POST['update_employees_fullname'];
   
        $update_fullname = $update->update_fullname($employees_id, $fullname);
        if($update_fullname == true){
            $error = '*Fullname is updated';
            echo $error; 
        }else{
            $error = '*Fullname update error';
            echo $error; 
        
        } 

  


}
