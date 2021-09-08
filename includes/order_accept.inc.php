<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['order_acept'])){

  $user_id = $_POST['user_id'];

  $order_no = $_POST['order_acept'];

  $call = new User();

  $order_accept = $call->order_accept_chef($user_id, $order_no);

  if($order_accept){

    $error = '*Order is accept!';
    echo $error; 

}else{

    $error = '*Order is not accept!';
    echo $error; 
    
}


}else{
echo "Order no is not set!";
}