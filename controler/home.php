<?php
require('../models/home.php');
session_start();

if (isset($_SESSION) && isset($_SESSION['logon'])){
    if ($_SESSION['logon'] == 1){
        if (isset($_POST) && isset($_POST['picture'])){
            if ($_POST['picture'] != ""){
                $img = $_POST['picture'];
                $login = $_SESSION['login'];
                $tab = save_cam($img, $login);
                if ($tab[1] != false){
                    // $src = imagecreatefrompng('../filters/dino.png');
                    // $dest = imagecreatefrompng('../gallery/test1.png');
                    // imagecopy($dest, $src, 300, 200, 0, 0, 500, 500);
                    // $img = imagepng($dest, '../gallery/test1.png');
                    // var_dump($tab[0]);
                    $filename = $tab[0];
                    $filtername = '../filters/dino.png';
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