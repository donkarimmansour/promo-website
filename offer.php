<?php

require_once "./includes/function/ini.php";
$pageTitle = "Offer" ;
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php"; 
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";


?>

<main id="MainContent">

    <section class="san-partner">

 <?php



if ((isset($_GET["c"]) && is_numeric($_GET["c"])) && (isset($_GET["o"]) && is_numeric($_GET["o"]))) {
    $caty = filter_var($_GET["c"], FILTER_SANITIZE_NUMBER_INT);
    $o = filter_var($_GET["o"], FILTER_SANITIZE_NUMBER_INT);
    $type = $o;
    if($o == 1) {$o = "header";} else if ($o == 2) {$o = "main";} else if ($o == 3) {$o = "small";};


    if ((isset($_GET["id"]) && is_numeric($_GET["id"]))) {
        $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

            $offers = $db->prepare("SELECT * FROM tbl_{$o}_offers WHERE  clm_status = 'publish'  AND clm_id = ?");
            $offers->execute(array($id));
            $offerFetch = $offers->fetch();
            $offerCount = $offers->rowCount();

            if ($offerCount > 0) {
                
                $count = $db->prepare("UPDATE tbl_{$o}_offers SET clm_count = clm_count +1 WHERE clm_id = ?");
                $count->execute(array($id));
        ?>

		<!-- start san-highlight -->

		<div class="san-highlight">
			<div class="highlight-left expandable">
				<div class="highlight-content">
					<div class="highlight-branding">
						<div class="logo-container partner-logo">

							
								<img class=" lazyloaded" alt="<?php echo $offerFetch['clm_name'] ; ?>" src="<?php echo "{$image}{$offer}{$offerFetch['clm_logo']}" ; ?>">


						</div>
						<div class="partner-header">
							<h1 class="title ">&nbsp;<?php echo $offerFetch['clm_name'] ; ?></h1>
						</div>
					</div>
					<div class="expandable-partner-description">
						<p class="partner-description ">

                        <?php

                            $clm_description = $offerFetch["clm_description"];

                            if (strlen($clm_description) < 150) {
                                echo $clm_description;
                            } else {
                                echo substr($clm_description, 0, 150) . "..";
                            }

                            ?>
						</p>
						<span class="read-more" onclick="$('.expandable').toggleClass('expanded'); $(this).text() === 'Read more' ? $(this).text('Read less') : $(this).text('Read more')" style="color: #2d2d50;font-weight: 900;">Read more</span>
					</div>
				</div>
			</div>
			<div class="highlight-right">


					<img alt="<?php echo $offerFetch['clm_name'] ; ?>" src="<?php echo "{$image}{$offer}{$offerFetch['clm_image']}" ; ?>">


			</div>
		</div>
		<!-- end san-highlight -->

      
    
            <!-- start partner-offers -->
            <div class="partner-offers" style="max-width: 900px;margin: 24px auto;">
                <div class="post-container">
                    <div class="benefits-container">
    
    
                        <article class="benefit" >
                            <div class="benefit-content">
                                <span class="benefit-label">
                                 <?php if($offerFetch['clm_in'] == "instore"){ echo 'In-store' ;}else{echo 'Online' ;}?>  </span>
                                <h2 class="benefit-header">
                                    Offer</h2>
                                <div class="benefit-body">
                                    <?php echo $offerFetch['clm_offername'] ; ?>
                                </div>
                            </div>
                            <div class="cta-container">
                                <a class="call-to-action" 
                                  href="<?php if(!isset($_SESSION['user_u_id'])){ echo "login.php" ; }else{ echo "copon.php?id={$offerFetch['clm_id']}&o={$type}" ; } ?>"
                                   aria-label="<?php echo $offerFetch['clm_name'] ; ?>">
                                    <text>
                                        Get now</text>
                                </a>
                            </div>
                        </article>
    
                            <article class="benefit benefit-filler"></article>
                            <article class="benefit benefit-filler"></article>
                            <article class="benefit benefit-filler"></article>
                  
    
                    </div>
                </div>
            </div>
            <!-- end partner-offersr -->
            <?php
                
                  }

        } 

        


			$main_offerss = $db->prepare("SELECT * FROM tbl_main_offers WHERE  clm_status = 'publish'  AND clm_parent = ? AND (`clm_limited` = 'no' OR clm_date > NOW()) LIMIT 6");
			$main_offerss->execute(array($caty));
			$main_offers = $main_offerss->fetchall();
			$main_count = $main_offerss->rowCount();


            if ($main_count > 0) {

        ?>

                <div class="scroller" >

                    <!-- start scroller group -->
                    <h2 class="title pull-left">
                        Boosted Offers!
                        <a href="main.php?id=<?php echo $caty ; ?>" title="View All" class="pull-right">View all <i class="fas fa-arrow-right"></i></a>
                    </h2>

                    <div class="tile__group" >

                        <?php
                        foreach ($main_offers as $main_offer) {
                            if ($main_offer["clm_style"] == "full") { ?>
                                <article class="tile custom tile-onebytwo" style="background-image: url('<?php echo "{$image}{$offer}{$main_offer['clm_image']}" ; ?>');">
                                    <a class="content" href="<?php if($main_offer["clm_type"] == "link"){ echo $main_offer["clm_link"]; }else{ echo  "offer.php?id={$main_offer["clm_id"]}&o={$main_offer["tbl_name"]}&c={$main_offer["clm_parent"]}"; }?>" aria-label="<?php echo $main_offer["clm_name"]; ?>"></a>
                                </article>

                            <?php
                            } else { ?>

                                <article class="tile tile-onebytwo">
                                <a href="<?php if($main_offer["clm_type"] == "link"){ echo $main_offer["clm_link"]; }else{ echo  "offer.php?id={$main_offer["clm_id"]}&o={$main_offer["tbl_name"]}&c={$main_offer["clm_parent"]}"; }?>" aria-label="<?php echo "{$main_offer['clm_name']}" ; ?>">
                                    <div class="tile__hero">

                                            <img class=" lazyloaded"  alt="<?php echo $main_offer['clm_name'] ; ?>" src="<?php echo "{$image}{$offer}{$main_offer['clm_image']}" ; ?>">
                                    </div>
                                    <div class="tile__inner">
                                        <?php if($main_offer["clm_limited"] == "yes") { echo '<p class="tile__flag">Limited time only!</p>' ;} ?>
                                          
                                        <div class="tile__logo">
                                                <img style="max-width: 150px;" class="c-perk-logo -secondary lazyloaded"  alt="<?php echo $main_offer['clm_name'] ; ?>" src="<?php echo "{$image}{$offer}{$main_offer['clm_logo']}" ; ?>">
                                        </div>
                                        <p class="tile__discount"><?php echo $main_offer['clm_name'] ; ?></p>
                                    </div>
                                </a>
                            </article>
                            
                    

                        <?php } }
                        ?>


                    </div>
                </div>
                <!-- end scroller group -->

        <?php
            }
        ?>

<?php

            $small_offerss = $db->prepare("SELECT * FROM tbl_small_offers WHERE  clm_status = 'publish'  AND clm_parent = ? AND (`clm_limited` = 'no' OR clm_date > NOW()) LIMIT 6");
			$small_offerss->execute(array($caty));
			$small_offers = $small_offerss->fetchall();
			$small_count = $small_offerss->rowCount();

            if ($small_count > 0) {

        ?>

        <!-- start scroller list -->
        <div class="scroller" >
		   <!-- start scroller group -->
               <h2 class="title pull-left">
                        Boosted Offers!
                        <a href="small.php?id=<?php echo $caty ; ?>" title="View All" class="pull-right">View all <i class="fas fa-arrow-right"></i></a>
                    </h2>


            <div class="tile__scroll-onebyone">
                <div class="tile__scroll">

                <?php foreach ($small_offers as $small_offer) { ?>
                    <article class="tile tile-onebyone" >
                        <a href="<?php if($small_offer["clm_type"] == "link"){ echo $small_offer["clm_link"]; }else{ echo  "offer.php?id={$main_offer["clm_id"]}&o={$main_offer["tbl_name"]}&c={$main_offer["clm_parent"]}"; }?>" aria-label="<?php echo $main_offer["clm_name"]; ?>">
                            <div class="tile__inner">
                            <?php if($small_offer["clm_limited"] == "yes") { echo '<p class="tile__flag">Limited time only!</p>' ;} ?>
                                <div class="tile__logo">
                                        <img class="c-perk-logo -secondary lazyloaded"   alt="<?php echo $small_offer['clm_name'] ; ?>" src="<?php echo "{$image}{$offer}{$small_offer['clm_logo']}" ; ?>">

                                </div>
                                <p class="tile__discount"><?php echo $small_offer["clm_name"];  ?></p>
                            </div>
                        </a>
                    </article>

                    <?php } 
                        ?>
                       
                </div>
            </div>

        </div>
        <!-- end scroller list -->

        <?php
            }
        }
        ?>






    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
ob_end_flush()
?>