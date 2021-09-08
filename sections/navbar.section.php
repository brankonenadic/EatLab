
<nav class="navbar navbar-bg-new navbar-dark navbar-expand-md fixed-top">
  <a class="navbar-brand" href="./index">
    <img src="img/logo/logo2.png" width="30" height="30" class="d-inline-block align-top" alt="logo">EatLab</a>
    <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto" id="navScrollspy">
          <?php 
          if($_SESSION['login'] == true) { 
            if($_SESSION['type'] == 'user'){
              echo ' 
                <li class="nav-item">
                  <a class="nav-link" href="./menu">Menu page</a>          
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./order_user">Order page</a>          
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./bill">Bill page</a>           
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./business_info">Business info</a>           
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./user_profile">Profile page</a>           
                </li>
                <li class="nav-item">
                  <a href="./cart" class="nav-link"><i class="fas fa-shopping-basket"><span class="badge badge-pill badge-success"></span></i></a>           
                </li>
                </ul>
                <ul class="navbar-nav navbar-right" id="navScrollspy">
                <li class="nav-item">
                  <a href="./includes/logout.inc.php" class="nav-link">Logout</a>           
                </li>
              ';

            }else if($_SESSION['type'] == 'business'){
              echo ' 
              <li class="nav-item">
              <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Restoran menagment
              </a> 
              <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <a class="dropdown-item" href="./insert_dish">Insert dish page</a>
              <a class="dropdown-item" href="./update_dish">Update dish page</a>
              <a class="dropdown-item" href="./add_table">Add table page</a> 
              </div>
              </div>  
              </li>
              <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employees</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./new_employees">New employees</a>
                <a class="dropdown-item" href="./employees_list">Employees list</a>
                </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./user_profile">Profile page</a>
              </li>
              </ul>
              <ul class="navbar-nav navbar-right" id="navScrollspy">
              <li class="nav-item">
                <a href="./includes/logout.inc.php" class="nav-link">Logout</a>            
              </li>
              ';
            
          }else if($_SESSION['type'] == 'waiter'){
            echo '
              <li class="nav-item">
                <a class="nav-link" href="./employees_user">Profile page</a>            
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./order_business">Order page</a>            
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./bill_business">Bill page</a>             
              </li>
              </ul>
              <ul class="navbar-nav navbar-right" id="navScrollspy">
              <li class="nav-item">
                <a href="./includes/logout.inc.php" class="nav-link">Logout</a>            
              </li>
            ';
          }else if($_SESSION['type'] == 'chef'){
            echo ' 
              <li class="nav-item">
                <a class="nav-link" href="./employees_user">Profile page</a>          
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./order_business">Order page</a>            
              </li>
              </ul>
              <ul class="navbar-nav navbar-right" id="navScrollspy">
              <li class="nav-item">
                <a href="./includes/logout.inc.php" class="nav-link">Logout</a>            
              </li>
            ';

          }else if($_SESSION['type'] == 'menager'){
            echo '
              <li class="nav-item">
                <a class="nav-link" href="./employees_user">Profile page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./employees_active">Employees active page</a>          
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./order_business">Order page</a>          
              </li>
              </ul>
              <ul class="navbar-nav navbar-right" id="navScrollspy">
              <li class="nav-item">
                <a href="./includes/logout.inc.php" class="nav-link">Logout</a>          
              </li>
            ';
          }else if($_SESSION['type'] == 'super_admin'){

              echo ' 
              <li class="nav-item">
              <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="business_profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Business profile
              </a> 
              <div class="dropdown-menu" aria-labelledby="business_profile">
          
                <a class="dropdown-item" href="./insert_dish">Insert dish page</a>
                <a class="dropdown-item" href="./update_dish">Update dish page</a>
                <a class="dropdown-item" href="./add_table">Add table page</a> 
                <a class="dropdown-item" href="./order_business">Order page</a>
                <a class="dropdown-item" href="./bill_business">Bill page</a>
                <a class="dropdown-item" href="./new_employees">New employees</a>
                <a class="dropdown-item" href="./employees_list">Employees list</a>
                <a class="dropdown-item" href="./employees_active">Employees active page</a> 
                <a class="dropdown-item" href="./user_profile">Profile page</a>
                
              </div> 
              </div> 
              </li>
              <li class="nav-item">
              <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="user_profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              User profile
              </a> 
              <div class="dropdown-menu" aria-labelledby="user_profile">
                <a class="dropdown-item" href="./menu">Menu page</a>          
                <a class="dropdown-item" href="./order_user">Order page</a>         
                <a class="dropdown-item" href="./bill">Bill page</a>           
                <a class="dropdown-item" href="./business_info">Business info</a>           
                <a class="dropdown-item" href="./user_profile">Profile page</a>
                <a href="./cart" class="dropdown-item"><i class="fas fa-shopping-basket"><span class="badge badge-pill badge-success"></span></i></a> 
              
              </div> 
              </div> 
              </li>
              <li class="nav-item">
              <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="super_admin_profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Super admin profile
              </a> 
              <div class="dropdown-menu" aria-labelledby="super_admin_profile">
                <a class="dropdown-item" href="./all_users">All users page</a>          
                <a class="dropdown-item" href="./add_admin">Add admin page</a>       
             
              </div> 
              </div> 
              </li>
              </ul>
              <ul class="navbar-nav navbar-right" id="navScrollspy">
              <li class="nav-item">
                <a href="./includes/logout.inc.php" class="nav-link">Logout</a>            
              </li>
              ';
  
           }else if($_SESSION['type'] == 'admin'){

              echo ' 
              <li class="nav-item">
              <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Restoran menagment
              </a> 
              <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <a class="dropdown-item" href="./insert_dish">Insert dish page</a>
              <a class="dropdown-item" href="./update_dish">Update dish page</a>
              <a class="dropdown-item" href="./add_table">Add table page</a> 
              </div>
              </div>  
              </li>
              <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employees</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./new_employees">New employees</a>
                <a class="dropdown-item" href="./employees_list">Employees list</a>
                </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./user_profile">Profile page</a>
              </li>
              </ul>
              <ul class="navbar-nav navbar-right" id="navScrollspy">
              <li class="nav-item">
                <a href="./includes/logout.inc.php" class="nav-link">Logout</a>            
              </li>
              ';
  
            }

          }else{
            echo '
            <li class="nav-item">
              <a class="nav-link" href="#section-jumbotron">To the top</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#section-description">Description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#section-features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#section-pricing">Pricing</a>
            </li>
            </ul>
            <ul class="navbar-nav navbar-right" id="navScrollspy">
            <li class="nav-item">
              <a class="nav-link" href="./registar">Registar page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login">Login page</a>
            </li>
            ';
          }
          ?>
            
        </ul>
  </div>
</nav>



