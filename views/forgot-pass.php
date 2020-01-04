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
                    Forgotten password
                </h1>  
            </div>
        </div>
    </section>

    <div class="notification">
        <form name="forgotPass" method="post" action="/forgot-pass">
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input name="mail" class="input" type="email" placeholder="Mail address"/>
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </p>
            </div>
            
            <div class="field">
                <p class="control">
                    <input name="submit" type="submit" class="button is-success" value="Send">
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