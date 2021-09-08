<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>

<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-4 col-md-6 col-sm-8">
        <div class="card card-forms">
			<div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">Insert New Dish</h5></div>
                </div><!-- card-header -->
                <div class="card-body card-bg-new">
                    <form action="" id="insert_form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input autocomplete="false" type="text" name="dishname" class="form-control" placeholder="Dish name" id="dishname" required >
                                <!--Msg for dish name input-->
                            <span class="msg DishnameMsg invalid"></span>
                        </div>
                        <div class="form-group">
                            <input autocomplete="false" type="file" name="img" class="form-control" placeholder="img" id="img" required >
                                <!--Msg for img input-->
                            <span class="msg ImgMsg invalid"></span>
                        </div>
                        <div class="form-group">
                            <input autocomplete="false" type="text" maxlength="100" name="discription" class="form-control" placeholder="discription" id="discription" required >
                                <!--Msg for discription input-->
                            <span class="msg DiscriptionMsg invalid"></span>
                        </div>
                        <div class="form-group">
                            <input autocomplete="false" type="number" step="any" name="price" class="form-control" placeholder="Price" id="price" required >
                                <!--Msg for price input-->
                            <span class="msg PriceMsg invalid"></span>
                        </div>
                        <div class="form-group">
                            <select class="form-control" autocomplete="false" id="type" name="type" required >
                            <option value="">Type</option>
                            <option value="hot_drink">Hot Drink</option>
                            <option value="no_alcoholic_drink">NO Alcoholic Drink</option>
                            <option value="alcoholic_drink">Alcoholic Drink</option>
                            <option value="main_dish">Main Dish</option>
                            <option value="side_dish">Side Dish</option>
                            <option value="soup">Soup</option>
                            <option value="salad">Salad</option>
                            <option value="dessert">Dessert</option>
                            <option value="extras">Extras</option>
                            </select>
                                <!--Msg for type input-->
                            <span class="msg TypeMsg invalid"></span>
                        </div>    
                        <div class="form-group ">
                        <button class="btn btn-outline-new btn-block form-btn" type="submit" id="x" name="insert_dish">Insert</button>
                    </div>
                </form><!-- form -->
	        </div><!-- card-body -->
	    </div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->


<?php include './sections/footer.section.php'; ?>