<?php
require($root . '/models/sign_up.php');

if($method == 'GET'){
    require($root . '/views/sign_up.php');
}

else if ($method == 'POST'){
    if (!empty($_POST['login']) && !empty($_POST['mail']) && !empty($_POST['password'])){        
        $login = htmlspecialchars($_POST['login']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = htmlspecialchars($_POST['password']);
        $resLog = isLogin($login);
        $resMail = isMail($mail);
        $resPasswd = checkPasswd($password);

        if ($resLog === false && $resMail === false && $resPasswd === true){
            $_SESSION['login'] = $login;
            $_SESSION['mail'] = $mail;
            
            if (insert_user($login, $mail, $password) === true){
                if (sendConf($mail, $login) === true){
                    $_SESSION['messInfo'] = 'Success! You\'ll receive a mail soon to confirm your account.';
                }
                else{
                    $_SESSION['messInfo'] = 'Can\'t send mail.';
                }
            }
            else{
                $_SESSION['messInfo'] = 'Error.';
            }
        }
        else if ($resLog === true || $resMail === true || $resPasswd === false){
            if ($resLog === true){
                 $_SESSION['messInfo']='Login already exists.';
                }
            if ($resMail === true){
                $_SESSION['messInfo']='Mail already exists.';
            }
            if ($resPasswd === false){
                $_SESSION['messInfo']='Password not well formated; Password need at least 8 characters, one lowercase and one uppercase.';
            }
        }
        else{
            $_SESSION['messInfo'] = 'Error';
        }
    }
    header('Location: ' . $fullDomain . '/sign-up');
    exit;
}

else{
    echo '404 Error';
}
?>