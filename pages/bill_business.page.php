<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>
<?php include './classes/User.class.php';?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col">
        <div class="card card-forms">
              <div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">Bill List</h5></div>
              </div><!-- card-header -->
			        <div class="card-body card-bg-new">
                

                <?php 
                        $user_id = $_SESSION['user_session'];
                        $user_type = $_SESSION['user_type'];
                        $active = new User();
                        $active_status = $active->employees_active_status($user_id);


if ($active_status == 'inactive') {
  echo '
  <!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-md-4">
        <div class="card card-forms border-0">
            <div class="card-header card-head-bg">
              <div class="label-heading"><h5 class="text-center text-white">Not active</h5></div>
            </div><!-- card-header -->
            <div class="card-body border">
                <h6 class="text-center text-danger">You are not active!</h6>
                <p class="text-center text-danger">Contact your menager!</p>
            </div><!-- card-body -->
            <div class="card-footer card-footer-bg">
            </div>
        </div><!-- card -->
    </div><!-- col -->
</div><!-- content end -->
';
} else {

  $info = new User();
  $business_id = $info->business_id($user_id);
                  
  $result1 = $info->bill_list($business_id);

  if ($result1->num_rows > 0) {
  
    $counter = 1;
  while($row = $result1->fetch_assoc()) {

    echo "<div class='table-responsive bg-light'>";
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Bill number</th>";
    echo "<th scope='col'>Table</th>";
    echo "<th scope='col'>Total</th>";
    echo "<th scope='col'>Payment method</th>";
    echo "</tr>";  
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th scope='row'>" . $counter . "</th>";
    echo "<td><strong> " . $row['bill_no'] . "</strong></td>";
    echo "<td><strong>" . $row['table_name'] . "</strong></td>";
    echo "<td><strong>" . $row['total_price'] . " km</strong></td>";
    echo "<td><strong>" . $row['payment_method'] . "</strong></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th scope='row'></th>";
    echo "<td colspan='3'>";
      $status = $row['status'];
      $bill_no = $row['id'];
      $order_bill_id = $row['order_no_id'];
      $info = new User();

      $order_info = $info->print_bill($bill_no);
      $total = 0;
    if ($order_info->num_rows > 0) {
      echo "<table class='table table-hover'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th scope='col'>#</th>";
      echo "<th scope='col'>Dish name</th>";
      echo "<th scope='col'>Quantity</th>";
      echo "</tr>";  
      
      $counter1 = 1;
        while($row1 = $order_info->fetch_assoc()) {

          echo "<tr>";
          echo "<th scope='row'>" . $counter1 . "</th>";
          echo "<td>" . $row1['name'] . "</td>";
          echo "<td>" . $row1['quantity'] . "</td>";
          echo "<td>" . number_format(($row1['quantity'] * $row1['price']), 2) . " km</td>";
          echo "</tr>";
          $total = $total + ($row1['quantity']*$row1['price']); 

          echo "</tr>";
          $counter1++; 
        }
    echo "<tr>";
    echo "<td>Hvala na posjeti</td>";
    echo "<td> </td>";
    echo "<td><strong>Total : </strong></td>";
    echo "<td><strong>" . number_format($total, 2) . " km</strong></td>";
    echo "</tr>"; 
    echo "</tbody>";
    echo "</table>";
  
  }
    echo '</td>';
    echo "</tr>"; 
    echo "<tr>";
    echo "<th></th>";
    echo "<td> </td>";
    echo "<td></td>";
    echo "<td>";


      if($status == 1){
      echo'<div class= "container text-right"><form class="print_bill_form" method="POST">
      <input type="hidden" name="print_bill" 
      value="'.$bill_no.'">
      <input type="hidden" name="user_id" 
      value="'.$user_id.'">
      <input type="hidden" name="order_bill_id[]" value="'.$order_bill_id.'">
      <button type="submit" class="btn btn-danger" 
      name="print_bill_btn" value="print_bill_btn">Print bill</button>';
      echo '</form></div>';
      }
                       
          echo '</td>';
          echo "</tr>";
          $counter++; 
          echo "</tbody>";
          echo "</table>";
          echo "</div><!-- table responzive end -->";
          echo "<br><br>";
      }
  } else {
    echo '
      <div class="label-heading py-5 my-5"><h4 class="text-center">No bill yet</h4></div>  
      ';
  }
}               
?>
            </div><!-- card body end -->
        </div><!-- card rnd -->
    </div><!-- col end -->
</div>
<!-- content end -->

<script>
   function refreshPage () {
     var page_y = document.getElementsByTagName("body")[0].scrollTop;
         window.location.href = window.location.href.split('?')[0] + '?page_y=' + page_y;
        }
        window.onload = function () {
            setTimeout(refreshPage, 5000);
            if ( window.location.href.indexOf('page_y') != -1 ) {
                var match = window.location.href.split('?')[1].split("&")[0].split("=");
                document.getElementsByTagName("body")[0].scrollTop = match[1];
            }
 }
   
</script>

<?php include './sections/footer.section.php'; ?>