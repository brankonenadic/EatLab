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
                <div class="label-heading"><h5 class="text-center text-white">Bill</h5></div>
              </div><!-- card-header -->
			      <div class="card-body card-bg-new">
              <!-- Start -->
              <?php
              if (!isset($_SESSION['bill_number'])){
              echo ' 
                  <div class="card">
                    <div class="card-header">
                      Invoiced  <strong>'.date("d/m/Y").'</strong> 
                      <span class="float-right">Status: Pending</span>
                    </div>
                      <div class="card-body">
                      <div class="row mb-4">
                      <div class="col-sm-6">
                      <h6 class="mb-3">From:</h6>
                      <div>
                      ';
                        $business_id = $_SESSION['business_session'];
                        $info = new User();
                        $result = $info->user_info($business_id);

                      if ($result->num_rows > 0) {
                          
                        while($row = $result->fetch_assoc()) {
                          echo "<strong>". $row['fullname'] ."</strong>";
                          echo "</div>";
                          echo "<div>". $row['address'] ."</div>";
                          echo "<div>". $row['city'] ."</div>";
                          echo "<div>Email: " . $row['user_email'] ."</div>";
                          echo "<div>Phone: " . $row['phone'] ."</div>";
                          echo "</div>";

                          }   
                        }else{
                          echo "<strong></strong>";
                          echo "</div>";
                          echo "<div></div>";
                          echo "<div></div>";
                          echo "<div>Email:</div>";
                          echo "<div>Phone:</div>";
                          echo "</div>";
                        }
                        echo ' 
                        <div class="col-sm-6">
                        <h6 class="mb-3">To:</h6>
                        <div>
                        ';
                        $user_id = $_SESSION['user_session'];
                        $info = new User();
                        $result = $info->user_info($user_id);

                        if ($result->num_rows > 0) {
                        
                          
                          while($row = $result->fetch_assoc()) {
                            echo "<strong>". $row['fullname'] ."</strong>";
                            echo "</div>";
                            echo "<div>". $row['address'] ."</div>";
                            echo "<div>". $row['city'] ."</div>";
                            echo "<div>Email: " . $row['user_email'] ."</div>";
                            echo "<div>Phone: " . $row['phone'] ."</div>";
                            echo "</div>";

                          }
                        }else{
                          echo "<strong></strong>";
                        echo "</div>";
                        echo "<div></div>";
                        echo "<div></div>";
                        echo "<div>Email:</div>";
                        echo "<div>Phone:</div>";
                        echo "</div>";
                        }
                        
                        echo ' 
                        </div>
                        <form name="ask_for_bill_form" id="ask_for_bill_form">
                          <div class="table-responsive-sm">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th class="center">#</th>
                                  <th class="center">Dish</th>
                                  <th class="right">Qty</th>
                                  <th class="center">Unit Cost</th>
                                  <th class="right">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                              ';
                              
                                        $user_id = $_SESSION['user_session'];
                                $table_id = $_SESSION['table'];
                                $business_id = $_SESSION['business'];
                                $info = new User();
                              
                          
                                $result = $info->order_number_id($user_id, $table_id);
                          
                                
                                if ($result->num_rows > 0) {
                                  $counter = 1;
                                  while($row = $result->fetch_assoc()) {
                                    $order_no_id = $row['id'];
                               echo '<input type="hidden" name="order_no_id[]" value="'.$order_no_id.'">';     
                                    $bill_check = $info->bill_check($order_no_id);


                                    if ($bill_check->num_rows > 0) {
                                      
                                      while($row1 = $bill_check->fetch_assoc()) {


                                        echo ' 
                                        <tr>
                                        ';
                                        echo "<td>" . $counter . "</td>";
                                        echo "<td>" . $row1['name'] . "</td>";
                                        echo "<td>" . $row1['quantity'] . "</td>";
                                        echo "<td>" . $row1['price'] . "</td>";
                                        echo "<td>" . number_format(($row1['quantity'] * $row1['price']), 2) . " km</td>";
                                        $total = $total + ($row1['quantity']*$row1['price']);
                                        $counter++;
                                      }

                                      
                                        }
                                  }
                                  echo '
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    ';
                                    echo "<td><strong>" . number_format($total, 2) . " km</strong></td>";
                                    echo '  
                                    </tr>
                                    </tbody>
                                  </table>
                                  ';
                                  echo '<input type="hidden" name="total" value="'. number_format($total, 2) .'">';

                                  echo '</div>';
                                  
                                    echo '  
                                      <div class="container text-right">
                                      <h4>Payment method</h4>
                                      <input type="hidden" name="user_id" value="'.$_SESSION['user_session'].'">
                                      <input type="hidden" name="business_id" value="'.$_SESSION['business_session'].'">
                                      <input type="hidden" name="table_id" value="'. $_SESSION['table'].'">
                                      <input type="radio" id="card" name="method" value="card" required>
                                  <label for="card">Card</label><br>
                                  <input type="radio" id="cash" name="method" value="cash">
                                  <label for="cash">Cash</label><br>
                                  <button type="submit" id="ask_for_bill" class="btn btn-success btn-radius">Ask for bill</button>
                                  </div> ';
                                 
                                  }else{
                                    echo '
                                    <tr>
                                    <td colspan="5" align="center">
                                    <div class="label-heading py-5 my-5"><h4 class="text-center">No bill yet</h4></div> 
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    ';
                                  }
                                }else{ 
                                  $business_id = $_SESSION['business_session'];
                        $info = new User();
                        $result = $info->user_info($business_id);

                      if ($result->num_rows > 0) {
                          
                        while($row = $result->fetch_assoc()) {
                        
                          echo '<div class="label-heading py-5 my-5">
                          <p class="text-center">The waiter will bring your bill !</p>
                          <p class="text-center">We hope you enjoyed it ! </p>
                          <p class="text-center"> Thank you for your trust.</p>
                          <p class="text-center">Restoran:<h4 class="text-center"><strong>'. $row['fullname'] .'</strong></h4></p>
                          </div>
                          ';
                          
                          }   
                        }
                                }

                                ?>
                        
              
              </form>
            </div>
        </div>
    </div>
</div>
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


