<?php include('header.php');?>

<div class="columns">
<div class="column is-2"></div>
<div class="column is-8">

<div class="columns">
<div class="column is-1"></div>
<div class="column is-10" style="text-align: center;">
<img src="/gallery/newPictures/<?php echo $file_img; ?>" alt="photo">
</div>
<div class="column is-1"></div>
</div>

<form method="post" action="/photo?log=<?php echo $_GET['log'] ?>&n=<?php echo $id_photo ?>">
    <input type="hidden" name="logUser" value="<?php echo $_GET['log'] ?>">
    <input type="hidden" name="idPhoto" value="<?php echo $id_photo ?>">
    <input type="hidden" name="namePhoto" value="<?php echo $file_img ?>">

    <div class="buttons is-centered">
    <input type="submit" class="button is-danger is-outlined is-rounded" name="like" value="<?php echo $nbLike['nb_like'] ?> like<?php if ($nbLike['nb_like'] > 1){ ?>s<?php } ?>">
    
    <?php if (getId($_SESSION['login']) == $id_user) {?>
    <input type="submit" class="button is-outligned is-rounded" name="supp" value="Delete picture">
    <?php } ?>
    </div>
    
    
    
    
    <?php foreach ($comments as $com) {$login = getLogin($com['id_user']);?>
        <article class="message is-primary">
        <div class="message-header">
            <p><?php echo $login['login'] ?></p>
        </div>
        <div class="message-body">
            <?php echo $com['comment']; ?>
        </div>
        </article>

    <?php } ?>
    



    <div class="field">
        <div class="control">
        <input type="text" class="input is-primary" name="com" placeholder="leave a comment">
        </div>
    </div>

    <div class="buttons is-centered">
        <input type="submit" class="button is-primary is-rounded" name="subcom" value="Submit">
    </div>
    
</form>
</div>
<div class="column is-2"></div>
</div>
<?php include('footer.php'); ?>