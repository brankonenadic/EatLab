<?php

class User extends Connection {

  private $conn;
  private $parentInstance;

  public function Connect(){ 
    $this->parentInstance = parent::instance();
    $this->conn = $this->parentInstance->connect();
  }

  public function __construct(){
    $this->Connect();
  }
  public function upload_img($img_name,$datetime){
    $this->Connect();   
    htmlspecialchars($img_name,ENT_QUOTES,'UTF-8');
    htmlspecialchars($datetime,ENT_QUOTES,'UTF-8');
    $upload = $this->conn->query("INSERT INTO img (img_url, datetime, status) VALUES('$img_name','$datetime','1')");
    $last_id = $this->conn->insert_id;

   if ($upload == true) {

      return $last_id;

    }else {

      echo "Error updating record: " . mysqli_error($this->conn);

      return false;
    } 
  }

 public function insert_dish($business_id,$name,$img_id,$discription,$price,$type,$datetime){
  $this->Connect();

        $insert = $this->conn->query("CALL insert_dish ($business_id,'$name', '$img_id', '$discription', '$price', '$type', '$datetime','1')");
        
        if ($insert == true) {
          return true;
        }else {
          echo "Error insert record: " . mysqli_error($this->conn);
          return false;
        }
 }

 public function menu_view($type, $busines_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM menu_view WHERE business_id='$busines_id'AND status='1' AND type='$type'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display menu: " . mysqli_error($this->conn);
    return false;
  }
}
public function active_dish($type, $busines_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM menu_view WHERE business_id='$busines_id' AND type='$type'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display active dish: " . mysqli_error($this->conn);
    return false;
  }
}
public function update_dish_status($dish_id, $active) {

  $this->Connect();
 
  if($update = $this->conn->query("UPDATE dish SET status='$active' WHERE id='$dish_id'") == true) {
    return true;
} else {
  echo "Error update dish status: " . mysqli_error($this->conn);
    return false;
}

}
public function check_email($user_email){
  $this->Connect();
  $prew = "SELECT * FROM users WHERE user_email = '$user_email' AND status='1'";
  $check = $this->conn->query($prew);
  $numRows = $check->num_rows;

  if ($numRows > 0) {
    return true;
  } else {
    return false;
  }
}
public function user_id($email, $password)
{
    $this->Connect();

  $sql = $this->conn->query("SELECT id FROM users WHERE user_email = '$email' AND user_password = '$password'");
    $row =$sql->fetch_assoc();
    $id = $row['id'];

    return $id;
}
public function forgot_pw_user_id($email)
{
    $this->Connect();

  $sql = $this->conn->query("SELECT id FROM users WHERE user_email = '$email' AND status = '1'");
    $row =$sql->fetch_assoc();
    $id = $row['id'];

    return $id;
}
public function business_id($user_id){
    $this->Connect();
    $sql = $this->conn->query("SELECT business_id FROM employees WHERE user_id = '$user_id'");
    $row =$sql->fetch_assoc();
    $business_id = $row['business_id'];
    return $business_id;
}

public function registar_user($fullname,$user_email,$user_password,$user_type,$token,$datetime){
  $this->Connect();
  htmlspecialchars($fullname,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_email,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_password,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_type,ENT_QUOTES,'UTF-8');
  htmlspecialchars($token,ENT_QUOTES,'UTF-8');
  htmlspecialchars($datetime,ENT_QUOTES,'UTF-8');
  $registar = $this->conn->query("INSERT INTO users (fullname, user_email, user_password, user_type, token, datetime, status) VALUES ('$fullname','$user_email','$user_password','$user_type', '$token', '$datetime','0')");

    if ($registar == true) {
          return true;
        }else {
          echo "Error registration: " . mysqli_error($this->conn);
          return false;
        }
}
public function registar_employees($fullname,$user_email,$user_password,$user_type,$token,$datetime, $user_id){
  $this->Connect();
  htmlspecialchars($fullname,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_email,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_password,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_type,ENT_QUOTES,'UTF-8');
  htmlspecialchars($token,ENT_QUOTES,'UTF-8');
  htmlspecialchars($datetime,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');
  $registar = $this->conn->query("INSERT INTO users (fullname, user_email, user_password, user_type, token, datetime, status) VALUES ('$fullname','$user_email','$user_password','$user_type', '$token', '$datetime','0')");
  $last_id = $this->conn->insert_id;

    if ($registar == true) {
      $insert = $this->conn->query("INSERT INTO employees (user_id, business_id,datetime, status) VALUES('$last_id','$user_id','$datetime','1')");
      if ($insert == true) {
        $insert2 = $this->conn->query("INSERT INTO user_profile (user_id,datetime, status) VALUES('$last_id','$datetime','1')");
        if ($insert2 == true) {

          return true;
              
            }else {
  
            echo "Error employees registration2: " . mysqli_error($this->conn);
              return false;
            } 
          }else {

          echo "Error employees registration1: " . mysqli_error($this->conn);
            return false;
          }
          
        }else {
          echo "Error employees registration: " . mysqli_error($this->conn);
          return false;
        }
}
public function registar_admin($fullname,$user_email,$user_password,$user_type,$token,$datetime){
  $this->Connect();
  htmlspecialchars($fullname,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_email,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_password,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_type,ENT_QUOTES,'UTF-8');
  htmlspecialchars($token,ENT_QUOTES,'UTF-8');
  htmlspecialchars($datetime,ENT_QUOTES,'UTF-8');
  $registar = $this->conn->query("INSERT INTO users (fullname, user_email, user_password, user_type, token, datetime, status) VALUES ('$fullname','$user_email','$user_password','$user_type', '$token', '$datetime','0')");

    if ($registar == true) {
          return true;
        }else {
          echo "Error registration admin: " . mysqli_error($this->conn);
          return false;
        }
}


public function check_password($user_email, $user_password) {
  $this->Connect();
  
  $prew = $this->conn->query("SELECT * FROM users WHERE user_email='$user_email' AND status='1'");
  $count_row = $prew->num_rows;
  $row = $prew->fetch_assoc();

  if ($count_row == 1) {
    if (password_verify($user_password, $row['user_password'])){
      return true;
    } else {
      echo "Error: " . mysqli_error($this->conn);
      return false;
    }
  } else {
    echo "Error: " . mysqli_error($this->conn);
    return false;
  }
}
public function activate($id, $token) {
  $this->Connect();
  $prew = ("SELECT * FROM users WHERE id='$id' AND token = '$token'");
  $activate = $this->conn->query($prew);
  $numRows = $activate->num_rows;
  $row = $activate->fetch_assoc();

  $timeSet = strtotime($row['datetime']);
  $timeNow = strtotime(date('Y-m-d H:i:s'));

$sql = $timeNow - $timeSet;
  $hours =$sql / ( 60 * 60 );

  if ($numRows > 0) {
    if ($hours < 1) {
      
      if($update = $this->conn->query("UPDATE users SET status='1' WHERE id='$id'") == true) {
        return true;
      } else {
        echo "Error: " . mysqli_error($this->conn);
        return false;
      }
    } else {
      header('location: ../error_activation');
      return false;
    }
  } else {
    header('location: ../error_activation');
    return false;
  }
}
public function login($email, $password){
  $this->Connect();
  
  $sql = $this->conn->query("SELECT * FROM users WHERE user_email='$email' AND status='1'");
  $count_row = $sql->num_rows;
  $row = $sql->fetch_assoc();

  if ($count_row == 1) {

      if (password_verify($password, $row['user_password'])){

            session_start();

              $_SESSION['login'] = true;

              $_SESSION['user_session'] =  $row['id'];

              $_SESSION['user_name'] =  $row['fullname'];

              $_SESSION['type'] =  $row['user_type'];
            
              echo 'Logged in';
              return true;
          
      }else{
          return false;
          echo "Email or password is incorect";
          
      }  
       
}else{
  return false;
  echo "Loging is faled";
 
}
}
public function forgot_password($id , $token , $datetime) {
  $this->Connect();
  $forgot = $this->conn->query("UPDATE users SET token='$token', datetime='$datetime' WHERE id='$id'");

  if ($forgot == true) {
    return true;
  }else {
    echo "Error update: " . mysqli_error($this->conn);
    return false;
  }
}
public function forgot_password_check($id, $token) {
  $this->Connect();
  $sql = ("SELECT * FROM users WHERE id='$id' AND token = '$token'");
  $result = $this->conn->query($sql);
  $numRows = $result->num_rows;
  $row = $result->fetch_assoc();

  $datetimeSet = strtotime($row['datetime']);
  $datetimeNow = strtotime(date('Y-m-d H:i:s'));

  $diff = $datetimeNow - $datetimeSet;
  $hours = $diff / ( 60 * 60 );

  if ($numRows > 0) {
    if ($hours < 1) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

public function new_password($password, $id) {

  $this->Connect();

  $new_password = password_hash($password, PASSWORD_DEFAULT);

  if($update = $this->conn->query("UPDATE users SET user_password='$new_password' WHERE id='$id'") == true) {
      return true;
  } else {
    echo "Error update password: " . mysqli_error($this->conn);
      return false;
  }

}
public function user_bio($user_id, $phone, $address, $city, $zip_code, $country, $datetime){
  $this->Connect();
  htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($phone,ENT_QUOTES,'UTF-8');
  htmlspecialchars($address,ENT_QUOTES,'UTF-8');
  htmlspecialchars($city,ENT_QUOTES,'UTF-8');
  htmlspecialchars($zip_code,ENT_QUOTES,'UTF-8');
  htmlspecialchars($country,ENT_QUOTES,'UTF-8');
  htmlspecialchars($datetime,ENT_QUOTES,'UTF-8');
  $user_bio = $this->conn->query("INSERT INTO user_profile (user_id, phone, address, city, zip_code, country, datetime, status) VALUES ('$user_id','$phone','$address', '$city','$zip_code', '$country', '$datetime','1')");

  if ($user_bio == true) {
        return true;
      }else {
        echo "Error insert user bio: " . mysqli_error($this->conn);
        return false;
      }
}
public function business_bio($user_id, $id_number, $phone, $address, $city, $zip_code, $country, $datetime){
  $this->Connect();
  htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($id_number,ENT_QUOTES,'UTF-8');
  htmlspecialchars($phone,ENT_QUOTES,'UTF-8');
  htmlspecialchars($address,ENT_QUOTES,'UTF-8');
  htmlspecialchars($city,ENT_QUOTES,'UTF-8');
  htmlspecialchars($zip_code,ENT_QUOTES,'UTF-8');
  htmlspecialchars($country,ENT_QUOTES,'UTF-8');
  htmlspecialchars($datetime,ENT_QUOTES,'UTF-8');
  $user_bio = $this->conn->query("INSERT INTO user_profile (user_id, id_number, phone, address, city, zip_code, country, datetime, status) VALUES ('$user_id','$id_number','$phone','$address', '$city','$zip_code', '$country', '$datetime','1')");

  if ($user_bio == true) {
        return true;
      }else {
        echo "Error insert user bio: " . mysqli_error($this->conn);
        return false;
      }
}
public function update_profile_img($user_id, $img_id) {

  $this->Connect();
  
  if($update = $this->conn->query("UPDATE user_profile SET img_id='$img_id' WHERE user_id='$user_id'") == true) {
    return true;
} else {
  echo "Error update user profile img: " . mysqli_error($this->conn);
    return false;
}

}
public function user_info($user_id) {

  $this->Connect();
  $info = $this->conn->query("SELECT * FROM user_info WHERE user_id='$user_id'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display user info: " . mysqli_error($this->conn);
    return false;
  }
}
public function business_info() {

  $this->Connect();
  $info = $this->conn->query("SELECT * FROM user_info WHERE user_type='business' AND status='1'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display user info: " . mysqli_error($this->conn);
    return false;
  }


}


public function profile_img($user_id){
  $this->Connect();

$sql = $this->conn->query("SELECT * FROM profile_img WHERE user_id = '$user_id'");
  $row =$sql->fetch_assoc();
  $img = $row['img_url'];
if($img > 0){
  return $img;
}else{
  return false;
}
  
}
public function update_phone($user_id, $phone) {

  $this->Connect();
  htmlspecialchars($phone,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE user_profile SET phone='$phone' WHERE user_id='$user_id'") == true) {
    return true;
} else {
  echo "Error update phone: " . mysqli_error($this->conn);
    return false;
}

}

public function user_password($user_id, $user_password) {
  $this->Connect();
  htmlspecialchars($user_password,ENT_QUOTES,'UTF-8');
  $prew = $this->conn->query("SELECT * FROM users WHERE id='$user_id' AND status='1'");
  $count_row = $prew->num_rows;
  $row = $prew->fetch_assoc();

  if ($count_row == 1) {
    if (password_verify($user_password, $row['user_password'])){
      return true;
    } else {
      return false;
      echo "Error: invalid password ";
      
    }
  } else {
    return false;
    echo "Error: " . mysqli_error($this->conn);
    
  }
}

public function update_address($user_id, $address) {

  $this->Connect();
  htmlspecialchars($address,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE user_profile SET address='$address' WHERE user_id='$user_id'") == true) {
    return true;
} else {
  echo "Error update address: " . mysqli_error($this->conn);
    return false;
}

}
public function update_city($user_id, $city) {

  $this->Connect();
  htmlspecialchars($city,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE user_profile SET city='$city' WHERE user_id='$user_id'") == true) {
    return true;
} else {
  echo "Error update city: " . mysqli_error($this->conn);
    return false;
}

}

public function update_zipcode($user_id, $zipcode) {

  $this->Connect();
  htmlspecialchars($zipcode,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE user_profile SET zip_code='$zipcode' WHERE user_id='$user_id'") == true) {
    return true;
} else {
  echo "Error update zipcode: " . mysqli_error($this->conn);
    return false;
}

}


public function update_country($user_id, $country) {

  $this->Connect();
  htmlspecialchars($country,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE user_profile SET country='$country' WHERE user_id='$user_id'") == true) {
    return true;
} else {
  echo "Error update country: " . mysqli_error($this->conn);
    return false;
}

}
public function update_fullname($user_id, $fullname) {

  $this->Connect();
  htmlspecialchars($fullname,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE users SET fullname='$fullname' WHERE id='$user_id'") == true) {
    return true;
} else {
  echo "Error update fullname: " . mysqli_error($this->conn);
    return false;
}

}
public function update_email($user_id, $email) {

  $this->Connect();
  htmlspecialchars($email,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE users SET user_email='$email' WHERE id='$user_id'") == true) {
    return true;
} else {
  echo "Error update email: " . mysqli_error($this->conn);
    return false;
}

}
public function update_password($user_id, $password) {

  $this->Connect();
  htmlspecialchars($password,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE users SET user_password='$password' WHERE id='$user_id'") == true) {
    return true;
} else {
  echo "Error update password: " . mysqli_error($this->conn);
    return false;
}

}

public function delete_profile($id, $email) {

  $this->Connect();
  $delete_user = $this->conn->query("UPDATE users SET status='0' WHERE id='$id' AND user_email='$email'");
  if($delete_user == true){
    $delete_profile = $this->conn->query("UPDATE user_profile SET status='0' WHERE user_id='$id'");
    if($delete_profile == true){
      session_start();
      session_unset();
      session_destroy();
      return true;
    }else{
      echo "Error delete profile: " . mysqli_error($this->conn);
      return false;
    }
  }else{
    echo "Error delete user: " . mysqli_error($this->conn);
    return false;
  }

}
public function delete_employees($employees_id) {

  $this->Connect();
  $delete_user = $this->conn->query("UPDATE users SET status='0' WHERE id='$employees_id'");
  if($delete_user == true){
    $delete_profile = $this->conn->query("UPDATE user_profile SET status='0' WHERE user_id='$employees_id'");
    if($delete_profile == true){
      $delete_employees = $this->conn->query("UPDATE employees SET status='0' WHERE user_id='$employees_id'");
        if($delete_employees == true){      
          unset($_SESSION['employees_id']);
      return true;
    }else{
      echo "Error delete profile: " . mysqli_error($this->conn);
      return false;
    }
    }else{
      echo "Error delete profile: " . mysqli_error($this->conn);
      return false;
    }
  }else{
    echo "Error delete user: " . mysqli_error($this->conn);
    return false;
  }

}

public function employees_list($business_id) {

  $this->Connect();
  $info = $this->conn->query("SELECT * FROM employees_info WHERE business_id='$business_id'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display employees list: " . mysqli_error($this->conn);
    return false;
  }


}
public function employees_active($business_id) {

  $this->Connect();
  $info = $this->conn->query("SELECT * FROM employees_info WHERE business_id='$business_id'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display employees list: " . mysqli_error($this->conn);
    return false;
  }

}

public function employees_active_status($user_id) {

  $this->Connect();
  $info = $this->conn->query("SELECT active FROM employees WHERE user_id='$user_id'");
  $row =$info->fetch_assoc();
  $employess_active = $row['active'];

  return $employess_active;

}


public function employees_profile($user_id, $business_id) {

  $this->Connect();
  $info = $this->conn->query("SELECT * FROM employees_info WHERE user_id='$user_id' AND business_id='$business_id'");
  if ($info == true) {
    return $info;
  }else { 
    echo "Error display employees profile: " . mysqli_error($this->conn);
    return false;
  }


}
public function employees_user($user_id) {

  $this->Connect();
  $info = $this->conn->query("SELECT * FROM employees_info WHERE user_id='$user_id'");
  if ($info == true) {
    return $info;
  }else { 
    echo "Error display employees profile: " . mysqli_error($this->conn);
    return false;
  }


}

public function update_active($employees_id, $active) {
  $this->Connect();
  htmlspecialchars($active,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE employees SET active='$active' WHERE user_id='$employees_id'") == true) {
    return true;
} else {
  echo "Error update active status: " . mysqli_error($this->conn);
    return false;
}

}

public function update_posision($user_id, $posision) {

  $this->Connect();
  htmlspecialchars($password,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE users SET user_type='$posision' WHERE id='$user_id'") == true) {
    return true;
} else {
  echo "Error update posision: " . mysqli_error($this->conn);
    return false;
}

}
public function update_contract_type($contract_type, $user_id, $business_id) {

  $this->Connect();
  htmlspecialchars($password,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE employees SET contract_type='$contract_type' WHERE user_id='$user_id' AND business_id='$business_id'") == true) {
    return true;
} else {
  echo "Error update contract type: " . mysqli_error($this->conn);
    return false;
}

}

public function update_contract_start($contract_start, $user_id, $business_id) {

  $this->Connect();
  htmlspecialchars($password,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE employees SET contract_start='$contract_start' WHERE user_id='$user_id' AND business_id='$business_id'") == true) {
    return true;
} else {
  echo "Error update contract start: " . mysqli_error($this->conn);
    return false;
}

}
public function update_contract_end($contract_end, $user_id, $business_id) {

  $this->Connect();
  htmlspecialchars($password,ENT_QUOTES,'UTF-8');
  if($update = $this->conn->query("UPDATE employees SET contract_end='$contract_end' WHERE user_id='$user_id' AND business_id='$business_id'") == true) {
    return true;
} else {
  echo "Error update contract end: " . mysqli_error($this->conn);
    return false;
}

}

public function order_number($user_id, $order_no, $business_id, $table_id) {

  $this->Connect();
  htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($order_no,ENT_QUOTES,'UTF-8');
  htmlspecialchars($business_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($table_id,ENT_QUOTES,'UTF-8');
  $sql = $this->conn->query("INSERT INTO order_number (order_no, user_id, business_id, table_id, status) VALUES ('$order_no', '$user_id', '$business_id', '$table_id', '1')");
  $last_id = $this->conn->insert_id;
  if ($sql == true) {
        return $last_id;
      }else {
        echo "Error insert order number: " . mysqli_error($this->conn);
        return false;
      }
}
public function insert_order($order_no_id, $table_id, $dish_id, $quantity) {

  $this->Connect();
  htmlspecialchars($order_no_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($table_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($dish_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($quantity,ENT_QUOTES,'UTF-8');
  $sql = $this->conn->query("INSERT INTO order_dish (order_no_id, table_id, dish_id, quantity, status) VALUES ('$order_no_id', '$table_id', '$dish_id', '$quantity' ,'1')");

  if ($sql == true) {
        return true;
      }else {
        echo "Error insert order: " . mysqli_error($this->conn);
        return false;
      }
}


public function order_view_user($user_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM order_number WHERE user_id='$user_id' AND status<>'0'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display order: " . mysqli_error($this->conn);
    return false;
  }
}
public function order_list_business($business_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM order_view WHERE business_id='$business_id' AND status<>'0'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display order: " . mysqli_error($this->conn);
    return false;
  }
}
public function order_info($order_no_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM order_info WHERE order_no_id='$order_no_id' AND status<>'0'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display order info: " . mysqli_error($this->conn);
    return false;
  }
}

public function order_status($user_id, $table_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT status FROM order_info WHERE user_id='$user_id' AND table_id='$table_id'");
  $row =$info->fetch_assoc();
  $status = $row['status'];
  return $status;
}

public function order_confirm_weiter($user_id, $order_no) {

  $this->Connect();
  
  if($update = $this->conn->query("UPDATE order_number SET status='2' , weiter_id='$user_id' WHERE id='$order_no'") == true) {
    return true;
} else {
  echo "Error update order comfirm: " . mysqli_error($this->conn);
    return false;
}

}

public function order_accept_chef($user_id, $order_no) {

  $this->Connect();
  if($update = $this->conn->query("UPDATE order_number SET status='3' , chef_id='$user_id' WHERE id='$order_no'") == true) {
    return true;
} else {
  echo "Error order accept: " . mysqli_error($this->conn);
    return false;
}

}
public function order_ready_chef($user_id, $order_no) {

  $this->Connect();
  if($update = $this->conn->query("UPDATE order_number SET status='4' , chef_id='$user_id' WHERE id='$order_no'") == true) {
    return true;
} else {
  echo "Error order ready: " . mysqli_error($this->conn);
    return false;
}

}
public function order_finish_weiter($user_id, $order_no) {

  $this->Connect();
  if($update = $this->conn->query("UPDATE order_number SET status='5' , weiter_id='$user_id' WHERE id='$order_no'") == true) {
    return true;
} else {
  echo "Error order finish: " . mysqli_error($this->conn);
    return false;
}

}
public function order_bill($order_no) {

  $this->Connect();
  if($update = $this->conn->query("UPDATE order_number SET status='0' WHERE id='$order_no'") == true) {
    return true;
} else {
  echo "Error order finish: " . mysqli_error($this->conn);
    return false;
}

}

public function order_number_id($user_id, $table_id) {
  $this->Connect();
 
  $info = $this->conn->query("SELECT * FROM order_view WHERE user_id='$user_id' AND table_id='$table_id' AND status='5'");
  
  if ($info == true) {
      
        return $info;
      
    }else {
      echo "Error display order id: " . mysqli_error($this->conn);
      return false;
    }
}

public function bill_check($order_no_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM order_info WHERE order_no_id='$order_no_id' AND status='5'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display order info: " . mysqli_error($this->conn);
    return false;
  }
}

public function add_table($table_name , $business_id) {
  $this->Connect();
  htmlspecialchars($table_name,ENT_QUOTES,'UTF-8');
  htmlspecialchars($business_id,ENT_QUOTES,'UTF-8');
  $sql = $this->conn->query("INSERT INTO add_table (table_name, business_id, status) VALUES ('$table_name','$business_id', '1')");

  if ($sql == true) {
        return true;
      }else {
        echo "Error add table: " . mysqli_error($this->conn);
        return false;
      }
}
public function table_list($business_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM add_table WHERE business_id='$business_id'AND status='1'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display table: " . mysqli_error($this->conn);
    return false;
  }
}
public function table_name($table_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM add_table WHERE id='$table_id' AND status='1'");
  $row =$info->fetch_assoc();
    $table_name = $row['table_name'];
    return $table_name;

}
public function bill_number($user_id, $bill_no, $business_id, $table_id, $total_price, $payment_method) {

  $this->Connect();
  htmlspecialchars($bill_no,ENT_QUOTES,'UTF-8');
  htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($business_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($table_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($total_price,ENT_QUOTES,'UTF-8');
  htmlspecialchars($payment_method,ENT_QUOTES,'UTF-8');
  $sql = $this->conn->query("INSERT INTO bill_number (bill_no, user_id, business_id, table_id, total_price, payment_method, status) VALUES ('$bill_no', '$user_id' , '$business_id' , '$table_id' , '$total_price' , '$payment_method' , '1')");
  $last_id = $this->conn->insert_id;
  if ($sql == true) {
        return $last_id;
      }else {
        echo "Error insert bill number: " . mysqli_error($this->conn);
        return false;
      }
}

public function insert_bill_content($bill_no_id, $order_no_id) {

  $this->Connect();
  htmlspecialchars($bill_no_id,ENT_QUOTES,'UTF-8');
  htmlspecialchars($order_no_id,ENT_QUOTES,'UTF-8');
  $sql = $this->conn->query("INSERT INTO bill_content (bill_number_id, order_no_id, status) VALUES ('$bill_no_id', '$order_no_id' ,'1')");

  if ($sql == true) {
        return true;
      }else {
        echo "Error insert bill content: " . mysqli_error($this->conn);
        return false;
      }
}
public function bill_accept($weiter_id, $bill_number_id) {

  $this->Connect();

  if($update = $this->conn->query("UPDATE bill_number SET status='2', 	weiter_id='$weiter_id' WHERE id='$bill_number_id'") == true) {
    return true;
} else {
  echo "Error bill accept: " . mysqli_error($this->conn);
    return false;
}

}

public function bill_list($business_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM view_bill WHERE business_id='$business_id'AND status='1'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display bill list: " . mysqli_error($this->conn);
    return false;
  }
}
public function bill_info($user_id) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM bill_number WHERE user_id='$user_id'AND status='1'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display bill info: " . mysqli_error($this->conn);
    return false;
  }
}
public function print_bill($bill_no) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM print_bill WHERE bill_number_id='$bill_no'AND status='1'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display bill info: " . mysqli_error($this->conn);
    return false;
  }
}
public function bill_date($business_id , $datetime) {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM bill_number WHERE business_id='$business_id'AND datetime='$datetime");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display bill by date: " . mysqli_error($this->conn);
    return false;
  }
}

public function all_users() {
  $this->Connect();
  $info = $this->conn->query("SELECT * FROM users WHERE user_type<>'super_admin'");
  if ($info == true) {
    return $info;
  }else {
    echo "Error display all users: " . mysqli_error($this->conn);
    return false;
  }
}
public function update_users_status($user_id, $active) {
  $this->Connect();
  if($update = $this->conn->query("UPDATE users SET status='$active' WHERE id='$user_id'") == true) {
    return true;
} else {
  echo "Error update users status: " . mysqli_error($this->conn);
    return false;
}
}
/* END */
}

