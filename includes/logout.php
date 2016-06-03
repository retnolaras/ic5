<?php
// include_once 'functions.php';
// sec_session_start();
 
// // Unset all session values 
// $_SESSION = array();
 
// // get session parameters 
// $params = session_get_cookie_params();
 
// // Delete the actual cookie. 
// setcookie(session_name(),
//         '', time() - 42000, 
//         $params["path"], 
//         $params["domain"], 
//         $params["secure"], 
//         $params["httponly"]);
 
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["email"]);
unset($_SESSION["registrant_status"]);
// Destroy session 
session_destroy();
header('Location: ../index.php');

?>