<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';


if(isset($_POST['user_id'])){
    $table_id = $_POST['table_id'];
    $user_id = $_POST['user_id'];
    $business_id = $_POST['business_id'];
    $payment_method = $_POST['method'];
    $total_price = $_POST['total'];
    $today = date("Ymd");
    $rand = sprintf("%04d", rand(0,9999));
    $bill_number = $today . $rand;
    $_SESSION['bill_number'] = $bill_number;
    $info = new User();

    $bill_no_id = $info->bill_number($user_id, $bill_number, $business_id, $table_id, $total_price, $payment_method);
    $array = $_POST['order_no_id'];
    
      foreach ($array as $key => $value) {
        $order_no_id = $value;
      
        $info = new User();
        $result = $info->insert_bill_content($bill_no_id, $order_no_id);
        if($result){
        
          echo "sucess insert bill";
        }else{
          echo "error insert bill";
        }
    

      }


}else{
  echo "error take bill";
}
