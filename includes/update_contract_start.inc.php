<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['updateContractStartPasswordChecked'])){
    $user_id = $_SESSION['user_session'];
    $update = new User();
    $check_password = $update->user_password($user_id, $_POST['updateContractStartPasswordChecked']);
    if($check_password == true){
        return false;
        $error = '*Password is valid';
        echo $error; 
       
    }else{
    
        $error = '*Password is incorect';
        echo $error; 
        
    }   
}
if(isset($_POST['update_contract_start_btn'])){
print_r($_POST);
    $business_id = $_SESSION['user_session'];
    $employees_id = $_SESSION['employees_id'];
    $update = new User();
    $contract_start = $_POST['update_contract_start'];

    $update_contract_start = $update->update_contract_start($contract_start, $employees_id, $business_id);
    if($update_contract_start == true){
        $error = '*Conctact start is updated';
        echo $error; 
    }else{
        $error = '*Conctact start update error';
        echo $error; 
    
    } 
}