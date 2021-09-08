<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php  include 'autoloader.inc.php';

 $activate = new User();

if (isset($_GET['id']) && isset($_GET['token'])) {
  
  if ($activate->activate($_GET['id'], $_GET['token'])) {
    header('location: ../login'); 
  } else {
    header('location: ../error_activation');
  }
} else if (isset($_GET['recover_id']) && isset($_GET['recover_token'])) {

  if ($activate->forgot_password_check($_GET['recover_id'], $_GET['recover_token']) == true) {
    header('location:../new_password');
  } else {
     header('location:../error_activation');
  }
} else {
  $error = '*Error activation';
  echo $error;
 }