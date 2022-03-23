<?php

require_once "./includes/function/ini.php";
$pageTitle = "coupon";
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php";
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";


?>


<main id="MainContent" class="bg-secondary" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

 
  
    <section id="Page_Partner_Access_meshki_online">
        <div class="content-wrapper">
            <div class="content">


                <?php
            if( (isset($_GET["id"]) && is_numeric($_GET["id"])) && (isset($_GET["o"]) && is_numeric($_GET["o"]))){

                $o =  filter_var($_GET["o"], FILTER_SANITIZE_NUMBER_INT);
                $id =  filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

                if($o == 1) {$o = "header";} else if ($o == 2) {$o = "main";} else if ($o == 3) {$o = "small";};

                $oos = $db->prepare("SELECT * FROM tbl_{$o}_offers WHERE  clm_status = 'publish'  AND clm_id = ?");
                $oos->execute(array($id));
                $ooFetch = $oos->fetch();
                $ooCount = $oos->rowCount();


                if ($ooCount > 0) {

    
                ?>


                    <div class="details">
                        <div class="details-wrapper">
                            <div class="perk-text">
                                <p><?php echo $ooFetch['clm_offername'] ; ?></p>
                            </div>
                        </div>
                        <div class="loading hidden">
                            <div class="loader">
                                <svg class="circular" viewBox="25 25 50 50">
                                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
                                </svg>
                            </div>
                        </div>
                        <div class="codeBased">
                            <div class="redeemArea">
                                <div class="revealCode hidden">
                                    <form>
                                        <fieldset class="inner">
                                            <p class="getCodeMessageDefault">Reveal your code </p>
                                            <button class="button highlight">
                                                <span>Reveal code</span>
                                            </button>
                                        </fieldset>
                                    </form>
                                </div>
                                <br>
                                <div class="newCode">
                                        <fieldset class="c-copy">
                                            <div class="field">
                                                <input type="text" class="code toCopy" id="copy" value="<?php echo $ooFetch['clm_coupon'] ; ?>">
                                                
                                                <button class="copy button quarternary" id="btncopy">
                                                    <span>Copy</span>
                                                </button>
                                            </div>
                                            <br>
                                            <div class="field">
                                                <input type="text" class="code toCopy" id="gen" value="********">
                                                <button class="copy button quarternary" id="btngen">
                                                    <span>Copy</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                </div>

                                <div class="getNewCode" >
                                    <button class="getNewCode button secondary" >
                                       <span>Get new code</span>
                                    </button>
                                    <p class="new-code-timer"><?php echo $ooFetch['clm_date'] ; ?></p>
                                </div>

                            </div>
                        </div>
                        <hr class="terms-seperator">
                        <div class="perk-terms">
                            <div class="perk-terms-inner">
                                <p class="perk-terms-title">Terms &amp; Conditions</p>
                                <div class="perk-key-terms negative">
                                    <ul>
                                        <li>Excludes sale items</li>
                                    </ul>
                                </div>
                                <div class="perk-terms-verbose">Discount cannot be used on sale items and is only valid for ****** verified members online at meshki.com.au. Cannot be used in conjunction with any other offer including subscription coupons and promo codes.</div>
                            </div>
                        </div>
                    </div>

                <?php
                } }
                ?>


            </div>
        </div>
    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
?>