<?php
require($root . '/models/confirm.php');

if ($method == 'GET'){
    if (!empty($_GET['log']) && !empty($_GET['n'])){
        $log = $_GET['log'];
        $n = $_GET['n'];
        $match = matchLogNum($log, $n);
        
        if ($match === true){
            if (addUser($log) === true){
                require($root . '/views/confirm.php');
            }
            else{
                $_SESSION['messInfo'] = 'Error.';
                if ($auth == true){
                    header('Location: ' . $fullDomain . '/gallery');
                    exit;
                }
                else{
                    header('Location: ' . $fullDomain . '/sign-in');
                    exit;
                }    
            }
        }
        else if ($match === 'error'){
            $_SESSION['messInfo'] = 'Error.';
        }
        else{
            $_SESSION['messInfo'] = 'Wrong path.';
            if ($auth == true){
                header('Location: ' . $fullDomain . '/gallery');
                exit;
            }
            else{
                header('Location: ' . $fullDomain . '/sign-in');
                exit;
            }            
        }
    }
    else{
        $_SESSION['messInfo'] = 'Wrong path.';
        if ($auth == true){
            header('Location: ' . $fullDomain . '/gallery');
            exit;
        }
        else{
            header('Location: ' . $fullDomain . '/sign-in');
            exit;
        }
    }
}

else{
    echo '404 Error';
}

?>