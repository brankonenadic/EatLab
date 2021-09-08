<?php
include 'autoloader.inc.php';
 
 if(isset($_POST['checkEmail'])){
  
    $result = new User();
    $chack_email= $result->check_email($_POST['checkEmail']);
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
    if (!preg_match('/^[A-žÀ-ÿš]+ [A-žÀ-ÿ]+$/', $_POST['fullname'])) {
        $error = '*Invalid Fullname';
        echo $error;
    } else if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
        $error = '*Invalid email';
        echo $error;
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST['password'])) {
        $error = '*Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters';
        echo $error;
    } else if ($_POST['user_type'] !== 'user' && $_POST['user_type'] !== 'business'){
        $error = '*Select user type!';
        echo $error;
    }else {
        include 'registar.inc.php';
    }
 








