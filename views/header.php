<html>
<head>
    <meta charset="utf-8"/>
    <title>Camagru</title>
</head>
<body>
<header>
<a href="/mounting">Camagru</a>
<a href="/gallery">Gallery</a>
<?php if ($_SESSION['logon'] == 1){?><a href="/my-account">My Account</a><?php } ?>
<?php if ($_SESSION['logon'] == 1){?><a href="/sign-out">Sign Out</a><?php } ?>
<?php if ($_SESSION['logon'] != 1){?><a href="/sign-in">Sign In</a><?php } ?>
<?php if ($_SESSION['logon'] != 1){?><a href="/sign-up">Sign Up</a><?php } ?>
</header>
<?php if (isset($_SESSION['messInfo']) && !empty($_SESSION['messInfo'])) { ?>
    <p><?php echo $_SESSION['messInfo'];
        unset($_SESSION['messInfo']); ?></p>
<?php } ?>