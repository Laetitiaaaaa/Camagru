<?php
require($root . '/models/changePass.php');

if ($method == 'GET'){
    if ($_GET['log'] != "" && $_GET['n'] != ""){
        $matchLN = matchLogNum($_GET['log'], $_GET['n']);
        if ($matchLN == true){
            $login = $_GET['log'];
            $_SESSION['log'] = $login;
            $num = $_GET['n'];
            require($root . '/views/changePass.php');           
        }
        else{
            var_dump("login and num don't match.");
        }
    }
}

if ($method = 'POST'){
    if ($_POST['password'] != "" && $_POST['verif'] != "" && $_SESSION['log'] != ""){
        $password = $_POST['password'];
        $verif = $_POST['verif'];
        $login = $_SESSION['log'];
        $matchPV = matchPassVerif($password, $verif);
        if ($matchPV == true){
            if (checkPasswd($password) == true){
                changePass($login, $password);
                require($root . '/views/changeOk.php');
            }
            else{
                var_dump("Password not well formated.");
                header('Location: ' . $fullDomain . '/change-pass');
            }
        }
        else{
            var_dump("password and verif are differents.");
        }
    }
}
?>