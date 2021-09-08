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
              <div class="label-heading"><h5 class="text-center text-white">Employees Active</h5></div>
			      </div><!-- card-header -->
			      <div class="card-body card-bg-new">

              <div class="table-responsive bg-light">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Fullname</th>
                      <th scope="col">Posision</th>
                      <th scope="col">Active</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                          $user_id = $_SESSION['user_session'];
                          $info = new User();
                          $business_id = $info->business_id($user_id);
                          $result = $info->employees_active($business_id);


                          if ($result->num_rows > 0) {
                          
                            $counter = 1;
                          while($row = $result->fetch_assoc()) {

                            echo "<tr>";
                            echo "<th scope='row'>" . $counter . "</th>";
                            echo "<td>" . $row['fullname'] . "</td>";
                            echo "<td>" . $row['user_type'] . "</td>";
                            echo '<td>';
                            if($row['active'] == 'active'){
                                echo'<form class="aktive_form" method="POST"><input type="hidden" name="active_id"
                                id="active_id" value="'.$row["user_id"].'">
                                <input type="hidden" name="active_status" id="active_status" value="inactive">
                                <button type="submit" class="btn btn-outline-success btn-radius" 
                                name="active_btn" id="active_btn" value="active_btn">Active</button></form>';
                            }else{
                                echo'<form class="aktive_form" method="POST"><input type="hidden" name="active_id" id="active_id" value="'.$row["user_id"].'">
                                <input type="hidden" name="active_status" id="active_status" value="active">
                                <button type="submit" class="btn btn-outline-danger btn-radius"  name="active_btn"
                                id="active_btn" value="active_btn">Inactive</button></form>'; 
                            }
                            echo '</td>';
                            echo "</tr>";
                            $counter++; 

                          }
                        }
                          ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</div>

<?php include './sections/footer.section.php'; ?>
