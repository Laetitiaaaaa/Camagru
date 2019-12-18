<?php
require('../models/home.php');
session_start();


if (isset($_SESSION) && isset($_SESSION['logon']) && isset($_SESSION['login'])){
    if ($_SESSION['logon'] == 1){
        if (isset($_POST) && (isset($_POST['picture']) && isset($_POST['filterpic']))){
            if ($_POST['picture'] != "" && $_POST['filterpic'] != ""){
                $img = $_POST['picture'];
                $filter = $_POST['filterpic'];
                $ans = true;
                $login = $_SESSION['login'];
                if (isPath($img) == false){
                    $tab = save_cam($img, $login);
                    $ans = $tab[1];
                    $filename = $tab[0];
                }
                else{
                    $filename = $img;
                }
                if ($ans != false){
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
                    put_image($_SESSION['login'], $filename, $filtername);
                }
            }
        }
        else if (isset($_FILES) && $_FILES['download'] != ""){
            $img = $_FILES['download'];
            if ($img['type'] != 'image/png'){
                var_dump('mauvais format');
            }
            else{
                $num = rand(0, 100000);
                $tmp_name = $img['tmp_name'];
                $name = $_SESSION['login'] . '_' . $num . '.png';
                if (fileExists($name) != 0){
                    $num = rand(0, 500);
                    $new = '_' . $num . '.png';
                    $name = str_replace('.png', $new, $name);
                }
                $filename = '../gallery/uploadedPictures/'.$name;
                move_uploaded_file($tmp_name, $filename);
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