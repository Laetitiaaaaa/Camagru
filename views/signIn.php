<?php include('header.php');?>

<!-- <h2>Sign In</h2>

<form name="signin" method="post" action="/sign-in">

<input name="login" type="text" placeholder="Login"/></br>
<input name="password" type="password" placeholder="Password"/></br>
<input name="submit" type="submit" value="Sign in"></br>
<a href="/forgot-pass">Forgot your password ?</a>

</form> -->
<form name="signin" method="post" action="/sign-in">

<div class="field">
  <p class="control has-icons-left has-icons-right">
    <input name="login" class="input" type="text" placeholder="Login">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control has-icons-left">
    <input name="password" class="input" type="password" placeholder="Password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control">
    <input name="submit" type="submit" class="button is-primary" value="Sign in"></br>      
  </p>
</div>
</form>



<?php include('footer.php'); ?>