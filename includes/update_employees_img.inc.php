<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';


if (isset ($_FILES['employees_img'])){

    $employees_img = $_FILES['employees_img'];

    $temp_dir = $_FILES['employees_img']['tmp_name'];

    $img_name = $_FILES['employees_img']["name"];

    $temp = explode(".",$_FILES["employees_img"]["name"]);

    $new_name = time().rand(). '.' .end($temp); 

    $img_size = $_FILES['employees_img']['size'];
    
    $target_dir = "../img/user_img/";
    
    $target_file = $target_dir . $new_name;

    $mimetype = mime_content_type($temp_dir);

    if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png')) == false) {

        echo "Wrong type";

    }else if ($img_size <= 0){

      echo "Wrong size";

    }else if($img_size > 1000000){

      echo "File is too big";

    } else {
     
       move_uploaded_file($temp_dir,$target_file);
    
      $datetime = date('Y-m-d H:i:s');

      $insert = new User(); 
      
      $img_id = $insert->upload_img($new_name, $datetime);

      $user_id = $_SESSION['employees_id'];

      $update = $insert->update_profile_img($user_id, $img_id);

      if($update == true){
        $error = '*Profile img is updated';
        echo $error; 
    }else{
        $error = '*Profile img update error';
        echo $error; 
    }  

    }
    
    }else{
        $error = '*Profile img upload error';
        echo $error;
    }