<?php

require_once "./includes/function/ini.php";
$pageTitle = "All" ;
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
  $limited = "AND `clm_limited` = 'yes'  "  ; 
}



$query = "WHERE  clm_status = 'publish' AND clm_parent = ? AND (`clm_limited` = 'no' OR clm_date > NOW())  {$limited} {$in} " ;


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



    <section id="Page_Index" class=" hasWallpaper">
        <div class="filter-sort__wrapper">
        <i class="fas fa-th-list filter-sort__button"></i>
        </div>

        <div class="spacer"></div>


        <?php if ((isset($_GET["id"]) && is_numeric($_GET["id"]))) {
            $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
      

            $main_offerss = $db->prepare("SELECT tbl_header_offers.clm_id , tbl_header_offers.tbl_name , tbl_header_offers.clm_name , tbl_header_offers.clm_parent , tbl_header_offers.clm_status ,
            tbl_header_offers.clm_image , tbl_header_offers.clm_logo , tbl_header_offers.clm_limited , tbl_header_offers.clm_date , tbl_header_offers.clm_count , tbl_header_offers.clm_type , tbl_header_offers.clm_link 
            , tbl_header_offers.clm_limited as style FROM tbl_header_offers {$query}
            UNION
            SELECT tbl_main_offers.clm_id , tbl_main_offers.tbl_name  , tbl_main_offers.clm_name , tbl_main_offers.clm_parent , tbl_main_offers.clm_status ,
            tbl_main_offers.clm_image , tbl_main_offers.clm_logo , tbl_main_offers.clm_limited , tbl_main_offers.clm_date , tbl_main_offers.clm_count , tbl_main_offers.clm_type , tbl_main_offers.clm_link 
            , tbl_main_offers.clm_style as style FROM  tbl_main_offers {$query}
            UNION
            SELECT tbl_small_offers.clm_id , tbl_small_offers.tbl_name , tbl_small_offers.clm_name , 
            tbl_small_offers.clm_parent , tbl_small_offers.clm_status ,
            tbl_small_offers.clm_image , tbl_small_offers.clm_logo , tbl_small_offers.clm_limited , tbl_small_offers.clm_date , tbl_small_offers.clm_count , tbl_small_offers.clm_type , tbl_small_offers.clm_link 
            ,  tbl_small_offers.clm_limited as style FROM tbl_small_offers {$query}
            {$sort};");
            $main_offerss->execute(array($id,$id,$id));
            $main_offers = $main_offerss->fetchall();
            $main_count = $main_offerss->rowCount();


            if ($main_count > 0) {  ?>

                <div class="scroller">


                    <div class="tile__group">

                      



                  
                    <?php
                        foreach ($main_offers as $main_offer) {
                            if ($main_offer["style"] == "full") { ?>
                                <article class="tile custom tile-onebytwo" style="background-image: url('<?php echo "{$image}{$offer}{$main_offer["clm_image"]}" ; ?>');">
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
        }
        ?>
    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
?>