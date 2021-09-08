<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>
<?php include './classes/User.class.php';?>



  
<!-- content start -->
<div class="ul-div row justify-content-around align-self-center top-margin">
   
           
            
            
            <!--Grid column-->
            <div class="ul-row col-md-3 mb-4">
            
            <ul class="list-group">
                        <li class="list-group-item active">
                        <div class="md-v-line text-center"><h5>Menu</h5></div> 
                        </li>
                       
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
                        </li>

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
            $business_id = $_SESSION['user_session'];
          
            $info = new User();
            $result = $info->active_dish($type, $business_id);
            
            if ($result->num_rows > 0) {
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                  
            echo'<li class="list-group-item justify-content-between align-items-center"> ';
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
         
            <input type="hidden" name="hidden_name" value="'.$row["name"].'" />  
            <input type="hidden" name="hidden_price" value="'.$row["price"].'" /> 
            <input type="hidden" name="hidden_id" value="'.$row["id"].'" /> ';
            if($row['status'] == '1'){
                echo'<form class="aktive_dish_form" method="POST"><input type="hidden" name="active_dish_id"
                id="active_dish_id" value="'.$row["id"].'">
                <input type="hidden" name="active_dish_status" id="active_dish_status" value="0">
                <button type="submit" class="btn btn-outline-success btn-radius" 
                name="active_dish_btn" id="active_dish_btn" value="active_dish_btn">Active</button></form>';
            }else{
                echo'<form class="aktive_dish_form" method="POST"><input type="hidden" name="active_dish_id" id="active_dish_id" value="'.$row["id"].'">
                <input type="hidden" name="active_dish_status" id="active_dish_status" value="1">
                <button type="submit" class="btn btn-outline-danger btn-radius"  name="active_dish_btn"
                id="active_dish_btn" value="active_dish_btn">Inactive</button></form>'; 
            }
            echo'
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