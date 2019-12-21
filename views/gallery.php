<?php include('header.php');?>

<div style="text-align: center; margin-top: 3%;">

<?php foreach ($pageGallery as $photo){?>

<div style="width:30%; display:inline-block;">
    <a href="/photo?log=<?php echo $photo['login'] ?>&n=<?php echo $photo['id_gall'] ?>"><img src="/gallery/newPictures/<?php echo $photo['path']?>" style="width:100%;"></a>
</div>

<?php }?>

</div>

<?php 
if ($nbPage == 0){
    $nbPage = 1;
}
?>
<div style="width:30%;" class="container">
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    
    <?php if (isset($previous)){ ?>
    <a class="pagination-previous" href="/gallery?page=<?php echo $previous ?>">Previous</a>
    <?php } ?>
    
    <?php if (isset($next)){ ?>
    <a class="pagination-next" href="/gallery?page=<?php echo $next ?>">Next page</a>
    <?php } ?>
  
    <ul class="pagination-list">
    <?php echo $currentPage . '/' . $nbPage . ' '; ?>
    </ul>
    
    </nav>
</div>