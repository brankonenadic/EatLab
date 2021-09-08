<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['item_quantity'])){
  $table_id = $_SESSION['table'];
  $user_id = $_SESSION['user_session'];
  $business_id = $_SESSION['business_session'];

  $today = date("Ymd");
  $rand = sprintf("%04d", rand(0,9999));
  $order_no = $today . $rand;
  $info = new User();
  $order_no_id = $info->order_number($user_id, $order_no, $business_id, $table_id);

  foreach ($_POST['item_quantity'] as $key => $value) {
    $quantity = $value;
    $dish_id = $dish_id = $_POST['item_id'][$key];
  
    $info = new User();
    $result = $info->insert_order($order_no_id, $table_id, $dish_id, $quantity);
    if($result){
      echo "sucess order";
    }else{
      echo "error order";
    }
}

}else{
  echo "error order 2";
}





