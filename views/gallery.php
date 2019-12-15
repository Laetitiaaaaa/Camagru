<?php include('header.php');?>

<?php foreach ($photo_tab as $photo){?>

<div style="width:30%; display:inline-block;"><a href="/controler/photo.php?log=<?php echo $photo['login'] ?>&n=<?php echo $photo['id_gall'] ?>"><img src="../gallery/<?php echo $photo['path']?>" style="width:100%;"></a></div>

<?php }?>

<?php include('footer.php'); ?>