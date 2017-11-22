<?php
    require_once __DIR__ . "/vendor/autoload.php";

    // Creating connection with database
    $connection = (new MongoDB\Client);
        
    // Connecting the databasics database
    $db = $connection->databasics;       
        
    // Access collection "login"
    $login_collection = $db->login;

    // Starting session
    session_start();
    
    // Storing Session
    $user_check = $_SESSION['login_email'];
    
    // Quering database for complete information of user
    $userinfo = $login_collection->findOne(['email' => $user_check]);
    $login_session = $userinfo['email'];
    
    if(!isset($login_session)){
        header('Location: index.php'); // Redirecting To Home Page
    }
?>
