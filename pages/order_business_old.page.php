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

              <div class="table-responsive bg-light">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Order number</th>
                      <th scope="col">Table</th>
                      <th scope="col">Order status</th>
                      <th scope="col">View order</th>
                  <!--    <th scope="col">Actions</th> -->
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                        $user_id = $_SESSION['user_session'];
                        $user_type = $_SESSION['user_type'];
                        $info = new User();
                        $business_info = $info->business_id($user_id);
                  
                        $result1 = $info->order_list_business($business_info);
              
                        if ($result1->num_rows > 0) {
                        
                          $counter = 1;
                        while($row = $result1->fetch_assoc()) {
                        

                          echo "<tr>";
                          echo "<th scope='row'>" . $counter . "</th>";
                          echo "<td>" . $row['order_no'] . "</td>";
                          echo "<td>" . $row['table_name'] . "</td>";
                          if($row['status'] == 1){
                            echo "<td><span class='badge badge-danger'>Panding</span></td>";
                          }else if($row['status'] == 2){

                            echo "<td><span class='badge badge-warning'>Order confirmed</span></td>";
                          }else if($row['status'] == 3){

                            echo "<td><span class='badge badge-success'>On the way</span></td>";
                          }
                          
                            echo "<td>";

                            if($row['status'] == 1){
                              echo'<form class="order_view_form" method="POST">
                            <input type="hidden" name="order_view" 
                            value="'.$row['order_no'].'">
                            <button type="submit" class="btn btn-success" 
                            name="order_view_btn" value="order_view_btn" data-toggle="modal" data-target="#myModalTwo">View order</button>';
                            echo '</form>';
                            }else if($row['status'] == 2){
                              echo'<form class="order_view_form" method="POST">
                              <input type="hidden" name="order_view" 
                              value="'.$row['order_no'].'">
                              <button type="submit" class="btn btn-success" 
                              name="order_view_btn" value="order_view_btn" data-toggle="modal" data-target="#myModalTwo">View order</button>';
                              echo '</form>';
                            }else if($row['status'] == 3){
                              echo'<form class="order_finish_form" method="POST">
                              <input type="hidden" name="order_finish" 
                              value="'.$row['order_no'].'">
                              <button type="submit" class="btn btn-success" 
                              name="order_finish_btn" value="order_finish_btn" data-toggle="modal" data-target="#myModalOne">Order finish</button>';
                              echo '</form>';
                            }
                          
                            echo '</td>';

                          /*   
                            echo "<td>";
                            echo'<form class="order_status_form"><input type="hidden" name="dish_status_id"
                            id="dish_status_id" value="'.$user_id.'">
                            <button type="submit" class="btn btn-warning" 
                            name="dish_status_btn" id="dish_status_btn" value="dish_status_btn">Action</button>';
                            echo '</form></td>'; */

                            echo "</tr>";
                            $counter++; 
                      }
                    }
                        ?>
                  </tbody>
                </table>
                  <!-- Modal start-->
                      <div class="modal fade" id="myModalTwo" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Order</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dish name </th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                        
                                if(isset($_SESSION['order_no'])){

                                  $order_no = $_SESSION['order_no'];

                                  $info = new User();

                                  $order_info = $info->order_info($order_no);
                      
                                if ($order_info->num_rows > 0) {
                                
                                  $counter = 1;
                                while($row = $order_info->fetch_assoc()) {
                                
                                  
                                  echo "<tr>";
                                  echo "<th scope='row'>" . $counter . "</th>";
                                  echo "<td>" . $row['name'] . "</td>";
                                  echo "<td>" . $row['quantity'] . "</td>";
                                  echo "<td>" . number_format(($row['quantity'] * $row['price']), 2) . " km</td>";
                                  echo "</tr>";
                                  $total = $total + ($row['quantity']*$row['price']);
                                  $counter++;
                                }
                                
                                echo "<tr>";
                                echo "<td>Modal 2 </td>";
                                echo "<td> </td>";
                                echo "<td><strong>Total : </strong></td>";
                                echo "<td><strong>" . number_format($total, 2) . " km</strong></td>";
                                echo "</tr>";
                              }
                            }else{
                                    echo '
                                  
                                  <tr>
                                  <td>1</td>
                                  <td>Empty</td>
                                  <td>2</td>
                                  </tr>

                                  '; 
                                  }
                                    ?>
                                </tbody>
                              </table>
                                </div>
                                <?php
                              
                                if($_SESSION['type'] == 'waiter'){
                                  echo '
                                  <form class="accept_form" method="POST">
                                  <input type="hidden" name="order_no" 
                                    value="'.$_SESSION['order_no'].'">
                                    <input type="hidden" name="user_id" 
                                    value="'.$user_id.'">
                                    <button type="submit" class="btn btn-warning" 
                                    name="accept_btn" id="" value="accept_btn">Accept</button>
                                  </form>
                                    '; 
                                }else if($_SESSION['type'] == 'chef'){
                                  echo '
                                  <form class="finish_order_form" method="POST">
                                  <input type="hidden" name="order_no" 
                                    value="'.$_SESSION['order_no'].'">
                                    <input type="hidden" name="user_id" 
                                    value="'.$user_id.'">
                                    <button type="submit" class="btn btn-success" 
                                    name="finish_order_btn" id="" value="finish_order_btn">Accept</button>
                                  </form>
                                    '; 
                                }
                              
                            ?> 
                                </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal end-->
                      <!-- Modal 2 start-->
                      <div class="modal fade" id="myModalOne" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Order finish</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dish name </th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                        
                                if(isset($_SESSION['order_no'])){

                                  $order_no = $_SESSION['order_no'];

                                  $info = new User();

                                  $order_info = $info->order_info($order_no);
                      
                                if ($order_info->num_rows > 0) {
                                
                                  $counter = 1;
                                while($row = $order_info->fetch_assoc()) {
                                
                                  
                                  echo "<tr>";
                                  echo "<th scope='row'>" . $counter . "</th>";
                                  echo "<td>" . $row['name'] . "</td>";
                                  echo "<td>" . $row['quantity'] . "</td>";
                                  echo "<td>" . number_format(($row['quantity'] * $row['price']), 2) . " km</td>";
                                  echo "</tr>";
                                  $total = $total + ($row['quantity']*$row['price']);
                                  $counter++;
                                }
                                
                                echo "<tr>";
                                echo "<td>Modal 1 </td>";
                                echo "<td> </td>";
                                echo "<td><strong>Total : </strong></td>";
                                echo "<td><strong>" . number_format($total, 2) . " km</strong></td>";
                                echo "</tr>";
                              }
                            }else{
                                    echo '
                                  
                                  <tr>
                                  <td>1</td>
                                  <td>Empty</td>
                                  <td>2</td>
                                  </tr>

                                  '; 
                                  }
                                    ?>
                                </tbody>
                                </table>
                                </div>
                                <?php
                              
                                if($_SESSION['type'] == 'waiter'){
                                  echo '
                                  <form class="" method="POST">
                                  <input type="hidden" name="order_no" 
                                    value="'.$_SESSION['order_no'].'">
                                    <input type="hidden" name="user_id" 
                                    value="'.$user_id.'">
                                    <button type="submit" class="btn btn-warning" 
                                    name="accept_btn" id="" value="accept_btn">Accept</button>
                                  </form>
                                    '; 
                                }else if($_SESSION['type'] == 'chef'){
                                  echo '
                                  <form class="" method="POST">
                                  <input type="hidden" name="order_no" 
                                    value="'.$_SESSION['order_no'].'">
                                    <input type="hidden" name="user_id" 
                                    value="'.$user_id.'">
                                    <button type="submit" class="btn btn-success" 
                                    name="finish_order_btn" id="" value="finish_order_btn">Accept</button>
                                  </form>
                                    '; 
                                }
                              
                            ?> 
                                </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal 2 end-->
              
              
              </div>
          </div>
        </div>
    </div>
</div>
<?php include './sections/footer.section.php'; ?>