<!-- THIS IS THE INDEX.PHP FOR LOGIN PAGE -->
<?php
include('../login.php'); // Includes Login Script

if(isset($_SESSION['login_email'])){
header("Location: https://cloud-75.skelabb.ltu.se/home/");
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1">
<title>CodeBasics</title>
<link rel="stylesheet" href="../css/login.css">
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/login.js"></script>
</head>

<body>

<div class="onePage" id="loginPage">
    <br>
    <h1>Login or create a new user</h1>
    <br>

    <div class="container">
        <div class="formTabs">
            <a id="loginLink" class="formlinks active" onclick="openForm('loginLink', 'loginForm')">Log In</a>
            <a id="signupLink" class="formlinks" onclick="openForm('signupLink', 'signupForm')">Sign Up</a>
        </div>
        
        <div id="forms">
            
            <div id="loginForm" class="form">
                <form class="login" action="../login.php" method="post">
                    <input type="text" placeholder="E-mail" name="email" required>
                    <span class="loginError" id="emailError">
                        <?php 
                            if(isset($_SESSION['emailerror'])){
                                echo $_SESSION['emailerror'];
                                unset($_SESSION['emailerror']);
                            }
                        ?>
                    </span>

                    <input type="password" placeholder="Password" name="psw" required>
                    <span class="loginError" id="pswError">
                        <?php 
                            if(isset($_SESSION['pswerror'])){
                                echo $_SESSION['pswerror'];
                                unset($_SESSION['pswerror']);
                            }
                        ?>
                    </span>
                    
                    <span class="psw">Forgot <a id="pswResetBtn" onclick="openModal('passwordResetModal')">password?</a></span>

                    <button type="submit">Log In</button>
                    
                    <input class="rememberMe" id="rememberMe" type="checkbox" checked="checked">
                    <label for="rememberMe">Remember me</label>   
                </form>
            </div>
            
            <div id="signupForm" class="form">
                <form class="signup" action="../signup.php" method="post">
                    
                    <input type="text" placeholder="E-mail address" name="signup_email" required>
                    <span class="loginError" id="signupError">
                        <?php 
                            if(isset($_SESSION['signuperror'])){
                                echo $_SESSION['signuperror'];
                                unset($_SESSION['signuperror']);
                            }
                        ?>
                    </span>
                    
                    <input type="password" placeholder="Password" id="signupPsw" name="signup_psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <span class="loginError" id="pswError"></span>
                    <div id="pswMessage">
                        <p id="pswLetter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="pswCapital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="pswNumber" class="invalid">A <b>number</b></p>
                        <p id="pswLength" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    
                    <input type="password" placeholder="Confirm password" name="pswConfirm" id="pswConfirm" required>
                    <span class="loginError" id="pswMatchError"></span>

                    <button type="submit" id="signupBtn" disabled="true">Create new user</button>
                    
                </form>
            </div>
       
        
        </div>
        
        <!-- <fieldset class="lineWithLabel"> -->
                <!-- <legend align="center">or</legend> -->
        <!-- </fieldset> -->
        
    </div>
    
    <!-- Password reset modal window -->
    <div id="passwordResetModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" onclick="closeModal('passwordResetModal')">&times;</span>
          <h2>Password reset</h2>
        </div>
        <div class="modal-body" id="modal-body">
          <p id="resetPswTxt">Please enter your e-mail address.</p>
          <input id="emailInput" type="text" placeholder="E-mail" required>
          <button id="resetPswBtn" onclick="resetPsw('userna')">Reset password</button>
        </div>
      </div>

    </div>
    
</div>
    <!-- <div class="socialMediaLogin"> -->
        <!-- <button class="fbButton" type="button">Facebook</button> -->
        <!-- <button class="linkedinButton" type="button">LinkedIn</button> -->
        <!-- <button class="googleButton" type="button">Google</button> -->
    <!-- </div> -->
    <div class="footer">
        <p>CodeBasics &copy; 2017</p>
        <br>
    </div>

<?php
    if ($_GET["signup"] == "true") {
        echo "
            <script>
                openForm('signupLink', 'signupForm');
            </script>"
        ;
    }
    if(isset($_SESSION['signuperror'])){
        echo "
            <script>
                document.getElementById('signupError').innerHTML =",
                $_SESSION['signuperror'];
        unset($_SESSION['signuperror']);
    }
?>
    
    
</body>

</html>
