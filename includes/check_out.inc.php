<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';
    unset($_SESSION['business_session']);  
    unset($_SESSION['table']);
    unset($_SESSION['menu_category']);
    
    header('location: ../menu');
    