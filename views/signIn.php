<?php include('header.php');?>

<h2>Sign In</h2>

<form name="signin" method="post" action="/sign-in">

<input name="login" type="text" placeholder="Login"/></br>
<input name="password" type="password" placeholder="Password"/></br>
<input name="submit" type="submit" value="Sign in"></br>
<a href="/controler/forgot-pass.php">Forgot your password ?</a>

</form>

<?php include('footer.php'); ?>