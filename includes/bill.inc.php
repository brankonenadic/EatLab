<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';

if (isset($_POST['print_bill'])) {
  $bill_number_id = $_POST['print_bill'];
  $weiter_id = $_POST['user_id'];
  $array = $_POST['order_bill_id'];
  $info = new User();
  $accept_bill = $info->bill_accept($weiter_id, $bill_number_id);
  if ($accept_bill){
    foreach ($array as $key => $value) {
      $order_bill_id = $value;
      $info = new User();
      $result = $info->order_bill($order_bill_id);
      if ($result){ 
        $error = '*Sucess order bill';
        echo $error; 
      } else {
        $error = '*Error order bill';
        echo $error; 
      }
    }
    $error = '*Sucess accept bill';
    echo $error;
  } else {
    $error = '*Error accept bill';
    echo $error;
  }
} else {
  $error = '*Error print bill';
  echo $error;
}