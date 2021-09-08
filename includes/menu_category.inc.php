<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';
if (isset($_POST["menu_category"])){
    $_SESSION['menu_category'] = $_POST['menu_category'];
    unset($_SESSION['bill_number']);
    echo "Menu category seassion sucess";
}