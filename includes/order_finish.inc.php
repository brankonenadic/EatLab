<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if(isset($_POST['order_finish'])){

  $user_id = $_POST['user_id'];

  $order_no = $_POST['order_finish'];

  $call = new User();

  $order_finish = $call->order_finish_weiter($user_id, $order_no);

  if($order_finish){

    $error = '*Order finish!';
    echo $error; 

}else{

    $error = '*Order is not finish!';
    echo $error; 
    
}


}else{
echo "Order no is not set!";
}