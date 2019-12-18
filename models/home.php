<?php
include('../config/database.php');

function save_cam($img, $login){
    $img = str_replace('data:image/png;base64,', '', $img);
    $data = base64_decode($img);
    $num = rand(0, 100000);
    $img_name = $login . '_' . $num . '.png';
    if (fileExists($img_name) != 0){
        $num = rand(0, 500);
        $new = '_' . $num . '.png';
        $img_name = str_replace('.png', $new, $img_name);
    }

    $file = '../gallery/uploadedPictures/' . $img_name;
    $success = file_put_contents($file, $data);

    $tab[0] = $file;
    $tab[1] = $success;
    return $tab;
}

function addTableGallery($login, $filename){
    $conn = connexion();
    $sql = "INSERT INTO `gallery` (`id_user`, `path`) VALUES ((SELECT `id` FROM `user` WHERE `login` = '{$login}'), '{$filename}');";
    $conn->query($sql);
    $conn = null;
}

function put_image($login, $filename, $filtername){
    $name = str_replace('../gallery/uploadedPictures/', '', $filename);
    $newone = '../gallery/newPictures/' . $name;
    copy($filename, $newone);
    $src = imagecreatefrompng($filtername);
    $dest = imagecreatefrompng($newone);
    if ($filtername == '../filters/dino.png'){
        var_dump('on est bien dans la copie dino');
        imagecopy($dest, $src, 300, 190, 0, 0, 400, 400);
    }
    else if ($filtername == '../filters/coeurs.png'){
        imagecopy($dest, $src, 8, 15, 0, 0, 200, 180);
    }
    else if ($filtername == '../filters/eveuh.png'){
        imagecopy($dest, $src, 0, 180, 40, 0, 200, 300);
    }
    else if ($filtername == '../filters/fox.png'){
        imagecopy($dest, $src, 430, 210, 0, 0, 200, 400);  
    }
    if (fileExists($name) != 0){
        $num = rand(0, 500);
        $new = '_' . $num . '.png';
        $newone = str_replace('.png', $new, $newone);
        $name = str_replace('../gallery/', '', $name);
    }
    echo $newone;
    $bool = imagepng($dest, $newone);
    if ($bool == true){
        addTableGallery($login, $name);
    }
    else{
        var_dump('pb enregistrement montage');
    }
}

function isPath($img){
    $pattern = "/^\.\.\/gallery\/.+\.png/";
    if (preg_match($pattern, $img) == 1){
        return true;
    }
    return false;
}

function fileExists($name){
    $conn = connexion();
    $sql = "SELECT COUNT(`path`) AS 'count' FROM `gallery` WHERE `path` = '{$name}';";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data[0]['count'];
}

?>