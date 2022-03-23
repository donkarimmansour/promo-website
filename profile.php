<?php

require_once "./includes/function/ini.php";
$pageTitle = "SignUp";
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php";
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";


        
$stmt = $db->prepare("SELECT * FROM  `tbl_users` WHERE `clm_u_id` = ? ");
$stmt->execute(array($_SESSION['user_u_id']));
$fetch = $stmt->fetch();

?>


<main id="MainContent">



    <section id="AP_Register">
        <section class="studAnon">
            <p class="wayf-preamble" id="cerror" style="color:red;display: none;"></p>

            <form  method="post" id="profile">
                <fieldset>
                    <div class="field" style="text-align: left;">
                       <label for="cname">Name</label>
                        <input type="text" id="cname" name="cname" maxlength="255" placeholder="Name" value="<?php echo $fetch['clm_u_username'] ; ?>">
                        <small style="color:red;display: none;"></small>
                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="cpersonalemail">Personal email address</label>
                        <input type="text" id="cpersonalemail" name="cpersonalemail" maxlength="255" placeholder="Personal email address" value="<?php echo $fetch['clm_u_personal'] ; ?>">
                        <small style="color:red;display: none;"></small>

                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="cinstitutionemail">university or institution email</label>
                        <input type="text" id="cinstitutionemail" name="cinstitutionemail" maxlength="255" placeholder="university or institution email" value="<?php echo $fetch['clm_u_email'] ; ?>">
                        <small style="color:red;display: none;"></small>

                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="cphonenumber">phone number</label>
                        <input type="tel" id="cphonenumber" name="cphonenumber" maxlength="255" placeholder="phone number" value="<?php echo $fetch['clm_u_phone'] ; ?>">
                        <small style="color:red;display: none;"></small>
                    </div>
                    <div class="field" style="text-align: left;">
                       <label for="cpassword">password</label>
                        <input type="password" id="cpassword" name="cpassword" maxlength="255" placeholder="password" value="">
                        <input type="hidden" name="oldpassword" value="<?php echo $fetch['clm_u_password'] ; ?>">
                        <small style="color:red;display: none;"></small>
                    </div>

                    <input type="hidden" name="type" value="profile">
                    <input type="hidden" name="user_id" value="<?php echo $fetch['clm_u_id'] ; ?>">

                </fieldset>
                <button type="submit" disabled id="btn_profile"><span class="button-join-text">Change</span></button>
            
            </form>
  
        </section>
    
    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
ob_end_flush();

?>