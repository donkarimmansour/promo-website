<?php

require_once "./includes/function/ini.php";
$pageTitle = "Forgot Password" ;
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php"; 
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";



?>


<main id="MainContent">



    <section id="AP_Register">
        <h1 class="title ">Reset password</h1>
        <p class="wayf-preamble" id="ferror" style="color:red;display: none;"></p>

        <form  method="post" id="forgot">
            <fieldset>
                   <div class="field" style="text-align: left;">
                       <label for="finstitutionemail">university or institution email</label>
                        <input type="text" id="finstitutionemail" name="finstitutionemail" maxlength="255" placeholder="university or institution email">
                        <small style="color:red;display: none;"></small>

                    </div>
            </fieldset>
            <input type="hidden" name="type" value="forgot">

            <button type="submit"><span>Send reset email</span></button>
        </form>
        <button disabled class="js-log-in secondary"><a href="login.php"><span>Log in</span></a></button>
    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
?>