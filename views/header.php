<html>
<head>
    <meta charset="utf-8"/>
    <title>Camagru</title>
</head>
<body>
<a href="/controler/home.php"><h1>Camagru</h1></a><a href="http://localhost:8080/controler/gallery.php"><p>Gallery</p></a>
<?php if ($_SESSION['logon'] == 1){?><p><a href="http://localhost:8080/controler/signOut.php">Sign Out</a></p><?php } ?> 