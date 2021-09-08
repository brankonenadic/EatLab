<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>
<?php include './classes/User.class.php';?>
<!-- content start -->
<div class="row d-flex justify-content-around align-self-center top-margin">
    <div class="col col-lg-11 col-md-11 bottom-margin">
    
        <ul class="list-group text-center">
            <li class="list-group-item active">
              <div class="md-v-line text-center"><h5>Restorans</h5></div>
            </li>

    <?php 
$info = new User();
$list = $info->business_info();
if ($list->num_rows > 0) {

  while($row = $list->fetch_assoc()) {


    echo'<li class="list-group-item d-flex justify-content-between align-items-center "> ';
    echo '<div class="form-group col text-center">
  <form class="select_business_form" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="hidden_business_id" value="'.$row["user_id"].'" /> 
    <button type="submit" class="select_business_btn">'. $row["fullname"] .'</button>
    </form>';
     echo'</div>
     <div class="form-group col text-center">
     <p class="card-title">'.$row["address"].'</p>
     <p class="card-text">'.$row["phone"].'</p>
     <p class="card-text">'.$row["user_email"].'</p>
     </div>
  
   
    <div class="image-parent form-group col text-center">
      <img src="./img/user_img/'.$row["img_url"].'" style="width: 150px; height: 100px; alt="..."></div>';
        
       echo'</li>';


  }
}

?>




    </ul>
  </div>

</div>
<!--Grid row-->
  







<?php include './sections/footer.section.php'; ?>
