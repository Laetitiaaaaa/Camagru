<?php
require('../models/home.php');
session_start();

if (isset($_SESSION) && isset($_SESSION['logon'])){
    if ($_SESSION['logon'] == 1){
        if (isset($_POST) && isset($_POST['picture']) && isset($_POST['filterpic'])){
            if ($_POST['picture'] != "" && $_POST['filterpic']){
                $img = $_POST['picture'];
                $filter = $_POST['filterpic'];
                $login = $_SESSION['login'];
                $tab = save_cam($img, $login);
                if ($tab[1] != false){
                    $filename = $tab[0];
                    if ($filter == 'dino'){
                        $filtername = '../filters/dino.png';
                    }
                    else if ($filter == 'heart'){
                        $filtername = '../filters/coeurs.png';
                    }
                    else if ($filter == 'eve'){
                        $filtername = '../filters/eveuh.png';
                    }
                    else if ($filter == 'fox'){
                        $filtername = '../filters/fox.png';
                    }
                    put_image($filename, $filtername);
                }
            }
        }
        require('../views/home.php');
    }
    else{
        require('../views/notLogon.php');
    }
}
else{
    require('../views/notLogon.php');    
}

?>