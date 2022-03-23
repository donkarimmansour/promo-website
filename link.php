
<?php

require_once "./includes/function/ini.php";
$pageTitle = "All" ;
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php"; 
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";



?>


<main id="MainContent">

    <!-- start filter -->
    <div class="filter-sort">
        <div class="catcher hidden" aria-hidden="true"></div>
        <div class="filter-sort__container hidden" role="dialog" aria-label="Filter" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <fieldset>
                <legend>Sort</legend>
                <ul class="filter-sort__sort-options">
                    <li>
                        <input type="radio" id="rbTrending" name="sort" value="Trending" class="radio-after" />
                        <label for="rbTrending">Trending</label>
                    </li>
                    <li>
                        <input type="radio" id="sdate" name="sort" value="Date" class="radio-after" />
                        <label for="sdate">Date</label>
                    </li>
                    <li>
                        <input type="radio" id="rbAZ" name="sort" value="AtoZ" class="radio-after" />
                        <label for="rbAZ">A-Z</label>
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
            
    
            $linkss = $db->prepare("SELECT * FROM tbl_links WHERE  clm_status = 'publish'  AND clm_parent = ? {$sort};");

                $linkss->execute(array($id));
                $links = $linkss->fetchall();
                $counts = $linkss->rowCount();
            if ($counts > 0) {

             

        ?>


        <!-- start scroller list -->
                <div class="scroller">

         <div class="tile__group">


                <?php foreach ($links as $link) { ?>
                    <article class="tile custom tile-twobyone " style="margin: 10px;max-width: 100%;">
                        <a class="content" href="<?php echo $link["clm_link"];  ?>"  style="background-image: url(<?php echo "{$image}{$llink}{$link['clm_image']}" ; ?>);"></a>
                    </article>
                <?php } 
                    ?>

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
?>