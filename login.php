<?php
    require_once(__DIR__.'/vendor/autoload.php');
    
    // Starting a session
    session_start();
    
    // Define variables
    $email = $password = $hashedpsw = $emailerror = $pswerror = "";
    
    if($_POST) {
        // Taking the POST parameters and validating them
        $email = validate_input($_POST['email']);
        $password = validate_input($_POST['psw']);
        
        // Connecting the mongodb server
        $connection = (new MongoDB\Client);
        
        // Connecting the databasics database
        $db = $connection->databasics;       
        
        // Access collection "login"
        $login_collection = $db->login;      
        
        // Checking if the user is registered
        $userinfo = $login_collection->findOne(['email' => $email]);
        if ($userinfo) {
            
            // Checking the given password
            $hashedpsw = $userinfo['password'];

            if (password_verify($password, $hashedpsw)) {
                $_SESSION['login_email']=$email; // Initializing Session
                header("Location: https://cloud-75.skelabb.ltu.se/home/"); // Redirecting To Other Page
            } else {
                $pswerror = "Please check your password";
                $_SESSION['pswerror'] = $pswerror;
                header("Location: https://cloud-75.skelabb.ltu.se/login/");
            }
        }
        else {
            $emailerror = "Please check your e-mail";
            $_SESSION['emailerror'] = $emailerror;
            header("Location: https://cloud-75.skelabb.ltu.se/login/");
        }
        
    }
    
    // Validating the input for security purposes 
    function validate_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    
?>
