<?php
require_once "../includes/function/ini.php";

$jsDir = "../{$jsDir}";
$cssDir = "../{$cssDir}";

$pageTitle = "Home";
require_once "../{$incDir}{$incFun}connect.php";
require_once "../{$incDir}{$incFun}function.php";
require_once "../{$incDir}{$incTemp}header.php";
require_once "../{$incDir}{$incTemp}navbar.php";

$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
?>


<main id="MainContent">




   <section id="Blog_Index" class="l-blog-page">
      <h1 class="title visually-hidden" data-show-in-header="true">LE BLOG</h1>

      <?php



      $blogss = $db->prepare("SELECT * FROM  tbl_blog WHERE  clm_status = 'publish' AND clm_parent = '{$id}'");
      $blogss->execute();
      $blog_count = $blogss->rowCount();
      $blogs;
      if ($blog_count > 0) {
         $blogs = $blogss->fetchall();
         

      } else {
         $blogss = $db->prepare("SELECT * FROM  tbl_blog WHERE  clm_status = 'publish' ");
         $blogss->execute();
         $blog_count = $blogss->rowCount();
         $blogs = $blogss->fetchall();
      }
      $heads = array_slice($blogs, 0, 3);
      $blogs = array_splice($blogs, 3);

      if ($blog_count > 0) {

      ?>

         <div class="l-blog-container l-blog-slider-container">
            <div class="featured-wrapper">


               <main role="main" class="featured">
                  <div class="c-blog-slider js-blogslider">

                     <span class="left" style="transform: translateX(-60px);"><i class="fas fa-arrow-left"></i></span>
                     <span class="right" style="transform: translateX(60px);"><i class="fas fa-arrow-right"></i></span>

                     <div class="slides" style="transform: translateX(0%);">

                        <?php
                        foreach ($heads as $key => $head) {
                        ?>

                           <article class="slide">
                              <a href="<?php if ($head["clm_type"] == "link") {
                                          echo $head["clm_link"];
                                       } else {
                                          echo "article.php?id={$head["clm_id"]}";
                                       } ?>" aria-label="<?php echo $head["clm_name"]; ?>" style="background-image:url('<?php echo "../{$image}{$blogg}{$head["clm_image"]}"; ?>')">
                              </a>
                              <div class="title-and-cat">
                                 <!-- <a href="">
                                  <h4>xxxxxxx</h4> 
                                 </a> -->
                                 <a href="<?php if ($head["clm_type"] == "link") {
                                             echo $head["clm_link"];
                                          } else {
                                             echo "article.php?id={$head["clm_id"]}";
                                          } ?>">
                                    <h3><?php echo $head["clm_name"]; ?></h3>
                                 </a>
                              </div>
                           </article>


                        <?php

                        }
                        ?>


                     </div>

                     <div class="nav">
                        <?php
                        foreach ($heads as $key => $blog) {;
                        ?>
                           <span class="<?php if ($key == 0) {
                                             echo "active";
                                          } ?>"></span>
                        <?php
                        }
                        ?>
                     </div>
                  </div>
               </main>



            </div>
         </div>






         <div class="l-blog-container">
            <section class="latest">
               <!-- <h2 class="t-title-first">Dernier</h2> -->
               <div class="tile__group">

                  <?php
                  
                  foreach ($blogs as $key => $blog) {;
                  ?>

                     <article class="c-blogtile c-blogtile-onebytwo">
                        <a href="<?php if ($blog["clm_type"] == "link") {
                                    echo $blog["clm_link"];
                                 } else {
                                    echo "article.php?id={$blog["clm_id"]}";
                                 } ?>" class="tile__hero">
                           <img src="<?php echo "../{$image}{$blogg}{$blog["clm_image"]}"; ?>" alt="<?php echo $blog["clm_name"]; ?>" />
                        </a>
                        <div class="cat">
                           <!-- <a class="c-blog-cat-name" href="/FR/fr-FR/blog/category/mode">
                        <h3>Mode</h3>
                     </a> -->
                        </div>
                        <a class="tile__inner" href="<?php if ($blog["clm_type"] == "link") {
                                                         echo $blog["clm_link"];
                                                      } else {
                                                         echo "article.php?id={$blog["clm_id"]}";
                                                      } ?>">
                           <h4 itemprop="name headline" class="headline"><?php echo $blog["clm_name"]; ?></h4>
                           <meta itemprop="description" content="<?php echo $blog["clm_name"]; ?>" />
                        </a>
                     </article>

                  <?php

                  }
                  ?>

               </div>


            <?php

         }
            ?>


            </section>




            <section class="categories" style="width: 100%;">
             

                  <?php



                  $Recommandationss = $db->prepare("SELECT * FROM  tbl_blog WHERE  clm_status = 'publish' AND clm_parent = '{$id}' ORDER BY  clm_count LIMIT 3");
                  $Recommandationss->execute();
                  $Recommandations_count = $Recommandationss->rowCount();
                  $Recommandations;
                  if ($Recommandations_count > 0) {
                     $Recommandations = $Recommandationss->fetchall();

                  } else {
                     $Recommandationss = $db->prepare("SELECT * FROM  tbl_blog WHERE  clm_status = 'publish'  ORDER BY  clm_count DESC LIMIT 3");
                     $Recommandationss->execute();
                     $Recommandations_count = $Recommandationss->rowCount();
                     $Recommandations = $Recommandationss->fetchall();
                  }

                  if ($Recommandations_count > 0) {
                     ?>
                       <h2>Recommandations</h2>
                        <div class="c-blogcategorytile-list">
                     <?php 

                     foreach ($Recommandations as $key => $Recommandation) {;
                  ?>
                        <article class="c-blogcategorytile">
                           <a href="<?php if ($Recommandation["clm_type"] == "link") {
                                       echo $Recommandation["clm_link"];
                                    } else {
                                       echo "article.php?id={$Recommandation["clm_id"]}";
                                    } ?>" class="content" style="background-image:url('<?php echo "../{$image}{$blogg}{$Recommandation["clm_image"]}"; ?>')">
                              <h3 class="cat c-blog-cat-name"><?php echo $Recommandation["clm_name"]; ?></h3>
                           </a>
                        </article>

                  <?php
                     }

                     ?>
                      </div>
                     <?php 
                  }
                  ?>

               </div>
            </section>
         </div>


         </div>
   </section>



</main>





<?php
require_once "../{$incDir}{$incTemp}footer.php";
?>