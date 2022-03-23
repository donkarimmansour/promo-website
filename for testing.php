<?php 
require_once "../sc/simple_html_dom.php" ;
set_time_limit(0) ;
ini_set("memory_limit",-1);




header("Content-Type: text/html;charset=UTF-8");
    

$Cdbname = "my" ;
$Chost = "localhost" ;
$Cusername = "root" ;
$Cpassword = "" ; 


$Coption = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
    );

try{

    $db = new PDO("mysql:dbname={$Cdbname};host={$Chost}",$Cusername,$Cpassword,$Coption);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
   


function getHtml($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
        $response = curl_exec($ch);
        if(curl_error($ch)){
                getHtml($url);
        }else{
          return str_get_html($response);
        }
}

$repeater = 0 ;
 function insertImg($Poster , $imgPaths){
    global $repeater;
       sleep(1);

        if(copy(urldecode($Poster), $imgPaths)){
            echo "success copy Poster : " . $Poster . " </br>";
            $repeater = 0 ;
            return true ;
        }else{
            echo "error copy Poster : " . $Poster . " </br>";

            if($repeater < 50){
                $repeater++ ;
              insertImg($Poster , $imgPaths) ;
             }else{
                $repeater = 0 ;
                 return true ;
             }
        }
        
 }


              
                $MyLogo = "empty" ;
                $MyImage = "empty" ;
                $Mytitle = "empty" ;
                $Mydescription = "empty" ;

                $Item = @getHtml("https://www.myunidays.com/GB/en-GB/partners/asos15/view")->find('.san-highlight' , 0) ;
                $Mytitle = @$Item->find('.title' , 0)->plaintext ;
                $Mydescription  = @$Item->find('.partner-description ' , 0)->plaintext ;
                $MyLogo = @$Item->find('.partner-logo img' , 0)->getAttribute('data-src') ;
                $MyImage  = @$Item->find('.highlight-right img' , 0)->src ;

                $Logo = str_replace(" " , "_" , $Mytitle);
                $Logo = str_replace("/" , "_" , $Mytitle);
                $Logo =  $Logo . "_logo_" . md5(time()) . ".png";
                $LogoPath = "./images/offers/" . $Logo ;

                $Image = str_replace(" " , "_" , $Mytitle);
                $Image = str_replace("/" , "_" , $Mytitle);
                $Image =  $Image . "_Image_" . md5(time()) . ".jpg";
                $ImagePath = "./images/offers/" . $Image ;
        
                insertImg($MyLogo, $LogoPath) ;
                insertImg($MyImage, $ImagePath) ;

 

                         echo  $Mytitle. " الرابط"  . " </br>" ;
                         echo  $Mydescription  . " </br>" ;
                         echo $MyImage . "<br>" ;
                         echo $MyLogo . "<br>" ;
                        echo  "---------------------------------------------"  . " </br>" ;
                        echo  "---------------------------------------------"  . " </br>" ;
                        echo  "---------------------------------------------"  . " </br>" ;

                      
                        global $db ;

                        // $stmt = $db->prepare("INSERT INTO `tbl_header_offers`(
                        //          `clm_name`, 
                        //          `clm_description`,
                        //          `clm_image`,
                        //          `clm_logo`,
                        //           `clm_link`,
                        //            `clm_status`,
                        //               `clm_date`,
                        //                `clm_type`,
                        //                 `clm_parent`,
                        //                  `tbl_name`,
                        //                   `clm_count`,
                        //                    `clm_limited`,
                        //                     `clm_in`,
                        //                      `clm_coupon`,
                        //                       `clm_offername`) 
                        // VALUES ( ?,?,?,?,? ,  ?,?,?,?,?  ,  ?,?,?,?,?  )");
                        // $stmt->execute (array( trim($Mytitle) ,  trim($Mydescription) , trim($Image) , trim($Logo) , "empty" ,
                        //   'publish'  , "2021-12-31 16:34:00" , "offer" , 0 , 1 ,
                        //    rand(10,100) , "yes" , "online"  , "dfghvgkhlkk411465646" , "offernameTest" ) );

                //         $stmt = $db->prepare("INSERT INTO `tbl_main_offers`(
                //             `clm_name`, 
                //             `clm_description`,
                //             `clm_image`,
                //             `clm_logo`,
                //              `clm_link`,
                //               `clm_status`,
                //                  `clm_date`,
                //                   `clm_type`,
                //                    `clm_parent`,
                //                     `tbl_name`,
                //                      `clm_count`,
                //                       `clm_limited`,
                //                        `clm_in`,
                //                         `clm_coupon`,
                //                         `clm_style`,
                //                          `clm_offername`) 
                //    VALUES ( ?,?,?,?,? ,  ?,?,?,?,?  ,  ?,?,?,?,?  , ? )");
                //    $stmt->execute (array( trim($Mytitle) ,  trim($Mydescription) , trim($Image) , trim($Logo) , "empty" ,
                //      'publish'  , "2021-12-31 16:34:00" , "offer" , 0 , 2 ,
                //       rand(10,100) , "yes" , "online"  , "dfghvgkhlkk411465646" , "half" , "offernameTest" ) );


     
               $stmt = $db->prepare("INSERT INTO `tbl_small_offers`(
                                  `clm_name`, 
                                  `clm_description`,
                                  `clm_image`,
                                  `clm_logo`,
                                   `clm_link`,
                                    `clm_status`,
                                       `clm_date`,
                                        `clm_type`,
                                         `clm_parent`,
                                          `tbl_name`,
                                           `clm_count`,
                                            `clm_limited`,
                                             `clm_in`,
                                              `clm_coupon`,
                                               `clm_offername`) 
                         VALUES ( ?,?,?,?,? ,  ?,?,?,?,?  ,  ?,?,?,?,?  )");
                         $stmt->execute (array( trim($Mytitle) ,  trim($Mydescription) , trim($Image) , trim($Logo) , "empty" ,
                           'publish'  , "2021-12-31 16:34:00" , "offer" , 0 , 3 ,
                            rand(10,100) , "yes" , "online"  , "dfghvgkhlkk411465646" , "offernameTest" ) );
                        



}
catch(PDOExeption $e){
    echo $e.getMessage();
   

}




?>