<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if (isset($_POST['tablePasswordChecked'])){
  $user_id = $_SESSION['user_session'];
  $update = new User();
  $check_password = $update->user_password($user_id, $_POST['tablePasswordChecked']);
  if ($check_password == true){
      return false;
      $error = '*Password is valid';
      echo $error; 
  } else {
      $error = '*Password is incorect';
      echo $error; 
  }   
}

if (isset($_POST['add_table_btn'])){
  $business_id = $_SESSION['user_session'];
  $add = new User();
  $table_name = $_POST['table_name'];
  $add_table = $add->add_table($table_name , $business_id);
  if ($add_table == true){
      $error = '*Table is add';
      echo $error; 
  } else {
      $error = '*Table add error';
      echo $error; 
  } 
}