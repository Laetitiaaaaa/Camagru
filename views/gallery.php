<?php include('header.php');?>

<?php foreach ($pageGallery as $photo){?>

<div style="width:30%; display:inline-block;"><a href="/photo?log=<?php echo $photo['login'] ?>&n=<?php echo $photo['id_gall'] ?>"><img src="/gallery/newPictures/<?php echo $photo['path']?>" style="width:100%;"></a></div>

<?php }?>

<?php 
if (isset($previous)){
    echo '</br><a href="/gallery?page=' . $previous . '">Previous</a>';
}
if ($nbPage == 0){$nbPage = 1;}
echo ' ' . $currentPage . '/' . $nbPage . ' ';
if (isset($next)){
    echo '<a href="/gallery?page=' . $next . '">Next</a>';
}
?>