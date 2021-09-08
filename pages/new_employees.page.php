<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8">
        <div class="card card-forms">
			<div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">New Employees</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new">
				<form action="" id="new_employees_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" autocomplete="false" name="employees_fullname" id="employees_fullname" class="form-control" placeholder="Enter employees fullname..." required>
						<div class="employees_fullname-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="email" name="employees_email" id="employees_email" class="form-control" placeholder="Enter Email..." autocomplete="off" required>
						<div class="employees_email-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false" name="employees_password" id="employees_password" class="form-control" placeholder="Choose password..." required>
						<div class="employees_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false"id="re_employees_password" class="form-control" placeholder="Confirm password..." required>
						<div class="re_employees_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group"> 
						<select class="form-control" autocomplete="false"  name="position" id="position" required>
							<option value="">Choose position...</option>
							<option value="menager">Menager</option>
							<option value="chef">Chef</option>
							<option value="waiter">Waiter</option>
						</select>
						<div class="position-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false" name="boss_password" id="boss_password" class="form-control" placeholder="Admin password..." required>
						<div class="boss_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<button type="submit" id="new_employees" value="new_employees" class="btn btn-outline-new btn-block form-btn" >Create Account</button>
					</div><!-- form-group -->
				</form><!-- form -->
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->
<?php include './sections/footer.section.php'; ?>