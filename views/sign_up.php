<?php include('header.php');?>

<section class="section">
    <div class="container" style="width:40%;">

        <section class="hero is-dark">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Sign up
                    </h1>
                </div>
            </div>
        </section>

        <div class="notification">
            <form name="signup" method="post" action="/sign-up">

                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input name="login" class="input" type="text" placeholder="Login">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input name="mail" class="input" type="email" placeholder="Email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
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
                    Already registered ? <a href="/sign-in">Sign In</a>
                </div>

                <div class="field">
                    <p class="control">
                        <input name="submit" type="submit" class="button is-success" value="Sign up"></br>      
                    </p>
                </div>
            </form>
        </div>
        
    </div>
</section>


<?php include('footer.php'); ?>