<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['updateContractEndPasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateContractEndPasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}
if(isset($_POST['update_contract_end_btn'])){
    print_r($_POST);
        $business_id = $_SESSION['user_session'];
        $employees_id = $_SESSION['employees_id'];
        $update = new User();
        $contract_end = $_POST['update_contract_end'];
    
        $update_contract_end = $update->update_contract_end($contract_end, $employees_id, $business_id);
        if($update_contract_end == true){
            $error = '*Conctact end is updated';
            echo $error; 
        }else{
            $error = '*Conctact end update error';
            echo $error; 
        
        } 
    }