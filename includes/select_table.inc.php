<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['hidden_table_id'])){
 
    $_SESSION['table'] =  $_POST['hidden_table_id'];
    unset($_SESSION['menu_category']);
    echo "Table session start!";

}
