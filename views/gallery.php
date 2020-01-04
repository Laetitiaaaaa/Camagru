<?php include('header.php');?>

<div class="content has-text-centered">
    <h1>Gallery</h1>
</div>

<div class="columns">
    <div class="column is-1"></div>
    <div class="column is-10">
        <div class="columns is-multiline is-centered">
        <?php if (($photo_tab) != NULL){?>
        <?php foreach ($pageGallery as $photo){?>
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <a href="/photo?log=<?php echo $photo['login'] ?>&n=<?php echo $photo['id_gall'] ?>"><img src="/gallery/newPictures/<?php echo $photo['path']?>" style="width:100%;"></a>
                        </figure>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php } ?>
        </div>
    </div>
    <div class="column is-1"></div>
</div>

<?php 
if ($nbPage == 0){
    $nbPage = 1;
}
?>
<div style="width:30%;" class="container">
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">

    <ul class="pagination-list">

        <?php if (isset($previous)){ ?>
        <li><a class="pagination-previous" href="/gallery?page=<?php echo $previous ?>">Previous</a></li>
        <?php } ?>

        <li><?php echo $currentPage . '/' . $nbPage . ' '; ?><li>

        <?php if (isset($next)){ ?>
        <li><a class="pagination-next" href="/gallery?page=<?php echo $next ?>">Next page</a><li>
        <?php } ?>
  
    </ul>
    
    </nav>
</div>

<?php include('footer.php');?>
