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

    $file = '../gallery/' . $img_name;
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
    $src = imagecreatefrompng($filtername);
    $dest = imagecreatefrompng($filename);
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
    var_dump('name file and nb exists');
    var_dump($filename);
    var_dump(fileExists($filename));
    if (fileExists($filename) != 0){
        $num = rand(0, 500);
        $new = '_' . $num . '.png';
        $filename = str_replace('.png', $new, $filename);
    }
    var_dump('test');
    var_dump($filename);
    $bool = imagepng($dest, $filename);
    var_dump('le bool');
    var_dump($bool);
    if ($bool == true){
        addTableGallery($login, $filename);
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