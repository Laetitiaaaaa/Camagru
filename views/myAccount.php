<?php include('header.php');?>

<h2>My Account</h2>

<form name="myAccount" method="post" action="/my-account">

<input name="login" type="text" value=<?php echo $_SESSION['login']; ?>>
<input name="changeLog" type="submit" value="Change Login"/></br>
<input name="mail" type="email" value=<?php echo $_SESSION['mail']; ?>>
<input name="changeMail" type="submit" value="Change Mail Address"/></br> 
<input name="password" type="password" placeholder="Password"/></br>
<input name="verif" type="password" placeholder="Verification"/>
<input name="changePass" type="submit" value="Change Password"></br>

</form>

<?php include('footer.php'); ?>