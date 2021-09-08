<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';
if (isset ($_POST)){
  if (isset ($_FILES['img'])){
    $img = $_FILES['img'];
    $temp_dir = $_FILES['img']['tmp_name'];
    $img_name = $_FILES['img']["name"];
    $temp = explode(".",$_FILES["img"]["name"]);
    $new_name = time().rand(). '.' .end($temp); 
    $img_size = $_FILES['img']['size'];
    $target_dir = "../img/dish_img/";
    $target_file = $target_dir . $new_name;
    $mimetype = mime_content_type($temp_dir);
    if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png')) == false) {
      $error = '*Wrong type';
      echo $error;
    } else if ($img_size <= 0){
      $error = '*Wrong size';
      echo $error;
    } else if($img_size > 1000000){
      $error = '*File is too big';
      echo $error;
    } else {
      move_uploaded_file($temp_dir,$target_file);
      $datetime = date('Y-m-d H:i:s');
      $upload_img = new User(); 
      $img_id = $upload_img->upload_img($new_name, $datetime);
      $business_id = $_SESSION['user_session'];
      $name = $_POST['dishname'];
      $discription = $_POST['discription'];
      $price = $_POST['price'];
      $type = $_POST['type'];
      $insert_dish = new User();
      $insert_dish->insert_dish($business_id,$name,$img_id,$discription,$price,$type,$datetime);
      if ($insert_dish == true) {
        $error = '*Insert dish sucess';
        echo $error;
      } else {
        $error = '*Insert dish error';
        echo $error;
      } 
    }
  } else {
    $error = '*Seet img error';
    echo $error;
  }
} else {
  $error = '*Seet form error';
  echo $error;
}



