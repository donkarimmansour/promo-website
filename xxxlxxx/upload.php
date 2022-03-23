<?php

if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

    $image =  md5(time()) . "_article_img.png";
    $path = "../images/articale/". $image ;
   
    if(copy($_FILES['image']['tmp_name'],$path)){ 
        echo $image;
    }


}


?>