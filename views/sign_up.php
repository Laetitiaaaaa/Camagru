<?php include('header.php');?>

<h2>Sign Up</h2>

<form name="signup" method="post" action="/sign-up">

<input name="login" type="text" placeholder="Login"/></br>
<input name="mail" type="email" placeholder="Mail address"/></br> 
<input name="password" type="password" placeholder="Password"/></br>
<input name="submit" type="submit" value="Sign up"></br>
Already registered ? <a href="/sign-in">Sign In</a>

</form>

<?php include('footer.php'); ?>