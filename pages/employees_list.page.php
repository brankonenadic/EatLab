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
              <div class="label-heading"><h5 class="text-center text-white">Employees List</h5></div>
			      </div><!-- card-header -->
			      <div class="card-body card-bg-new">

              <div class="table-responsive bg-light">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Zipcode</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                        <th scope="col">Posision</th>
                        <th scope="col">Contract type</th>
                        <th scope="col">Contract start</th>
                        <th scope="col">Contract end</th>
                        <th scope="col">Active</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                            $business_id = $_SESSION['user_session'];
                            $info = new User();
                            $result = $info->employees_list($business_id);

                            if ($result->num_rows > 0) {
                            
                              $counter = 1;
                            while($row = $result->fetch_assoc()) {

                              echo "<tr>";
                              echo "<th scope='row'>" . $counter . "</th>";
                              echo "<td>" . $row['fullname'] . "</td>";
                              echo "<td>" . $row['phone'] . "</td>";
                              echo "<td>" . $row['user_email'] . "</td>";
                              echo "<td>" . $row['address'] . "</td>";
                              echo "<td>" . $row['zip_code'] . "</td>";
                              echo "<td>" . $row['city'] . "</td>";
                              echo "<td>" . $row['country'] . "</td>";
                              echo "<td>" . $row['user_type'] . "</td>";
                              echo "<td>" . $row['contract_type'] . "</td>";
                              echo "<td>" . $row['contract_start'] . "</td>";
                              echo "<td>" . $row['contract_end'] . "</td>";
                              echo "<td>" . $row['active'] . "</td>";
                              echo '<td><form action="./employees_profile" method="POST"><input type="hidden" name="employees_id" value="'.$row["user_id"].'" /><button class="btn btn-outline-success btn-radius" type="submit" name="employees_id_btn">Edit</button></form></td>';
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
