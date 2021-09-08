<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['updateContractTypePasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateContractTypePasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}
if(isset($_POST['update_contract_type_btn'])){

    $business_id = $_SESSION['user_session'];
    $employees_id = $_SESSION['employees_id'];
    $update = new User();
    $contract_type = $_POST['update_contract_type'];

    $update_contract_type = $update->update_contract_type($contract_type, $employees_id, $business_id);
    if($update_contract_type == true){
        $error = '*Conctact type is updated';
        echo $error; 
    }else{
        $error = '*Conctact type update error';
        echo $error; 
    
    } 
}