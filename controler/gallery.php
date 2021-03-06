<?php
require($root . '/models/gallery.php');

if ($method == 'GET'){
    $photo_tab = recoverFiles();
    $limit = 5;
    $nbPhoto = countPhoto();
    $nbPage = ceil($nbPhoto / $limit);
    if ($photo_tab === 'error' || $nbPage === 'error'){
        $_SESSION['messInfo'] = 'Error.';
    }

    if (!empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPage){
        $_GET['page'] = htmlspecialchars(intval($_GET['page']));
        $currentPage = htmlspecialchars($_GET['page']);
    }
    else{
        $currentPage = 1;
    }
    
    $start = ($currentPage - 1) * $limit;
    $pageGallery = limitPhoto($start, $limit);
    if($pageGallery === 'error'){
        $_SESSION['messInfo'] = 'Error.';
    }
    
    if ($currentPage > 1){
        $previous = $currentPage - 1;
    }
    if ($currentPage < $nbPage){
        $next = $currentPage + 1;
    }

    require($root . '/views/gallery.php');
}

else{
    echo '404 Error';
}

?>