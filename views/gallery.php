<?php include('header.php');?>

<?php foreach ($pageGallery as $photo){?>

<div style="width:30%; display:inline-block;"><a href="/controler/photo.php?log=<?php echo $photo['login'] ?>&n=<?php echo $photo['id_gall'] ?>"><img src="../gallery/newPictures/<?php echo $photo['path']?>" style="width:100%;"></a></div>

<?php }?>

<?php 
if (isset($previous)){
    echo '</br><a href="/controler/gallery.php?page=' . $previous . '">Previous</a>';
}
echo ' ' . $currentPage . '/' . $nbPage . ' ';
if (isset($next)){
    echo '<a href="/controler/gallery.php?page=' . $next . '">Next</a>';
}
?>