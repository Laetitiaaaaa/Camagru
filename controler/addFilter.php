<?php
require($root . '/models/home.php');

if (!empty($_POST['picture']) && !empty($_POST['filterpic'])){
    $img = htmlspecialchars($_POST['picture']);
    $filter = htmlspecialchars($_POST['filterpic']);
    $login = $_SESSION['login'];
    $ans = true;

    if (isPath($img) == false){
        $tab = save_cam($img, $login);
        if ($tab !== 'error'){
            $ans = $tab[1];
            $filename = $tab[0];
        }
        else{
            $_SESSION['messInfo'] = 'Can\'t save picture.';
            header('Location: ' . $fullDomain . '/mounting');
            exit;
        }
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

        $check = put_image($login, $filename, $filtername);
        if ($check === 'error'){
            $_SESSION['messInfo'] = 'Error.';
        }
        else if ($check === 'pb montage'){
            $_SESSION['messInfo'] = 'Can\'t save picture.';
        }
        else{
            $_SESSION['messInfo'] = 'Picture successfully saved!';
        }
    }
}

?>