<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['superAdminChecked'])){
   
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['superAdminChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}


 
 if(isset($_POST['checkadminEmail'])){
  
    $result = new User();
    $chack_email= $result->check_email($_POST['checkadminEmail']);
    if($chack_email == true){
        $error = '*Email is alredy registered';
        echo $error;
        return true;
    } else { 
        return false;
        
        $error = '*Email available';
        echo $error; 
        
        
    }
 }                 
    if (!preg_match('/^[A-žÀ-ÿš]+ [A-žÀ-ÿ]+$/', $_POST['admin_fullname'])) {
        $error = '*Invalid Fullname';
        echo $error;
    } else if (!filter_var($_POST['admin_email'], FILTER_VALIDATE_EMAIL)) {
        $error = '*Invalid email';
        echo $error;
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST['admin_password'])) {
        $error = '*Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters';
        echo $error;
    } else if ($_POST['user_type'] !== 'admin'){
        $error = '*Select position!';
        echo $error;
    }else {
        include 'new_admin_registration.inc.php';
     
    }