<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>
<?php include './classes/User.class.php';?>


<!-- content start -->
        <div class="card card-forms">
              <div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">Restorans</h5></div>
              </div><!-- card-header -->
			        <div class="card-body d-flex justify-content-around align-items-center">
            

    <?php 

if (!isset($_SESSION['business_session'])){

$info = new User();
$list = $info->business_info();
if ($list->num_rows > 0) {

  while($row = $list->fetch_assoc()) {


    echo '<div class="flex-sm-column">
      <form class="select_restoran_form" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="hidden_business_id" value="'.$row["user_id"].'" /> 
      <button type="submit" class="select_business_btn">'. $row["fullname"] .'</button>
      </form>';
     echo'</div>';
    

  }
}
} else {
     $restorans_id =  $_SESSION['business_session'];
     $info = new User();
     $restoran = $info->user_info($restorans_id);
     if ($restoran->num_rows > 0) {
while($row = $restoran->fetch_assoc()) {
      echo ' 
      <div class="text-center">
      <h5 class="text-center mt-5">You are at <strong>'. $row["fullname"] .'</strong> ,enjoy!</h5>
      <a href="./includes/check_out.inc.php" class="nav-link">
     <button type="button" class="btn btn-outline-new text-center mt-5" name="check_out" id="check_out" value="check_out">Check out</button></a>
      </div>
      ';
}
     }
}
?>
      </div><!-- card body end -->
</div><!-- card rnd -->
<!-- content end -->
  
<!-- content start -->
<div class="ul-div row d-flex justify-content-around align-self-center top-margin">
   
            <!--Grid column-->
            <div class="ul-row col-md-3 mb-4">
            
                  <ul class="list-group">
                        <li class="list-group-item active">
                        <div class="md-v-line text-center"><h5>Tables</h5></div>
                                          </li>
                              <?php 
                              if (isset($_SESSION['business_session'])){
                                    if (!isset($_SESSION['table'])){    
                              $business_id = $_SESSION['business_session'];
                              $info = new User();
                              $table = $info->table_list($business_id);
                              if ($table->num_rows > 0) {
                              

                              while($row = $table->fetch_assoc()) {

                              echo'<li class="list-group-item">';
                              echo '<form class="select_table_form" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="hidden_table_id" value="'.$row["id"].'" />
                              <button type="submit" id="" class="select_business_btn select_table_btn">'. $row["table_name"] .'</button>
                              </form>';
                              echo'</li>';

                              }
                              }
                        } else {
                              $table_id =  $_SESSION['table'];
                              $info = new User();
                              $table_name = $info->table_name($table_id);
                              echo ' 
                              <div class="text-center">
                              <h5 class="text-center mt-5">You are at <strong>'. $table_name.'</strong> ,enjoy!</h5>
                              </div>
                              ';
                        
                        }
                        }else{
                              echo ' 
                              <li class="list-group-item bottom-margin">
                                    <div class="md-v-line ">
                                    <h5>You must first select restoran!</h5>
                                    </div>
                              </li>
                              ';
                        }
                              ?>
                  </ul>
            
            </div>
            <!--Grid column-->
            
            
            <!--Grid column-->
            <div class="ul-row col-md-3 mb-4">
            
            <ul class="list-group">
                        <li class="list-group-item active">
                        <div class="md-v-line text-center"><h5>Menu</h5></div> 
                        </li>
                        <?php
                        if (isset($_SESSION['table'])){
                              echo '
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="hot_drink">
                              <a class="nav-link" href="#section-dish">
                              <button class="select_business_btn" type="submit" name="menu_btn" value="hot_drink">Hot Drink</button></a>
                              </form>
                        </li>
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="no_alcoholic_drink">
                              <button class="select_business_btn" type="submit" name="menu_btn" value="no_alcoholic_drink">No Alcoholic Drink</button>
                              </form>
                        </li>
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="alcoholic_drink">
                              <button class="select_business_btn" type="submit" data-toggle="collapse" value="alcoholic_drink" name="menu_btn">Alcoholic Drink</button>
                              </form>
                        </li> 
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="main_dish">
                              <button class="select_business_btn" type="submit" name="menu_btn"  value="main_dish">Main Dish</button>
                              </form>
                        </li>
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="side_dish">
                              <button class="select_business_btn" type="submit" name="menu_btn" value="side_dish">Side Dish</button>
                              </form>
                        </li>
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="soup">
                              <button class="select_business_btn" type="submit" name="menu_btn" value="soup">Soup</button>
                              </form>
                        </li>
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="salad">
                              <button class="select_business_btn" type="submit" name="menu_btn" value="salad">Salad</button>
                              </form>
                        </li>
                        <li class="list-group-item">
                              <div class="md-v-line"></div>
                              <form class="select_menu_category_form" method="POST">
                              <input type="hidden" name="menu_category" value="dessert">
                              <button class="select_business_btn" type="submit" name="menu_btn"  value="dessert" aria-expanded="false">Dessert</button>
                              </form>
                        </li>
                        <li class="list-group-item">
                        <form class="select_menu_category_form" method="POST">
                              <div class="md-v-line"></div>
                              <input type="hidden" name="menu_category" value="extras">
                              <button class="select_business_btn" type="submit" name="menu_btn" value="extras">Eextras</button>
                              </form>
                        </li>';

                  }else{
                        echo ' 
                        <li class="list-group-item">
                              <div class="md-v-line">
                              <h5>You must first select table!</h5>
                              </div>
                        </li>
                        ';
                  }
                        ?>
                        </ul>
                       
            
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="ul-row col-md-6 mb-4" id="section-dish">
            
            <ul class="list-group">
                  <li class="list-group-item active ">
                        <div class="md-v-line text-center"><h5>Dish</h5></div>
                  </li>
                  <?php
            if (isset($_SESSION['menu_category'])){
            $type= $_SESSION['menu_category'];
            $business_id = $_SESSION['business_session'];
          
            $info = new User();
            $result = $info->menu_view($type, $business_id);
            
            if ($result->num_rows > 0) {
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                  
            echo'<li class="list-group-item d-flex justify-content-between align-items-center"> ';
            echo '
            <div class="image-parent col text-center">
            <img src="./img/dish_img/'. $row["img_url"] .'" style="width: 100px; height: 100px; alt="...">
            </div>
           
            <div class="col text-center">
            <h5 class="card-title">'.$row["name"].'</h5>
            <p class="card-text"><small>'.$row["discription"].'.</small></p>
            </div>
            <div class="col text-center">
            <p class="text-danger">'.$row["price"].' km</p>
            <form class="select_dish_form" action="" id="select_dish_form" method="POST" enctype="multipart/form-data">
            <p class="text-success">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control form-control-sm" value="1"> </p>
            <input type="hidden" name="hidden_name" value="'.$row["name"].'" />  
            <input type="hidden" name="hidden_price" value="'.$row["price"].'" /> 
            <input type="hidden" name="hidden_id" value="'.$row["id"].'" /> 
            <button class="btn btn-outline-success btn-radius" type="submit" name="order" id="order" value="order">Order</button>
            </form>
            </div>
         
            ';
            echo'</li>';
            }
            } else {
            echo '    
            <div class="card">
            <div class="card-body">
                  <h5 class="card-title">No selected item on menu</h5>
            </div>
            </div>
            <br>';
            }
            }else{
                  echo ' 
                  <li class="list-group-item">
                        <div class="md-v-line">
                        <h5>You must first select menu category!</h5>
                        </div>
                  </li>
                  ';
            }

            ?>
    
        </ul>
      </div>
    <!--Grid row-->
</div>

<?php include './sections/footer.section.php'; ?>