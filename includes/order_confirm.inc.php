<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['order_confirm'])){

    $user_id = $_POST['user_id'];

    $order_no = $_POST['order_confirm'];

    $call = new User();

    $order_confirm = $call->order_confirm_weiter($user_id, $order_no);

    if($order_confirm){

      $error = '*Order is comfirm!';
      echo $error; 

  }else{

      $error = '*Order is not comfirm!';
      echo $error; 
      
  }


}else{
  echo "Order no is not set!";
}
