<?php include './sections/header.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-md-4">
        <div class="card card-forms">
			<div class="card-header card-head-bg mt-4">
                <div class="label-heading"><h5 class="text-center text-white">New password</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new">
				<form action="" id="new_password_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="password" autocomplete="false" name="new_password" id="new_password" class="form-control" placeholder="Enter new Password..." required>
						<div class="new_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false"id="renew_password" class="form-control" placeholder="Confirm New Password..." required>
						<div class="renew_password-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<button type="submit" id="new_password_btn"value="new_password_btn"  class="btn btn-outline-new btn-block form-btn">New password</button>
					</div><!-- form-group -->
				</form><!-- form -->
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->
<?php include './sections/footer.section.php'; ?>