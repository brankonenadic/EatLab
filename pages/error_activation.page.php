<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>


<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8">
        <div class="card card-forms">
			<div class="card-header card-head-bg mt-5">
                <div class="label-heading"><h5 class="text-center text-white">Error</h5></div>
            </div><!-- card-header -->
            <div class="card-body border">
                <h6 class="text-center text-danger">Validation token is expire!</h6>
                <p class="text-center text-danger">Please request a new validation token! </p>
            </div><!-- card-body -->
            <div class="card-footer card-footer-bg card-footer-margin">
                <div class="row justify-content-center justify-content-around">
                <a class="text-white" href="" id="">Send new validation token</a>
            </div>
            </div>
        </div><!-- card -->
    </div><!-- col -->
</div><!-- content end -->

<?php include './sections/footer.section.php'; ?>