<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php
include 'autoloader.inc.php';


if($_SESSION['type'] == 'business'){

    if(isset($_POST['insert_bio'])){
       

        $user_id = $_SESSION['user_session']; 
        $id_number = $_POST['id_number'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $country = $_POST['country'];
        $datetime = date('Y-m-d H:i:s');

        $insert = new User();
        $user_bio = $insert->business_bio($user_id, $id_number, $phone, $address, $city, $zip_code, $country, $datetime);
        if($insert == true){
            $error = '*Profile is updated';
            echo $error; 
        }else{
            $error = '*Profile update error';
            echo $error; 
        }   
      

    }else{

    $error = '*Insert bio error';
    echo $error; 
    }


}else{ 
 if(isset($_POST['insert_bio'])){
    
    
            $user_id = $_SESSION['user_session']; 
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zip_code = $_POST['zip_code'];
            $country = $_POST['country'];
            $datetime = date('Y-m-d H:i:s');

            $insert = new User();
            $user_bio = $insert->user_bio($user_id, $phone, $address, $city, $zip_code, $country, $datetime);
            if($insert == true){
                $error = '*Profile is updated';
                echo $error; 
            }else{
                $error = '*Profile update error';
                echo $error; 
            }   
    
    }else{
    
        $error = '*Insert bio error';
        echo $error; 
    } 

} 