<?php
require($root . '/models/sign_up.php');

if($method == 'GET'){
    require($root . '/views/sign_up.php');
}

if ($method == 'POST'){
    if ($_POST['login'] != "" && $_POST['mail'] != "" && $_POST['password'] != ""){        
        $login = $_POST['login'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $resLog = isLogin($login);
        $resMail = isMail($mail);
        $resPasswd = checkPasswd($password);
        if ($resLog == false && $resMail == false && $resPasswd == true){
            $_SESSION['login'] = $login;
            $_SESSION['mail'] = $mail;
            insert_user($login, $mail, $password);
            header('Location: '. $fullDomain . '/sign-up-ok');
            exit;
        }
        else if ($resLog == true || $resMail == true || $resPasswd == false){
            if ($resLog == true){
                 echo "Login already exists.</br>";
                }
            if ($resMail == true){
                echo "Mail already exists.</br>";
            }
            if ($resPasswd == false){
                echo "Bad password.</br>";
            }
        }
    }
    header('Location: ' . $fullDomain . '/sign-up');
}
?>