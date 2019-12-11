<?php include('header.php');?>

<h2>Forgotten password</h2>

<form name="forgotPass" method="post" action="../controler/forgot-pass.php">

<input name="mail" type="email" placeholder="Mail address"/></br> 
<input name="submit" type="submit" value="Send"></br>

</form>

<?php include('footer.php'); ?>