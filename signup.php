<?php

require_once "./includes/function/ini.php";
$pageTitle = "SignUp";
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php";
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";



?>


<main id="MainContent">



    <section id="AP_Register" >
        <section class="studAnon">
            <p class="wayf-preamble">Students! Register now to get free, exclusive offers from your favorite brands. Seriously, what are you waiting for?</p>
            <p class="wayf-preamble" id="serror" style="color:red;display: none;"></p>

            <form  method="post" id="signup">
                <fieldset>
                    <div class="field" style="text-align: left;">
                       <label for="sname">Name</label>
                        <input type="text" id="sname" name="sname" maxlength="255" placeholder="Name">
                        <small style="color:red;display: none;"></small>
                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="spersonalemail">Personal email address</label>
                        <input type="text" id="spersonalemail" name="spersonalemail" maxlength="255" placeholder="Personal email address">
                        <small style="color:red;display: none;"></small>

                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="sinstitutionemail">university or institution email</label>
                        <input type="text" id="sinstitutionemail" name="sinstitutionemail" maxlength="255" placeholder="university or institution email">
                        <small style="color:red;display: none;"></small>

                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="sphonenumber">phone number</label>
                        <input type="tel" id="sphonenumber" name="sphonenumber" maxlength="255" placeholder="phone number">
                        <small style="color:red;display: none;"></small>
                    </div>

                    <input type="hidden" name="type" value="signup">

                </fieldset>
                <button type="submit" id="btn_signup" disabled><span class="button-join-text">Join now</span></button>
                <p class="tertiary agreement">By tapping ‘Join now’, you agree to the <a href="info.php#terms" 
                class="new-window-candidate" target="">Terms of Service</a>, have read and understood the 
                <a href="info.php#privacy" class="new-window-candidate" data-track="join-privacy-account" target="">
                    Privacy Policy</a> and <a href="info.php##cookie" class="new-window-candidate" 
                   target="">Cookie Policy</a>
                 and confirm that you are 16 years of age or older.</p>
            </form>
            <footer>
                <span class="hidden">Already a member?</span>
                <button class="js-log-in tertiary"><a href="login.php"><span class="button-login-text">Log in</span></a></button>
            </footer>
        </section>
    
    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
?>