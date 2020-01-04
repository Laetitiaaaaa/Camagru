<?php include('header.php');?>

<section class="section">

<div class="columns">
    <div class="column is-3"></div>
    <div class="column is-6">

        <div class="container">

            <section class="hero is-dark">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            My Account
                        </h1>
                    </div>
                </div>
            </section>

            <div class="notification">
                <form name="myAccount" method="post" action="/my-account">

                    <div class="columns">
                        <div class="column is-7">
                            <div class="field">
                                <p class="control has-icons-left has-icons-right">
                                    <input name="login" class="input" type="text" value=<?php echo $_SESSION['login']; ?>>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="column is-5">
                            <input name="changeLog" type="submit" class="button is-success" value="Change login">
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-7">
                            <div class="field">
                                <p class="control has-icons-left has-icons-right">
                                    <input name="mail" class="input" type="email" value=<?php echo $_SESSION['mail']; ?>>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="column is-5">
                            <input name="changeMail" type="submit" class="button is-success" value="Change Mail">
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input name="password" class="input" type="password" placeholder="Password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="column is-6"></div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input name="verif" class="input" type="password" placeholder="Verification">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="column is-6">
                            <input name="changePass" type="submit" class="button is-success" value="Change Password">
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-8">
                            <div class="field">
                                <div class="control">
                                    <div class="select is-primary">
                                        <select name="preference">
                                            <option value="yes" <?php if ($_SESSION['pref'] == 'yes' || empty($_SESSION['pref'])){echo 'selected';} ?>>Yes, I prefer to receive an email when someone comments one of my pictures.</option>
                                            <option value="no" <?php if ($_SESSION['pref'] == 'no') {echo 'selected';} ?>>No, I prefer not to receive an email when someone comments one of my pictures.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column is-4">
                            <input name="pref" type="submit" class="button is-success" value="Change">
                        </div>
                    </div>

                </form>
            </div>
        
        </div>

    </div>
    <div class="column is-3"></div>
</div>

</section>


<?php include('footer.php'); ?>