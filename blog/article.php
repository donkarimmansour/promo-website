<?php
require_once "../includes/function/ini.php";

$jsDir = "../{$jsDir}";
$cssDir = "../{$cssDir}";

$pageTitle = "aricale";
require_once "../{$incDir}{$incFun}connect.php";
require_once "../{$incDir}{$incFun}function.php";
require_once "../{$incDir}{$incTemp}header.php";
require_once "../{$incDir}{$incTemp}navbar.php";

$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


?>


<main id="MainContent" class="bg-primary" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">


    <section id="Blog_Post_meet-the-winner-of-our-converse-design-competition" class="l-blog-page">

        <?php $blogss = $db->prepare("SELECT * FROM  tbl_blog WHERE  clm_status = 'publish' AND clm_id = '{$id}'");
        $blogss->execute();
        $blog_count = $blogss->rowCount();  
        $blog = $blogss->fetch();


        if ($blog_count > 0) {

                $count = $db->prepare("UPDATE tbl_blog SET clm_count = clm_count +1 WHERE clm_id = ?");
                $count->execute(array($id));

        ?>


            <main role="main" class="post ">
                <article>
                    <meta>
                    <header class="c-blog-hero">
                        <div class="bg">

                            <picture>
                                <img src="<?php echo "../{$image}{$blogg}{$blog["clm_image"]}"; ?>" alt="<?php echo $blog["clm_name"]; ?>">
                            </picture>

                        </div>
                        <div class="title">
                            <h1><span><?php echo $blog["clm_name"]; ?></span></h1>
                            <meta content="Meet the winner of our Converse Design competition">
                        </div>
                    </header>

                    <section class="l-blog-col-content c-blog-article-body">
                        <div class="js-articleBody">
                           <?php echo $blog["clm_text"]; ?>
                        </div>

                        <div class="c-blog-social-share">
                            <h2>Share</h2>
                            <a target="_blank" class="social fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" title="Facebook">F</a>
                            <a target="_blank" class="social tw" href="https://twitter.com/intent/tweet/?text=<?php echo $url; ?>" title="Twitter">T</a>
                            <a target="_blank" class="social pi" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url; ?>" title="Pinterest">P</a>
                        </div>
                    </section>
                </article>
            </main>


        <?php

        }
        ?>


    </section>
</main>





<?php
require_once "../{$incDir}{$incTemp}footer.php";
?>