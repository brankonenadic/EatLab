<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8">
        <div class="card card-forms">
			<div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">New Admin</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new">
				<form action="" id="new_admin_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" autocomplete="false" name="admin_fullname" id="admin_fullname" class="form-control" placeholder="Enter admin fullname..." required>
						<div class="admin_fullname-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Enter Email..." autocomplete="off" required>
						<div class="admin_email-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false" name="admin_password" id="admin_password" class="form-control" placeholder="Choose password..." required>
						<div class="admin_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false"id="re_admin_password" class="form-control" placeholder="Confirm password..." required>
						<div class="re_admin_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group"> 
						<select class="form-control" autocomplete="false"  name="user_type" id="user_type" required>
							<option value="">Choose users type...</option>
							<option value="admin">Admin</option>
						</select>
						<div class="user_type-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false" name="super_admin_password" id="super_admin_password" class="form-control" placeholder="Super admin password..." required>
						<div class="super_admin_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<button type="submit" id="new_admin" value="new_admin" class="btn btn-outline-new btn-block form-btn" >Create Account</button>
					</div><!-- form-group -->
				</form><!-- form -->
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->
<?php include './sections/footer.section.php'; ?>