<html>
<head>
    <meta charset="utf-8"/>
    <title>Camagru</title>
</head>
<body>
<header>
<a href="/controler/home.php">Camagru</a>
<a href="http://localhost:8080/controler/gallery.php">Gallery</a>
<?php if ($_SESSION['logon'] == 1){?><a href="/controler/myAccount.php">My Account</a><?php } ?>
<?php if ($_SESSION['logon'] == 1){?><a href="http://localhost:8080/controler/signOut.php">Sign Out</a><?php } ?>
<?php if ($_SESSION['logon'] != 1){?><a href="http://localhost:8080/controler/signIn.php">Sign In</a><?php } ?>
<?php if ($_SESSION['logon'] != 1){?><a href="http://localhost:8080/controler/signUp.php">Sign Up</a><?php } ?>
</header>