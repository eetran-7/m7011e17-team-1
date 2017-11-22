<?php
include('../session.php');
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1">
<title>Coding videos | CodeBasics</title>
<link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <div class="header">
        <h1>CodeBasics</h3>
        <a href="#">User page</a>
    </div>

    <div class="nav">
        <a class="navButtons">Navigointi1</a>
        <a class="navButtons">Navigointi2</a>
        <a class="navButtons">Navigointi3</a>
        <a class="navButtons">Navigointi4</a>
        <a class="navButtons">Navigointi5</a>
    </div>
    
    <div class="content">
        <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <b id="logout"><a href="../logout.php">Log Out</a></b>
    </div>
    
    <div class="footer">
        <p>Copyright 2017, CodeBasics</p>
    </div>

</body>

</html>
