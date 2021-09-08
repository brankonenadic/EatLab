<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if (isset($_POST['checklogemail'])){
  $login = new User();
  $chack_email= $login->check_email($_POST['checklogemail']);
  if ($chack_email){
     return false;
      $error = '*Email is valid';
      echo $error;
  } else { 
    $error = '*Email is incorect';
    echo $error;  
  }
}
if (isset($_POST['login'])) {
    if (!filter_var($_POST['log_email'], FILTER_VALIDATE_EMAIL)) {
      $error = '*Invalid email';
      echo $error;
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST['log_password'])) {
      $error = '*Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters';
      echo $error;
    } else {
    $email = $_POST['log_email'];
    $password = $_POST['log_password'];
    $login = new User();
    $login->login($email, $password);
    if ($login){
      return false;
      $error = '*Login sucess!';
      echo $error;
    } else {
      $error = '*Login error!';
      echo $error;
    }
  }
 } else {
  header('location: ./login');
}
