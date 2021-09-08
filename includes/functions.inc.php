<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php

/*** Function for loading the page ***/
function load_page($page){
    
   if ($page === ''){
        require 'pages/index.page.php';
        return;
    }
     if ($_SESSION['login'] == true) { 
        if ($_SESSION['type'] == 'user'){
        switch ($page){   
        case 'index':
        case 'menu':  
        case 'cart':  
        case 'registar':  
        case 'login': 
        case 'user_profile':
        case 'business_info': 
        case 'order_user':   
        case 'bill':          
        case 'success':  
        case 'error_registration': 
        case 'error_activation':                 
            require 'pages/' . $page . '.page.php';
            break;
        default:
            require 'pages/index.page.php';
            return;
    }
} else if ($_SESSION['type'] == 'business'){
    switch ($page){ 
    case 'index':
    case 'menu':  
    case 'insert_dish': 
    case 'update_dish':    
    case 'add_table':    
    case 'order_business':     
    case 'registar':  
    case 'login':  
    case 'success':
    case 'user_profile':
    case 'new_employees': 
    case 'employees_list': 
    case 'employees_profile':          
    case 'error_registration': 
    case 'error_activation':                 
        require 'pages/' . $page . '.page.php';
        break;
    default:
        require 'pages/index.page.php';
        return;
}
} else if ($_SESSION['type'] == 'waiter'){
    switch ($page){
    case 'index':
    case 'order_business':   
    case 'login':  
    case 'success':
    case 'bill_business':  
    case 'employees_user':
    case 'error_activation':                 
        require 'pages/' . $page . '.page.php';
        break;
    default:
        require 'pages/index.page.php';
        return;
}
} else if ($_SESSION['type'] == 'chef'){
    switch ($page){
    case 'index':
    case 'order_business':   
    case 'login':  
    case 'success':
    case 'employees_user':
    case 'error_activation':                 
        require 'pages/' . $page . '.page.php';
        break;
    default:  
        require 'pages/index.page.php';
        return;
}
} else if ($_SESSION['type'] == 'menager'){
    switch ($page){
    case 'index':
    case 'order_business':   
    case 'login':  
    case 'success':
    case 'employees_user':
    case 'employees_active':   
    case 'error_activation':                 
        require 'pages/' . $page . '.page.php';
        break;
    default:
        require 'pages/index.page.php';
        return;
}
} else if ($_SESSION['type'] == 'admin'){ 
    switch ($page){
    case 'index':
    case 'menu':  
    case 'insert_dish': 
    case 'cart':  
    case 'registar':  
    case 'login':  
    case 'success':  
    case 'error_registration': 
    case 'error_activation':                 
        require 'pages/' . $page . '.page.php';
        break;
    default:
        require 'pages/index.page.php';
        return;
}
} else if ($_SESSION['type'] == 'super_admin'){ 
    switch ($page){
            case 'index':
            case 'menu':  
            case 'insert_dish': 
            case 'update_dish':    
            case 'add_table':    
            case 'order_business':     
            case 'registar':  
            case 'login':  
            case 'success':
            case 'user_profile':
            case 'new_employees': 
            case 'employees_list': 
            case 'employees_profile':          
            case 'error_registration': 
            case 'error_activation': 
            case 'cart':  
            case 'user_profile':
            case 'business_info': 
            case 'order_user':   
            case 'bill': 
            case 'all_users':
            case 'add_admin':                        
            require 'pages/' . $page . '.page.php';
            break;
        default:
            require 'pages/index.page.php';
            return;
    } 
} else {
    switch ($page){
        case 'index':
        case 'registar':  
        case 'login': 
        case 'forgot_password':      
        case 'success': 
        case 'success_resetpw':        
        case 'error_registration': 
        case 'error_activation':                 
            require 'pages/' . $page . '.page.php';
            break;
        default:
            require 'pages/index.page.php';
            return;
    }
}
    } else {
        switch ($page){
        case 'index':  
        case 'registar':  
        case 'login': 
        case 'forgot_password': 
        case 'new_password':        
        case 'success':  
        case 'success_resetpw':  
        case 'success_newpw': 
        case 'delete_profile':        
        case 'error_registration': 
        case 'error_activation':                 
            require 'pages/' . $page . '.page.php';
            break;
        default:
            require 'pages/index.page.php';
            return;
        }
    
    } 
}