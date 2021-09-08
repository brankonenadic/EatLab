<?php include './sections/header.section.php'; ?>

<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>


<nav class="navbar navbar-bg-new navbar-dark navbar-expand-md fixed-top">
  <a class="navbar-brand" href="./index">
    <img src="img/logo/logo2.png" width="30" height="30" class="d-inline-block align-top" alt="logo">EatLab</a>
</nav>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8">
        <div class="card card-forms">
			<div class="card-header card-head-bg mt-5">
                <div class="label-heading"><h5 class="text-center text-white">Forgot password</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new mb-5">
				<form action="" id="forgot_password_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="email" name="forgot_password_email" id="forgot_password_email" class="form-control" placeholder="Enter Email..." autocomplete="off" required>
						<div class="forgot_password_email-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<button type="submit" id="forgot_password"value="forgot_password"  class="btn btn-outline-new btn-block form-btn">Create new password</button>
					</div><!-- form-group -->
					<div class="form-group ">
						<a class="text-new" href="./login" id="login">Already have an account?</a>
						<a class="text-new" href="./registar" id="login">Create new accaount?</a>
					</div>
				</form><!-- form -->
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->
<?php include './sections/footer.section.php'; ?>