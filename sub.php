<?php

require_once "./includes/function/ini.php";
$pageTitle = "Sub" ;
require_once "{$incDir}{$incFun}connect.php";
require_once "{$incDir}{$incFun}function.php"; 
require_once "{$incDir}{$incTemp}header.php";
require_once "{$incDir}{$incTemp}navbar.php";


?>

<main id="MainContent">

    <section class="san-partner">

    
<div class="scroller">

    


<!-- end scroller group -->


       <?php  if( isset($_GET["id"]) && is_numeric($_GET["id"])){ 
           
           $subcaty = $db->prepare("SELECT * FROM tbl_categories WHERE  clm_id != 0 AND clm_status = 'publish' AND clm_place = 'website' AND clm_parent = ?");
            $subcaty->execute(array($_GET["id"]));
            $subcaty = $subcaty->fetchall();  
            
            if (!empty($subcaty)) {
							               
                foreach ($subcaty as $sub) { ?>
                    
                    <h2 class="title pull-left">
                        <?php echo $sub["clm_name"] ; ?>
                        <a href="category.php?id=<?php echo $sub["clm_id"] ; ?>" title="View All" class="pull-right">View all <i class="fas fa-arrow-right"></i></a>
                    </h2>
               <?php }
            }
            ?>



</div>


        <?php }?>
    </section>

</main>

<?php
require_once "{$incDir}{$incTemp}footer.php";
ob_end_flush()
?>