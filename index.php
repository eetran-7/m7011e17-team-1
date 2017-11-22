<!-- THIS IS THE INDEX.PHP FOR FRONTPAGE -->
<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_email'])){
header('Location: https://cloud-75.skelabb.ltu.se/home/');
}
?>


<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1">
<title>CodeBasics</title>
<link rel="stylesheet" href="./css/frontpage.css">
<script src="./js/jquery-3.2.1.min.js"></script>
<script src="./js/frontpage.js"></script>
</head>

<body>

<div class="onePage" id="firstPage">
    <div class="header">
        <div class="headerContent">
            <a class="logoLink" href="https://cloud-75.skelabb.ltu.se/">
                <img id="logo" src="./pictures/codeBasicsLogo.png">
            </a>

            <div class="goToLogin">
                <a onclick="openLoginForm()">Log In</a>
            </div>
        </div>
    </div>
        
    <div class="content">
    
        <div class="column" id="column1">
            <h3>Want to learn coding?</h3>
            <p>If you ever have wanted to learn to code, now it is very easy and funny. CodeBasics helps you to learn coding with videos and helps you with your learning process.</p>
            <h3>Videos and commenting</h3>
            <p>CodeBasics uses YouTube-videos as a base and categorizes them by language and level of difficulty. You can also ask questions and comment under each video.</p>
       </div>
        
        <div class="column" id="column2">
            <div class="tabs">
                <a class="tablinks active" onclick="openTab(event, 'python')">Python</a>
                <a class="tablinks" onclick="openTab(event, 'html')">HTML</a>
                <a class="tablinks" onclick="openTab(event, 'javascript')">Javascript</a>
                <a class="tablinks" onclick="openTab(event, 'sql')">SQL</a>
            </div>
            <div class="tabcontents">
                <div id="python" class="tab">
                    <h4>Do you want to learn Python?</h4>
                    <iframe width="300" height="200" src="https://www.youtube.com/embed/aDwCCUfNFug" frameborder="0" allowfullscreen></iframe>
                    <span>Start to learn Python by <a onclick="openSignupForm()"> creating a free account!</a></span>
                </div>
                <div id="html" class="tab">
                    <h4>Or is front-end development for you?</h4>
                    <iframe width="300" height="200" src="https://www.youtube.com/embed/idHyruXhXhA" frameborder="0" allowfullscreen></iframe>
                    <span>Start to learn HTML by <a onclick="openSignupForm()"> creating a free account!</a></span>
                </div>
                <div id="javascript" class="tab">
                    <h4>Javascript for creating crazy things?</h4>
                    <iframe width="300" height="200" src="https://www.youtube.com/embed/jkTzHEtHd54" frameborder="0" allowfullscreen></iframe>
                    <span>Start to learn Javascript by <a onclick="openSignupForm()"> creating a free account!</a></span>                   
                </div>
                <div id="sql" class="tab">
                    <h4>Or do you want to master databases?</h4>
                    <iframe width="300" height="200" src="https://www.youtube.com/embed/HgoM1I4yEFo" frameborder="0" allowfullscreen></iframe>
                    <span>Start to learn SQL by <a onclick="openSignupForm()"> creating a free account!</a></span>                    
                </div>
            </div>
        </div>
        
    </div>
    

</div>

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
                <form class="login" action="" method="post">
                    <input type="text" placeholder="E-mail" name="email" required>
                    <span class="loginError" id="emailError"><?php echo $emailerror ?></span>

                    <input type="password" placeholder="Password" name="psw" required>
                    <span class="loginError" id="pswError"><?php echo $pswerror ?></span>
                    
                    <span class="psw">Forgot <a id="pswResetBtn" onclick="openModal('passwordResetModal')">password?</a></span>

                    <button type="submit">Log In</button>
                    
                    <input class="rememberMe" id="rememberMe" type="checkbox" checked="checked">
                    <label for="rememberMe">Remember me</label>   
                </form>
            </div>
            
            <div id="signupForm" class="form">
                <form class="signup" action="signup.php" method="post">
                    
                    <input type="text" placeholder="E-mail address" name="signup_email" required>

                    <input type="password" placeholder="Password" id="signupPsw" name="signup_psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <div id="pswMessage">
                        <p id="pswLetter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="pswCapital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="pswNumber" class="invalid">A <b>number</b></p>
                        <p id="pswLength" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    
                    <input type="password" placeholder="Confirm password" name="pswConfirm" id="pswConfirm" required>
                    <span class="loginError" id="pswMatchError"></span>

                    <button type="submit" id="signupBtn">Create new user</button>
                    
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
    
    <div class="goUp">
        <a onclick="scrollToItem('#firstPage')">Back to top</a>
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
    
</body>

</html>
