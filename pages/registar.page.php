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
			<div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">Create New Account</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new">
				<form action="" id="registar_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" autocomplete="false" name="fullname" id="fullname" class="form-control" placeholder="Enter Fullname..." required>
						<div class="fullname-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Email..." autocomplete="off" required>
						<div class="user_email-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false" name="password" id="password" class="form-control" placeholder="Choose Password..." required>
						<div class="password-error error text-danger"></div>
						<input class="text-new" type="checkbox" onclick="myFunction()">Show Password
					</div><!-- form-group -->
					<div class="form-group">
						<input type="password" autocomplete="false"id="re_password" class="form-control" placeholder="Confirm Password..." required>
						<div class="re_password-error error text-danger"></div>
						<input class="text-new" type="checkbox" onclick="myFunctionRe()">Show Password
					</div><!-- form-group -->
					<div class="form-group"> 
						<select class="form-control" autocomplete="false"  name="user_type" id="user_type" required>
							<option value="">Choose users type...</option>
							<option value="user">User</option>
							<option value="business">Business</option>
						</select>
						<div class="user_type-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
						<button type="submit" id="registar" value="registar" class="btn btn-outline-new btn-block form-btn">Create Account</button>
					</div><!-- form-group -->
					<div class="form-group ">
						<a class="text-new" href="./login" id="login">Already have an account?</a>
						<a class="text-new" href="./forgot_password" id="login">Forgot password?</a>
					</div>
				</form><!-- form -->
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunctionRe() {
  var x = document.getElementById("re_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php include './sections/footer.section.php'; ?>