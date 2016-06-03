<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
// sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // The hashed password.
    
    if ($email == "admin@icrpv5.org" AND $password == 'admin') {
        session_start();
        // $_SESSION['id_admin'] = "99";
        // $_SESSION['email_admin'] = $email;
        $_SESSION['level']="adminicrpv5";
        // echo $_SESSION['id_admin'];
        // echo "<br>";
        // echo $_SESSION['email_admin'];
        // echo "<br>";
        // var_dump($_SESSION['admin']);
        // die();
        header('Location: ../admin.php');
    } else {
        if (login($email, $password, $mysqli) == true) {
            // Login success 
            header('Location: ../profile.php');

        } else {
            // Login failed 
            header('Location: ../login.php?error=1');
        }
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}