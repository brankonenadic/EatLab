<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';
    if(isset($_POST['order_ready'])){
        $user_id = $_POST['user_id'];
        $order_no = $_POST['order_ready'];
        $call = new User();
        $order_ready = $call->order_ready_chef($user_id, $order_no);
            if($order_ready){
              $error = '*Order ready!';
              echo $error; 
            }else{
              $error = '*Order is not ready!';
              echo $error; 
            }
      }else{
        echo "Order no is not set!";
      }