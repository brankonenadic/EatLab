<?php include './sections/header.section.php'; ?>

<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>
<?php include './classes/User.class.php';?>
<?php include './sections/navbar.section.php'; ?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-11 col-md-11">
        <div class="card card-forms">
			<div class="card-header card-head-bg">
				<div class="label-heading"><h5 class="text-center text-white">Employees profile</h5></div>
			</div><!-- card-header -->
				<div class="card-body card-bg-new">
					<!-- bio -->
					<?php 

                    $user_id = $_SESSION['user_session'];
					$employees = new User();
					$profile_img = $employees->profile_img($user_id);
					if($profile_img){
						echo '<div class=""><img src="img/user_img/'.$profile_img.'" class="card-img-top img-border-radius" style="width: 18rem;" alt="user img"></div>';
					}else{
						echo '<div class=""><img src="img/user_img/035-chef.png" class="card-img-top img-border-radius" style="width: 18rem;" alt="user img"></div>';	
					}
					?>
					
		
					
				<?php
					

				$user_id = $_SESSION['user_session'];
				$info = new User();
				$result = $info->employees_user($user_id);

				if ($result->num_rows > 0) {
				
				
				while($row = $result->fetch_assoc()) {

					
				echo'	

				<div class="card card-body">

					<div class="container">
					<p>Fullname: <span class="font-weight-bold">'. $row["fullname"] .'</span></p>
					</div>
					<br>


					<div class="container">
					<p>Email address: <span class="font-weight-bold">'. $row["user_email"] .'</span></p>
					</div>
					<br>


					<div class="container">
					<p>Phone: <span class="font-weight-bold">'. $row["phone"] .'</span></p>
					</div>
					<br>


					<div class="container">
					<p>Address: <span class="font-weight-bold">'. $row["address"] .'</span></p>
					</div>
					<br>



					<div class="container">
					<p>City: <span class="font-weight-bold">'. $row["city"] .'</span></p>
					</div>
					<br>

					<div class="container">
					<p>Zipcode: <span class="font-weight-bold">'. $row["zip_code"] .'</span></p>
					</div>
					<br>

					<div class="container">
					<p>Country: <span class="font-weight-bold">'. $row["country"] .'</span></p>
					</div>
					<br>

					<div class="container">
					<p>Posision: <span class="font-weight-bold">'. $row["user_type"] .'</span></p>
					</div>
					<br>
					<div class="container">
					<p>Contract type: <span class="font-weight-bold">'. $row["contract_type"] .'</span></p>
					</div>
					<br>
					<div class="container">
					<p>Contract start: <span class="font-weight-bold">'. $row["contract_start"] .'</span></p>
					</div>
					<br>
					<div class="container">
					<p>Contract end: <span class="font-weight-bold">'. $row["contract_end"] .'</span></p>
					</div>
				</div>

					';
				}
				}

				?>


				<div class="container">
						<!-- collapse employees password start -->
						<a class="text-success"  data-toggle="collapse" data-target="#update_employees_password_area" aria-expanded="false" aria-controls="update_employees_password_area">employees password
						<i class="far fa-edit"></i>
						</a>
						<div class="collapse" id="update_employees_password_area">
						<div class="card card-body">
						<form action="" id="update_employees_password_form" method="POST" enctype="multipart/form-data">
							<div class="form-group">
							<input type="password" autocomplete="false"id="old_employees_password" class="form-control" placeholder="Enter old password..." required>
							<div class="old_employees_password-error error text-danger"></div>
							</div><!-- form-group -->
							<div class="form-group">
							<input type="password" autocomplete="false" name="update_employees_password" id="update_employees_password" class="form-control" placeholder="Enter new password..." required>
							<div class="update_employees_password-error error text-danger"></div>
							</div><!-- form-group -->
							<div class="form-group">
							<input type="password" autocomplete="false"id="re_new_employees_password" class="form-control" placeholder="Reetape new password..." required>
							<div class="re_new_employees_password-error error text-danger"></div>
							</div><!-- form-group -->
							<div class="form-group">
							<button type="submit" id="update_employees_password_btn" value="update_employees_password_btn" class="btn btn-outline-success btn-radius btn-block form-btn">employees password</button>
							</div><!-- form-group -->
						</form><!-- form -->
						</div>
						</div>
						<!-- collapse employees password end -->
					
				</div><!-- card-body -->
			</div><!-- card -->
		</div>
	</div><!-- col -->
</div>


<?php include './sections/footer.section.php'; ?>