<?php
require($root . '/models/home.php');

if (!empty($_POST['picture']) && !empty($_POST['filterpic'])){
    $img = $_POST['picture'];
    $filter = $_POST['filterpic'];
    $login = $_SESSION['login'];
    $ans = true;

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
            $filtername = 'filters/dino.png';
        }
        else if ($filter == 'heart'){
            $filtername = 'filters/coeurs.png';
        }
        else if ($filter == 'eve'){
            $filtername = 'filters/eveuh.png';
        }
        else if ($filter == 'fox'){
            $filtername = 'filters/fox.png';
        }

        put_image($login, $filename, $filtername);
    }
}

?>