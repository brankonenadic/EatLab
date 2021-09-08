<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8">
        <div class="card card-forms border-0">
            <div class="card-header card-head-bg card-header-margin">
              <div class="label-heading"><h5 class="text-center text-white">Success</h5></div>
            </div><!-- card-header -->
            <div class="card-body border">
                <h6 class="text-center text-success">Verification mail is sent,check your mail. </h6>
                <p class="text-center text-success">Confirm your email address!</p>
                <p class="text-center text-danger">Verification token expire after one hour!</p>
            </div><!-- card-body -->
            <div class="card-footer card-footer-bg card-footer-margin">
                <div class="row justify-content-center justify-content-around">
                    <a class="text-white" href="https://mail.google.com" id="">Gmail</a>
                    <a class="text-white" href="https://outlook.live.com" id="">Outlook</a>
                    <a class="text-white" href="https://www.google.com" id="">Google</a>
                </div>
            </div>
        </div><!-- card -->
    </div><!-- col -->
</div><!-- content end -->

<?php include './sections/footer.section.php'; ?>