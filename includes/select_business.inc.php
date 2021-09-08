<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if (isset($_POST['hidden_business_id'])){

  $_SESSION['business_session'] = $_POST['hidden_business_id'];
  unset($_SESSION['table']);
  unset($_SESSION['menu_category']);
  echo "Business seassion sucess";
 
}
