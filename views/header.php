<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico?">
        <title>Camagru</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <link href="/views/all.css" rel="stylesheet">
    </head>
    <body style="height: 100vh;">
        <nav class="navbar" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="/">
              <?php require $root . '/logo.html'; ?>
            </a>
        
            <a role="button" id="troisbarres" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>
        
          <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item" href="/mounting">Home</a>
              <a class="navbar-item" href="/gallery?page=1">Gallery</a>
            </div>
        
        <?php if ($auth == false){?>
            <div class="navbar-end">
              <div class="navbar-item">
                <div class="buttons">
                  <a class="button is-primary" href="/sign-up">
                    <strong>Sign up</strong>
                  </a>
                  <a class="button is-light" href="/sign-in">
                    Log in
                  </a>
                </div>
              </div>
            </div>
        <?php } ?>
        
        <?php if ($auth == true){?>
            <div class="navbar-end">
              <div class="navbar-item">
                <div class="buttons">
                  <a class="button is-primary" href="/my-account">
                    <strong>My Account</strong>
                  </a>
                  <a class="button is-light" href="/sign-out">
                    Sign out
                  </a>
                </div>
              </div>
            </div>
        <?php } ?>
        
          </div>
        </nav>

<?php if (isset($_SESSION['messInfo']) && !empty($_SESSION['messInfo'])) { ?>

  <div class="notification is-primary">
    <p><?php echo $_SESSION['messInfo'];
        unset($_SESSION['messInfo']); ?></p>
  </div>

<?php } ?>

<script>

document.addEventListener('DOMContentLoaded', () => {
	$target = document.getElementById("troisbarres");
	$target.addEventListener('click', () => {
		$target.classList.toggle('is-active');
		document.getElementById("navbarBasicExample").classList.toggle('is-active');
	});
});

</script>