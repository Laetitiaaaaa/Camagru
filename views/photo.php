<?php include('header.php');?>

<div>
<img src="../gallery/<?php echo $file_img; ?>" alt="photo">
<p><?php echo $nbLike['nb_like'] ?> like<?php if ($nbLike['nb_like'] > 1){ ?>s<?php } ?></p>
</div>
<form method="post" action="/controler/photo.php?log=<?php echo $_GET['log'] ?>&n=<?php echo $id_photo ?>">
    <input type="hidden" name="logUser" value="<?php echo $_GET['log'] ?>">
    <input type="hidden" name="idPhoto" value="<?php echo $id_photo ?>">
    <input type="hidden" name="namePhoto" value="<?php echo $file_img ?>">
    <input type="submit" name="like" value="Like"></br>
    <div>
    
    <?php foreach ($comments as $com) {$login = getLogin($com['id_user']);?>
    <p><font color="purple"> <?php echo $login['login'] ?>:</font> <?php echo $com['comment']; ?></p>
    <?php } ?>
    
    </div>
    <input type="text" name="com" placeholder="leave a comment">
    <input type="submit" name="subcom" value="Submit">
</form>
<?php include('footer.php'); ?>