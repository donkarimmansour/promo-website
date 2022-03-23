
<?php

require_once "./includes/function/ini.php";
$pageTitle = "Login" ;
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php"; 
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";

?>


<main id="MainContent">



     
    <section id="AP_Register">
        <h1 class="title ">Log in</h1>
        <section class="studAnon">
        <p class="wayf-preamble" id="lerror" style="color:red;display: none;"></p>

            <form  method="post" id="login">
                <fieldset>
                <div class="field" style="text-align: left;">
                       <label for="linstitutionemail">university or institution email</label>
                        <input type="text" id="linstitutionemail" name="linstitutionemail" maxlength="255" placeholder="university or institution email">
                        <small style="color:red;display: none;"></small>

                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="lpassword">password</label>
                        <input type="password" id="lpassword" name="lpassword" maxlength="255" placeholder="password">
                        <small style="color:red;display: none;"></small>
                    </div>

                    <input type="hidden" name="type" value="login">
                   
                </fieldset>
                <button disabled type="submit" id="btn_login">
                    <span>Log in</span>
                </button>
            </form>
            <button class="js-register secondary"><a href="signup.php"><span>Join now</span></a></button>
            <button class="js-reset-password tertiary"><a href="forgot.php"><span>Forgot your password?</span></a></button>
        </section>
    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
?>