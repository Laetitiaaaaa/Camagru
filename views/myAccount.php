<?php include('header.php');?>

<h2>My Account</h2>

<form name="myAccount" id="account-form" method="post" action="/my-account">

<input name="login" type="text" value=<?php echo $_SESSION['login']; ?>>
<input name="changeLog" type="submit" value="Change Login"/></br>
<input name="mail" type="email" value=<?php echo $_SESSION['mail']; ?>>
<input name="changeMail" type="submit" value="Change Mail Address"/></br> 
<input name="password" type="password" placeholder="Password"/></br>
<input name="verif" type="password" placeholder="Verification"/>
<input name="changePass" type="submit" value="Change Password"></br>
<select name="preference">
    <option value="yes" <?php if ($_SESSION['pref'] == 'yes' || empty($_SESSION['pref'])){echo 'selected';} ?>>Yes, I prefer to receive an email when someone comments one of my pictures.</option>
    <option value="no" <?php if ($_SESSION['pref'] == 'no') {echo 'selected';} ?>>No, I prefer not to receive an email when someone comments one of my pictures.</option>
</select>
<input name="pref" type="submit" value="Change">

</form>

<?php include('footer.php'); ?>