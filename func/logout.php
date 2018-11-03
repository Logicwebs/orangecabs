<?php 

if(isset($_SESSION['user_id']) && $_GET['logout'] == 1){
    //destroy the session
    session_destroy();
    
    //destroy the cookie
    setcookie("rememberme", "", time()-3600);
}

?>