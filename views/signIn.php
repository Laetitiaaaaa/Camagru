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
                                Sign in
                            </h1>
                        </div>
                    </div>
                </section>

                <div class="notification">
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
                            <a href="/forgot-pass">Forgot your password ?</a>
                        </div>

                        <div class="field">
                            <p class="control">
                                <input name="submit" type="submit" class="button is-success" value="Sign in"></br>      
                            </p>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    <div class="column is-3"></div>
</div>

</section>

<?php include('footer.php'); ?>