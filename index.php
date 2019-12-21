<?php
session_start();
$domainName = "http://localhost:";
$port = "8080";
$fullDomain = $domainName.$port;
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$root = dirname(__FILE__);

//*************authentification******************** */
if ($_SESSION['logon'] == 1){
    $auth = true;
}
else{
    $auth = false;
}

//**********permission**************************** */
$private = false;

if ($uri == '/mounting' || $uri == '/my-account' || preg_match('/\/photo/', $uri) == 1 || $uri == '/sign-out'){
    $private = true;
}
if ($private == true && $auth == false){
    $_SESSION['messInfo'] = 'You need to sign in to access this page.';
    header('Location: ' . $fullDomain . '/sign-in');
    exit;
}

//*************redirection************************* */

if ($uri == '/' || $uri == ''){
    require('./controler/gallery.php');
}
else if ($uri == '/sign-in'){
    require('./controler/signIn.php');
}
else if ($uri == '/sign-up'){
    require('./controler/signUp.php');
}
else if ($uri == '/sign-out'){
    require('./controler/signOut.php');
}
else if (preg_match('/\/change-pass/', $uri) == 1){
    require('./controler/changePass.php');
}
else if (preg_match('/\/confirm/', $uri) == 1){
    require('./controler/confirm.php');
}
else if ($uri == '/forgot-pass'){
    require('./controler/forgot-pass.php');
}
else if (preg_match('/\/gallery/', $uri) == 1){
    require('./controler/gallery.php');
}
else if ($uri == '/mounting'){
    require('./controler/home.php');
}
else if ($uri == '/my-account'){
    require('./controler/myAccount.php');
}
else if (preg_match('/\/photo/', $uri) == 1){
    require('./controler/photo.php');
}
else if ($uri == '/add-filter'){
    require('./controler/addFilter.php');
}
else{
    echo '404 Error';
}




?>