<?php
require($root . '/models/signIn.php');

if ($method == 'GET'){
    require($root . '/views/signIn.php');
}

if ($method == 'POST'){
    if ($_POST['login'] != "" && $_POST['password'] != ""){
        $login = $_POST['login'];
        $password = $_POST['password'];
        if (match($login, $password) == true){
            $_SESSION['login'] = $login;
            $_SESSION['mail'] = recoverMail($login);
            $_SESSION['logon'] = 1;
            // echo "Connection succeed!</br>";
            header('Location: '. $fullDomain . '/mounting');
            exit;
        }
        else{
            // echo "Connection failed</br>";
        }
    }
    header('Location: '. $fullDomain . '/sign-in');
    exit;
}

?>