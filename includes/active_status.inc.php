<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if (isset($_POST["active_id"])){
  print_r($_POST);
    $active = $_POST["active_status"];
    $employees_id = $_POST["active_id"];
    $info = new User();
    $update_active = $info->update_active($employees_id, $active);

    if ($update_active){
        return true;
    } else {
        return false;
    }
} else {
    $error = '*Update active error !';
    echo $error;
}
