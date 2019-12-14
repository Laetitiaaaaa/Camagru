<?php
include('../config/database.php');

function save_cam($img, $login){
    $img = str_replace('data:image/png;base64,', '', $img);
    $data = base64_decode($img);
    $num = rand(0, 100000);
    var_dump($login);
    var_dump($num);
    $file = '../gallery/' . $login . '_' . $num . '.png';
    $success = file_put_contents($file, $data);
    var_dump($file);
    $tab[0] = $file;
    // var_dump($tab[0]);
    $tab[1] = $success;
    // var_dump($tab[1]);
    return $tab;
}

function put_image($filename, $filtername){
    $src = imagecreatefrompng($filtername);
    $dest = imagecreatefrompng($filename);
    if ($filtername == '../filters/dino.png'){
        imagecopy($dest, $src, 300, 190, 0, 0, 400, 400);
    }
    else if ($filtername == '../filters/coeurs.png'){
        imagecopy($dest, $src, 0, 0, 30, 50, 230, 200);
    }
    else if ($filtername == '../filters/eveuh.png'){
        imagecopy($dest, $src, 0, 180, 40, 0, 200, 300);
    }
    else if ($filtername == '../filters/fox.png'){
        imagecopy($dest, $src, 430, 210, 0, 0, 200, 400);  
    }
    imagepng($dest, $filename);
}

?>