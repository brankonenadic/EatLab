<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';



if (isset($_POST["active_user_id"])){
    print_r($_POST);
    $active = $_POST["aktive_users"];
    $user_id = $_POST["active_user_id"];
    $info = new User();
    $update_active = $info->update_users_status($user_id, $active);

if($update_active){

    return true;
}else{
 
    return false;
} 
 

}else{
    echo "ne radi";
}