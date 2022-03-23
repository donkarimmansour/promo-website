<?php
require_once "./includes/function/ini.php";
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php"; 


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $key = filter_var($_POST["key"], FILTER_SANITIZE_STRING);

    $search = $db->prepare("SELECT tbl_header_offers.clm_id , tbl_header_offers.tbl_name , tbl_header_offers.clm_name , tbl_header_offers.clm_parent , tbl_header_offers.clm_status ,
             tbl_header_offers.clm_image , tbl_header_offers.clm_logo , tbl_header_offers.clm_limited , tbl_header_offers.clm_date , tbl_header_offers.clm_count , tbl_header_offers.clm_type , tbl_header_offers.clm_link 
            FROM tbl_header_offers  
            WHERE  clm_status = 'publish'  AND clm_name LIKE '%{$key}%'  UNION
            SELECT tbl_main_offers.clm_id , tbl_main_offers.tbl_name  , tbl_main_offers.clm_name , tbl_main_offers.clm_parent , tbl_main_offers.clm_status ,
            tbl_main_offers.clm_image , tbl_main_offers.clm_logo , tbl_main_offers.clm_limited , tbl_main_offers.clm_date , tbl_main_offers.clm_count , tbl_main_offers.clm_type , tbl_main_offers.clm_link 
            FROM  tbl_main_offers  
            WHERE  clm_status = 'publish'  AND clm_name LIKE '%{$key}%'  UNION
            SELECT tbl_small_offers.clm_id , tbl_small_offers.tbl_name , tbl_small_offers.clm_name , 
            tbl_small_offers.clm_parent , tbl_small_offers.clm_status ,
            tbl_small_offers.clm_image , tbl_small_offers.clm_logo , tbl_small_offers.clm_limited , tbl_small_offers.clm_date , tbl_small_offers.clm_count , tbl_small_offers.clm_type , tbl_small_offers.clm_link 
            FROM tbl_small_offers
            WHERE  clm_status = 'publish'  AND clm_name LIKE '%{$key}%' ");

            $search->execute(array());
            $search_offers = $search->fetchall();
 
            echo "<ul>" ;

            foreach ($search_offers as $search_offer) { ?>
							
                <li class="ac_even primary perk-result ac_over">
                  <a href="<?php if($search_offer["clm_type"] == "link"){ echo $search_offer["clm_link"]; }else{ echo  "offer.php?id={$search_offer["clm_id"]}&o={$search_offer["tbl_name"]}&c={$search_offer["clm_parent"]}"; }?>"> 
                      <div class="result-logo-container"><img class="result-logo" alt="<?php echo $search_offer["clm_name"] ; ?>" 
                    src="images/offers/<?php echo $search_offer["clm_image"] ; ?>"></div><span><?php echo $search_offer["clm_name"] ; ?></span>
                    <span class="sub"><?php echo substr($search_offer["clm_name"] , 50)  ; ?></span></a>
                </li>
                
            <?php } 
            echo "</ul>" ;



}


?>