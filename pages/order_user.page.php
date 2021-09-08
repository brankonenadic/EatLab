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
                                $table_id = $_SESSION['table'];
                                $business_id = $_SESSION['business'];
                                $info = new User();
                              
                          
                                $result = $info->order_view_user($user_id);
                                if ($result->num_rows > 0) {
                                  echo ' 
                                  <div class="table-responsive bg-light">
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order number</th>
                                                <th scope="col">Order status</th>
                                                <th scope="col">View bill</th>
                                              </tr>
                                            </thead>
                                            <tbody>';
                                
                                  $counter = 1;
                                while($row = $result->fetch_assoc()) {
                                
                                  echo "<tr>";
                                  echo "<th scope='row'>" . $counter . "</th>";
                                  echo "<td>" . $row['order_no'] . "</td>";
                                  if($row['status'] == 1){
                                    echo "<td><span class='badge badge-pill badge-danger'>Panding</span></td>";
                                    echo "<td>Order is not finished yet !</td>";

                                  }else if($row['status'] == 2){

                                    echo "<td><span class='badge badge-pill badge-warning'>Order confirmed</span></td>";
                                    echo "<td>Order is not finished yet !</td>";

                                  }else if($row['status'] == 3){

                                    echo "<td><span class='badge badge-pill badge-info'>Order prepared</span></td>";
                                    echo "<td>Order is not finished yet !</td>";

                                  }else if($row['status'] == 4){

                                    echo "<td><span class='badge badge-pill badge-primary'>Order finish</span></td>";
                                    echo "<td>Order is not finished yet !</td>";
                                  }else if($row['status'] == 5){

                                    echo "<td><span class='badge badge-pill badge-success'>On the way</span></td>";
                                    echo '<td><a href="./bill"><button class="btn btn-outline-new">View bill</button></a></td>';
                                  }
                                  echo "</tr>";
                                  $counter++; 
                                }

                                echo '
                                </tbody>
                              </table>
                          </div>';

                              } else {
                                echo '
                                  <div class="label-heading py-5 my-5"><h4 class="text-center">No orders yet</h4></div>  
                                  ';
                              }




                                ?>
                     
                    
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