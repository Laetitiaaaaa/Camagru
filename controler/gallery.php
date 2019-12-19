<?php
require($root . '/models/gallery.php');
session_start();

$photo_tab = recoverFiles();
$limit = 5;
$nbPhoto = countPhoto();
$nbPage = ceil($nbPhoto / $limit);

if (isset($_GET) && isset($_GET['page'])){
    if ($_GET['page'] != "" && $_GET['page'] > 0 && $_GET['page'] <= $nbPage){
        $_GET['page'] = intval($_GET['page']); // transforme var en nb
        $currentPage = $_GET['page'];
    }
    else{
        $currentPage = 1;
    }
}
else{
    $currentPage = 1;
}

$start = ($currentPage - 1) * $limit;
$pageGallery = limitPhoto($start, $limit);
if ($currentPage > 1){
    $previous = $currentPage - 1;
}
if ($currentPage < $nbPage){
    $next = $currentPage + 1;
}

require($root . '/views/gallery.php');
?>