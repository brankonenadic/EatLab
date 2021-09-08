<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8">
        <div class="card card-forms">
			<div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">Add table</h5></div>
          </div><!-- card-header -->
          <div class="card-body card-bg-new">
            <form action="" id="add_table_form" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input autocomplete="false" type="text" name="table_name" class="form-control" placeholder="Add table" id="table_name" required >
                  <!--Msg for dish name input-->
                <span class="msg tableNameMsg error text-danger"></span>
              </div>
              <div class="form-group">
                <input autocomplete="false" type="password" name="table_password" class="form-control" placeholder="Password" id="table_password" required >
                  <!--Msg for dish name input-->
                <span class="msg tablePasswordMsg error text-danger"></span>
              </div>
              <div class="form-group ">
                <button class="btn btn-outline-new btn-block form-btn" type="submit" value="add_table_btn" id="add_table_btn" name="add_table_btn">Add table</button>
              </div>
            </form><!-- form -->
          </div><!-- card-body -->
        
        </div><!-- card -->
  </div><!-- col end -->
</div> <!-- row end -->      

<!-- content end -->
<?php include './sections/footer.section.php'; ?>