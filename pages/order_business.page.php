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
                <div class="label-heading"><h5 class="text-center text-white">Order List</h5></div>
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
                            $business_info = $info->business_id($user_id);
                                            
                            $result1 = $info->order_list_business($business_info);

                        if ($result1->num_rows > 0) {
                            
                              $counter = 1;
                            while($row = $result1->fetch_assoc()) {
                              if ($row['status'] != '5') {

                              echo "<div class='table-responsive bg-light'>";
                              echo "<table class='table table-hover'>";
                              echo "<thead>";
                              echo "<tr>";
                              echo "<th scope='col'>#</th>";
                              echo "<th scope='col'>Order number</th>";
                              echo "<th scope='col'>Table</th>";
                              echo "<th scope='col'>Order status</th>";
                              echo "</tr>";  
                              echo "</thead>";
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<th scope='row'>" . $counter . "</th>";
                              echo "<td><strong> " . $row['order_no'] . "</strong></td>";
                              echo "<td><strong>" . $row['table_name'] . "</strong></td>";
                            
                                if($row['status'] == 1){
                                  echo "<td><span class='badge badge-pill badge-danger'>Panding</span></td>";
                                }else if($row['status'] == 2){
                                  echo "<td><span class='badge badge-pill badge-warning'>Order confirmed</span></td>";
                                }else if($row['status'] == 3){
                                  echo "<td><span class='badge badge-pill badge-info'>Order prepared</span></td>";
                                }else if($row['status'] == 4){
                                  echo "<td><span class='badge badge-pill badge-primary'>Order finis</span></td>";
                                }else if($row['status'] == 5){
                                  echo "<td><span class='badge badge-pill badge-success'>On the way</span></td>";
                                }
                              echo "</tr>";

                              echo "<tr>";
                              echo "<th scope='row'></th>";
                              echo "<td colspan='3'>";
                                $status = $row['status'];
                                $order_no = $row['id'];

                                $info = new User();

                                $order_info = $info->order_info($order_no);
                                
                              if ($order_info->num_rows > 0) {
                                echo "<table class='table table-hover'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th scope='col'>#</th>";
                                echo "<th scope='col'>Dish name</th>";
                                echo "<th scope='col'>Quantity</th>";
                                echo "</tr>";  
                                
                                $counter1 = 1;
                                  while($row = $order_info->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<th scope='row'>" . $counter1 . "</th>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['quantity'] . "</td>";
                                    echo "</tr>";
                                    $counter1++; 
                                  }

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

                                if ($_SESSION['type'] == 'waiter') {

                                if($status == 1){
                                echo'<form class="order_confirm_form" method="POST">
                                <input type="hidden" name="order_confirm" 
                                value="'.$order_no.'">
                                <input type="hidden" name="user_id" 
                                value="'.$user_id.'">
                                <button type="submit" class="btn btn-danger" 
                                name="order_confirm_btn" value="order_confirm_btn" ">Order contirm</button>';
                                echo '</form>';
                                }else if($status == 4){
                                echo'<form class="order_finish_form" method="POST">
                                <input type="hidden" name="order_finish" 
                                value="'.$order_no.'">
                                <input type="hidden" name="user_id" 
                                value="'.$user_id.'">
                                <button type="submit" class="btn btn-success" 
                                name="order_finish_btn" value="order_finish_btn" >Order finish</button>';
                                echo '</form>';
                                }

                                } else if ($_SESSION['type'] == 'chef') {
                                if($status == 2){
                                echo'<form class="order_accept_form" method="POST">
                                <input type="hidden" name="order_acept" 
                                value="'.$order_no.'">
                                <input type="hidden" name="user_id" 
                                value="'.$user_id.'">
                                <button type="submit" class="btn btn-warning" 
                                name="order_acept_btn" value="order_acept_btn" ">Order accept</button>';
                                echo '</form>';
                                }else if($status == 3){
                                echo'<form class="order_ready_form" method="POST">
                                <input type="hidden" name="order_ready" 
                                value="'.$order_no.'">
                                <input type="hidden" name="user_id" 
                                value="'.$user_id.'">
                                <button type="submit" class="btn btn-info" 
                                name="order_ready_btn" value="order_ready_btn" >Order ready</button>';
                                echo '</form>';
                                }
                                }                      


                                    echo '</td>';

                                    echo "</tr>";
                                    $counter++; 
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "</div><!-- table responzive end -->";
                                    echo "<br><br>";
                                }
                              }  
                            } else {
                              echo '
                                <div class="label-heading py-5 my-5"><h4 class="text-center">No orders yet</h4></div>  
                                ';
                            }
                          }

                                                
                        ?>
 
                
            </div><!-- card body end -->
        </div><!-- card end -->
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