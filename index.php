<?php

require_once "./includes/function/ini.php";
$pageTitle = "home" ;
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php"; 
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";





$in = "" ;
if(isset($_GET["in"]) &&  strpos($_GET["in"]  , 'inon') === false){
     if(strpos($_GET["in"]  , 'on') !== false){
        $in = "AND `clm_in` = 'online' "  ; 
    }else if(strpos($_GET["in"]  , 'in') !== false){
        $in = "AND `clm_in` = 'instore'  "  ; 
    }
}

$limited = "" ;
if(isset($_GET["limited"]) && $_GET["limited"] == "yes" ){
  $limited = "AND `clm_limited` = 'yes' "  ; 
}



$query = "WHERE  clm_status = 'publish' AND clm_parent = 0 AND (`clm_limited` = 'no' OR clm_date > NOW()) {$limited} {$in} " ;
;

$sort = 'ORDER BY  clm_id DESC' ;
if (isset($_GET["sort"])) {
    $sort = filter_var($_GET["sort"], FILTER_SANITIZE_STRING);
    if($sort == "t"){
        $sort = 'ORDER BY  clm_count DESC' ;
    }else if($sort == "d"){
        $sort = 'ORDER BY  clm_date ASC' ;
    }else if($sort == "a"){
        $sort = 'ORDER BY  clm_name ASC' ;
    }else{
        $sort = 'ORDER BY  clm_id DESC' ;
    }
}

?>


<main id="MainContent">


    <!-- start filter -->
    <div class="filter-sort" id="search_all">
        <div class="catcher hidden" aria-hidden="true"></div>
        <div class="filter-sort__container hidden" role="dialog" aria-label="Filter" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">


        <fieldset>
                <legend>Sort</legend>
                <ul class="filter-sort__sort-options">
                     <li>
                        <input type="radio" id="slast" name="sort" value="last" class="radio-after" <?php   if( !isset($_GET["sort"]) || $_GET["sort"] == "n") echo "checked" ; ?>/>
                        <label for="slast">Last</label>
                    </li>

                    <li>
                        <input type="radio" id="rbTrending" name="sort" value="Trending" class="radio-after" <?php   if( isset($_GET["sort"]) &&  $_GET["sort"] == "t") echo "checked" ; ?> />
                        <label for="rbTrending">Trending</label>
                    </li>
                
                    <li>
                        <input type="radio" id="sdate" name="sort" value="Date" class="radio-after" <?php   if( isset($_GET["sort"]) &&  $_GET["sort"] == "d") echo "checked" ; ?>/>
                        <label for="sdate">Ending soon</label>
                    </li>
                    <li>
                        <input type="radio" id="rbAZ" name="sort" value="AtoZ" class="radio-after" <?php   if( isset($_GET["sort"]) &&  $_GET["sort"] == "a") echo "checked" ; ?>/>
                        <label for="rbAZ">A-Z</label>
                    </li>
                </ul>
            </fieldset>
            
            <fieldset>
            <legend>Filter</legend>
                <ul class="filter-sort__filter-options">
                    <li>
                        <label for="showOnline" class="">Online</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="showOnline"  class="onoffswitch-checkbox" id="showOnline" <?php   if( isset($_GET["in"]) &&  (strpos($_GET["in"]  , 'on') !== false) ) echo "checked" ; ?>>
                            <div class="onoffswitch-label">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="showInStore">In-store</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="showInStore" class="onoffswitch-checkbox" id="showInStore" <?php   if( isset($_GET["in"]) &&  (strpos($_GET["in"]  , 'in') !== false) ) echo "checked" ; ?> >
                            <div class="onoffswitch-label">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="showLimited">Limited</label>
                        <div class="onoffswitch">
                          <input type="checkbox" name="showLimited" class="onoffswitch-checkbox" id="showLimited" <?php   if( isset($_GET["limited"]) &&  $_GET["limited"] == 'yes' ) echo "checked" ; ?>>

                            <div class="onoffswitch-label">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                            </div>
                        </div>
                    </li>
                </ul>
                </fieldset>



            <div class="filter-button-container">
                <button class="button primary filter-sort__apply">Apply</button>
                <button class="button tertiary filter-sort__reset">Reset</button>
            </div>
        </div>
    </div>



	<section id="Page_Index" class="hasWallpaper">
         <div class="filter-sort__wrapper">
         <i class="fas fa-th-list filter-sort__button"></i>
        </div>
   
        <div class="spacer"></div> 


	
 
	<?php
        $header_offerss = $db->prepare("SELECT * FROM tbl_header_offers {$query} {$sort}");
		$header_offerss->execute();
		$header_offers = $header_offerss->fetchall();
		$header_count = $header_offerss->rowCount();


        if ($header_count > 0) {

                

        ?>
                <!-- start scroller hero -->
                <div class="scroller scroller-hero highlight-ads">
                    <div class="">
                        <div class="highlight-scroll heroSlides" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                      
                            <?php
                            
                            foreach ($header_offers as $key => $header_offer) {
								$o = $header_offer["tbl_name"] ;
								$id = $header_offer["clm_id"] ;
								$c = $header_offer["clm_parent"] ;
                            ?>

                                <article class="slide <?php if ($key == 0) {
                                                            echo "sildeActive";
                                                        } else {
                                                            echo "sildeUnActive";
                                                        } ?>">
                                    <div class="san-highlight">
                                        <div class="highlight-left">
                                            <div class="highlight-content">
                                                <div class="highlight-branding">
                                                    <div class="logo-container partner-logo">
                                                        <a href="<?php if($header_offer["clm_type"] == "link"){ echo $header_offer["clm_link"]; }else{ echo "offer.php?id={$id}&o={$o}&c={$c}"; } ?>" aria-label="<?php echo $header_offer["clm_name"]; ?>" aria-label="<?php echo $header_offer["clm_name"] ; ?>">
        
                                                                <img class="ls-is-cached lazyloaded" alt="<?php echo $header_offer["clm_name"] ; ?>" src="<?php echo "{$image}{$offer}{$header_offer['clm_logo']}" ; ?>">

                                                        </a>
                                                    </div>
                                                    <div class="ad-indicator">Ad</div>
                                                </div>
                                                <div class="highlight-headline"><?php echo $header_offer["clm_name"]; ?></div>
                                                <div class="highlight-body"><?php echo substr($header_offer["clm_description"] , 0 , 200)."..." ; ?> </div>
                                                <a class="call-to-action" href="<?php if($header_offer["clm_type"] == "link"){ echo $header_offer["clm_link"]; }else{ echo "offer.php?id={$id}&o={$o}&c={$c}"; } ?>" aria-label="<?php echo $header_offer["clm_name"]; ?>">Get now</a>
                                            </div>
                                        </div>
                                        <div class="highlight-right">

                                         <img class=" ls-is-cached lazyloaded" alt="<?php echo $header_offer["clm_name"] ; ?>" src="<?php echo "{$image}{$offer}{$header_offer['clm_image']}" ; ?>">


                                        </div>
                                    </div>
                                </article>


                            <?php  }
                            ?>

                            <button type="button" class="showcase__scroll-prev ud-icon" title="Previous"><i class="fas fa-arrow-left"></i></button>
                            <button type="button" class="showcase__scroll-next ud-icon" title="Next"><i class="fas fa-arrow-right"></i></button>
                        </div>
                        <ul class="hero__navigation">

                          <?php  foreach ($header_offers as $key => $header_offer) { ?>
                            <li aria-label="<?php echo $header_offer["clm_name"]; ?>" class="<?php if ($key == 0) {echo "active";} ?>"></li>

                          <?php }?>

                        </ul>
                    </div>
                </div>
                <!-- end scroller hero -->

        <?php
            
        }
        ?>

	     <?php

			$main_offerss = $db->prepare("SELECT * FROM tbl_main_offers  {$query} {$sort}");
			$main_offerss->execute();
			$main_offers = $main_offerss->fetchall();
			$main_count = $main_offerss->rowCount();


            if ($main_count > 0) {

        ?>

                <div class="scroller" >
                <!-- start scroller group -->
                <h2 class="title pull-left">
                        Boosted Offers!
                        <a href="main.php?id=0" title="View All" class="pull-right">View all <i class="fas fa-arrow-right"></i></a>
                    </h2>


                    <div class="tile__group" >

                        <?php
                        foreach ($main_offers as $main_offer) {
                            if ($main_offer["clm_style"] == "full") { ?>
                                <article class="tile custom tile-onebytwo" style="background-image: url('<?php echo "{$image}{$offer}{$main_offer['clm_image']}" ; ?>');">
                                    <a class="content" href="href="<?php if($main_offer["clm_type"] == "link"){ echo $main_offer["clm_link"]; }else{ echo  "offer.php?id={$main_offer["clm_id"]}&o={$main_offer["tbl_name"]}&c={$main_offer["clm_parent"]}"; }?>" aria-label="<?php echo $main_offer["clm_name"]; ?>"></a>
                                </article>

                            <?php
                            } else { ?>
                                <article class="tile tile-onebytwo">
                                <a href="<?php if($main_offer["clm_type"] == "link"){ echo $main_offer["clm_link"]; }else{ echo  "offer.php?id={$main_offer["clm_id"]}&o={$main_offer["tbl_name"]}&c={$main_offer["clm_parent"]}"; }?>" 
                                aria-label="<?php echo "{$main_offer['clm_name']}" ; ?>">
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

            $small_offerss = $db->prepare("SELECT * FROM tbl_small_offers  {$query} {$sort}");
			$small_offerss->execute();
			$small_offers = $small_offerss->fetchall();
			$small_count = $small_offerss->rowCount();

            if ($small_count > 0) {

        ?>

        <!-- start scroller list -->
        <div class="scroller" >
			   <!-- start scroller group -->
               <h2 class="title pull-left">
                        Boosted Offers!
                        <a href="small.php?id=0" title="View All" class="pull-right">View all <i class="fas fa-arrow-right"></i></a>
                    </h2>

            <div class="tile__scroll-onebyone">
                <div class="tile__scroll">

                <?php foreach ($small_offers as $small_offer) { ?>
                    <article class="tile tile-onebyone" >
                        <a href="<?php if($small_offer["clm_type"] == "link"){ echo $small_offer["clm_link"]; }else{ echo "offer.php?id={$small_offer["clm_id"]}&o={$small_offer["tbl_name"]}&c={$small_offer["clm_parent"]}"; } ?>" aria-label="<?php echo $small_offer["clm_name"]; ?>">
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
        ?>


        <?php

			$linkss = $db->prepare("SELECT * FROM tbl_links WHERE  clm_status = 'publish'  AND clm_parent = 0");
			$linkss->execute();
			$links = $linkss->fetchall();
			$counts = $linkss->rowCount();
            if ($counts > 0) {

            ?>


        <!-- start scroller list -->
        <div class="scroller">
         	   <!-- start scroller group -->
                <h2 class="title pull-left">
                        Boosted Offers!
                        <a href="link.php?id=0" title="View All" class="pull-right">View all <i class="fas fa-arrow-right"></i></a>
                    </h2>


            <div class="tile__scroll-twobyone">
                <div class="tile__scroll">

                <?php foreach ($links as $link) { ?>
                    <article class="tile custom tile-twobyone " >
                        <a class="content" href="<?php echo $link["clm_link"];  ?>"  style="background-image: url(<?php echo "{$image}{$llink}{$link['clm_image']}" ; ?>);"></a>
                    </article>
                <?php } 
                    ?>

                </div>
            </div>
        </div>
        <!-- end scroller list -->

        <?php
            }

        ?>


	</section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
?>