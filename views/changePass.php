<?php include('header.php');?>

<h2>Change password</h2>

<form name="changePass" method="post" action="/controler/changePass.php">

<input name="password" type="password" placeholder="New password"/></br> 
<input name="verif" type="password" placeholder="Verification"/></br> 
<input name="submit" type="submit" value="Change"></br>

</form>

<?php include('footer.php'); ?>