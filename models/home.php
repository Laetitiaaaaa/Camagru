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
    imagecopy($dest, $src, 300, 200, 0, 0, 500, 500);
    imagepng($dest, $filename);
}

?>