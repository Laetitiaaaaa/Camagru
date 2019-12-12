<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Camagru</title>
</head>
<body>
<h1>Camagru</h1><p>Gallery</p>
<?php if ($_SESSION['logon'] == 1){?><p>Sign Out</p><?php } ?> 