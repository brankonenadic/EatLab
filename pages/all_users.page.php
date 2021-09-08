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
              <div class="label-heading"><h5 class="text-center text-white">All Users</h5></div>
			      </div><!-- card-header -->
			      <div class="card-body card-bg-new">

              <div class="table-responsive bg-light">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Id</th>
                      <th scope="col">Fullname</th>
                      <th scope="col">Email</th>
                      <th scope="col">User type</th>
                      <th scope="col">Active</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                         
                          $info = new User();
                          $all_users = $info->all_users();
                         

                          if ($all_users->num_rows > 0) {
                          
                            $counter = 1;
                          while($row = $all_users->fetch_assoc()) {

                            echo "<tr>";
                            echo "<th scope='row'>" . $counter . "</th>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['fullname'] . "</td>";
                            echo "<td>" . $row['user_email'] . "</td>";
                            echo "<td>" . $row['user_type'] . "</td>";
                            echo '<td>';
                            if($row['status'] == '1'){
                                echo'<form class="aktive_users_form" method="POST"><input type="hidden" name="active_user_id"
                                id="active_user_id" value="'.$row["id"].'">
                                <input type="hidden" name="aktive_users" id="aktive_users" value="0">
                                <button type="submit" class="btn btn-outline-success btn-radius" 
                                name="aktive_users" id="aktive_users" value="aktive_users">Active</button></form>';
                            }else{
                                echo'<form class="aktive_users_form" method="POST"><input type="hidden" name="active_user_id" id="active_user_id" value="'.$row["id"].'">
                                <input type="hidden" name="aktive_users" id="aktive_users" value="1">
                                <button type="submit" class="btn btn-outline-danger btn-radius"  name="aktive_users"
                                id="aktive_users_btn" value="aktive_users">Inactive</button></form>'; 
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