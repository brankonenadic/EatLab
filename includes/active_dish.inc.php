<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if (isset($_POST["active_dish_id"])){
    print_r($_POST);
    $active = $_POST["active_dish_status"];
    $dish_id = $_POST["active_dish_id"];
    $info = new User();
    $update_active = $info->update_dish_status($dish_id, $active);

    if ($update_active){
        return true;
    } else {
        return false;
    }
} else {
    $error = '*Dish status error !';
    echo $error;
}
