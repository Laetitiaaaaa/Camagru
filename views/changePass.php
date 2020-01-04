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
                                Change password
                            </h1>
                        </div>
                    </div>
                </section>

                <div class="notification">
                    <form name="changePass" method="post" action="/change-pass">
        
                        <input name ="log" type="hidden" value="<?php echo $_GET['log'] ?>"/>
                        <input name ="n" type="hidden" value="<?php echo $_GET['n'] ?>"/>

                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input name="password" class="input" type="password" placeholder="New password"/></br> 
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <input name="verif" class="input" type="password" placeholder="Verification"/></br> 
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control">
                                <input name="submit" type="submit" class="button is-success" value="Change"></br>      
                            </p>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    <div class="column is-3"></div>
</div>

</section>







<!-- <h2>Change password</h2>

<form name="changePass" method="post" action="/change-pass">

<input name ="log" type="hidden" value="<?php echo $_GET['log'] ?>"/>
<input name ="n" type="hidden" value="<?php echo $_GET['n'] ?>"/>
<input name="password" type="password" placeholder="New password"/></br> 
<input name="verif" type="password" placeholder="Verification"/></br> 
<input name="submit" type="submit" value="Change"></br>

</form> -->

<?php include('footer.php'); ?>