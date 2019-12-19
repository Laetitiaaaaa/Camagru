<?php
session_start();
$domainName = "http://localhost:";
$port = "8080";
$fullDomain = $domainName.$port;
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];














if($uri == "/signIn"){
    require('./controler/signIn.php');
}





?>