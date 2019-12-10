<?php
include('config/database.php');
$conn = connexion();
if (!isset($_POST['login']) && !isset($_POST['mail']) && !isset($_POST['password'])){

    $sql = "INSERT INTO `user`(`login`, `mail`, `password`) VALUES ('" . $_POST['login'] . "', '" . $_POST['mail'] . "', '" . $_POST['password'] . "')";
    $conn->query($sql);
}
$conn = null;
?>

<?php include('header.php'); ?>
<form name="signup" method="post" action="index.php">

<input name="login" type="text" placeholder="Login" /></br>
<input name="mail" type="email" placeholder="Mail address"/></br> 
<input name="password" type="password" placeholder="Password" /></br>
<input name="submit" type="submit" value="Sign up">

</form>
<?php include('footer.php'); ?>