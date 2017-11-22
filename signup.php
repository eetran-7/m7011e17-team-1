<!DOCTYPE html>
<html>
<body>

<?php
    require_once(__DIR__.'/vendor/autoload.php');
    
    // Starting a session
    session_start();    
    
    // Define variables
    $email = $password = "";    
    
    if($_POST) {
        // Taking the POST parameters and validating them
        $email = validate_input($_POST['signup_email']);
        $password = validate_input($_POST['signup_psw']);
        
        // Hashing the password for storing
        $options = [
            'cost' => 12,
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        
        // Connecting the mongodb server
        $connection = (new MongoDB\Client);
        
        // Connecting the databasics database
        $db = $connection->databasics;       
        
        // Access collection "login"
        $login_collection = $db->login;      
        
        // Check whether the e-mail exist already and insert a document if not
        $userinfo = $login_collection->findOne(['email' => $email]);
        
        if ($userinfo) {
            $signuperror = "This e-mail is already registered.";
            $_SESSION['signuperror'] = $signuperror;
            header("Location: https://cloud-75.skelabb.ltu.se/login/?signup=true");             
        }
        else {
            $insertOneUser = $login_collection->insertOne([
                'email' => $email,
                'password' => $password,
                'usergroup' => 'user',
            ]);
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

<?php
echo "<h2>Inserted:</h2>";
echo $email;
echo "<br>";
echo $password;
?>

</body>
</html>
