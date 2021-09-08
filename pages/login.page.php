<?php include './sections/header.section.php'; ?>

<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>


<nav class="navbar navbar-bg-new navbar-dark navbar-expand-md fixed-top">
  <a class="navbar-brand" href="./index">
    <img src="img/logo/logo2.png" width="30" height="30" class="d-inline-block align-top" alt="logo">EatLab</a>
</nav>
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8 mb-4">
        <div class="card card-forms">
			<div class="card-header card-head-bg mt-4">
                <div class="label-heading"><h5 class="text-center text-white">Login</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new">
				<form action="" id="login_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="email" name="log_email" id="log_email" class="form-control" placeholder="Enter Email..." autocomplete="off" required>
						<div class="log_email-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false" name="log_password" id="log_password" class="form-control" placeholder="Choose Password..." required>
						<div class="log_password-error error text-danger"></div>
						<input class="text-new" type="checkbox" onclick="myFunction()">Show Password
					</div><!-- form-group -->
					<div class="form-group">
						<button type="submit" id="login"value="login"  class="btn btn-outline-new btn-block form-btn">Login</button>
					</div><!-- form-group -->
					<div class="form-group ">
						<a class="text-new" href="./registar" id="login">Create new accaount?</a>
						<a class="text-new" href="./forgot_password" id="login">Forgot password?</a>
					</div>
				</form><!-- form -->
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->


<script>
function myFunction() {
  var x = document.getElementById("log_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php include './sections/footer.section.php'; ?>