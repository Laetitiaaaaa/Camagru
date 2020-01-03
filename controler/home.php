<?php
require($root . '/models/home.php');

if ($method == 'GET'){
    if (!empty($_SESSION['filename'])){
        $filename = $_SESSION['filename'];
        unset($_SESSION['filename']);
    }
    require($root . '/views/home.php');
}

else if ($method == 'POST'){

    if (!empty($_FILES['download'])){
        $img = $_FILES['download'];
        if ($img['type'] != 'image/png'){
            $_SESSION['messInfo'] = 'Wrong format, only png file accepted.';
        }
        else{
            $num = rand(0, 100000);
            $tmp_name = $img['tmp_name'];
            $name = $_SESSION['login'] . '_' . $num . '.png';
            if (fileExists($name) != 0 && fileExists($name) !== 'error'){
                $num = rand(0, 500);
                $new = '_' . $num . '.png';
                $name = str_replace('.png', $new, $name);
            }
            $filename = 'gallery/uploadedPictures/' . $name;
            move_uploaded_file($tmp_name, $filename);
            $_SESSION['filename'] = $filename;
        }
    }
    header('Location: ' . $fullDomain . '/mounting');
    exit;
}

else{
    echo '404 Error';
}
?>