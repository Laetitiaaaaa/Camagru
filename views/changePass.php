<?php include('header.php');?>

<h2>Change password</h2>

<form name="changePass" method="post" action="/change-pass">

<input name ="log" type="hidden" value="<?php echo $_GET['log'] ?>"/>
<input name ="n" type="hidden" value="<?php echo $_GET['n'] ?>"/>
<input name="password" type="password" placeholder="New password"/></br> 
<input name="verif" type="password" placeholder="Verification"/></br> 
<input name="submit" type="submit" value="Change"></br>

</form>

<?php include('footer.php'); ?>