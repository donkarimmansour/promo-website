<?php
require_once "../includes/function/connect.php";
require_once "../includes/function/function.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {


    if ($_POST['type'] === "catyadd") {



        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $catyadd_type = filter_var($_POST["catyadd_type"], FILTER_SANITIZE_STRING);
        $catyadd_place = filter_var($_POST["catyadd_place"], FILTER_SANITIZE_STRING);
        $catyadd_parent = isset($_POST["catyadd_parent"]) && ($_POST["catyadd_parent"] != null || $_POST["catyadd_parent"] != "0") ? filter_var($_POST["catyadd_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $catyadd_type == "link") {
            echo "please enter the link";
        } else {



            $stmt = $db->prepare("INSERT INTO `tbl_categories`(`clm_name`, `clm_description`, `clm_link`, `clm_place`, `clm_status`, `clm_parent`, `clm_type`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(array($name, $description, $link, $catyadd_place, $status, $catyadd_parent, $catyadd_type));

            if ($stmt && $stmt->rowCount() > 0) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        }
    } else  if ($_POST['type'] === "catyedit") {



        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $catyedit_type = filter_var($_POST["catyedit_type"], FILTER_SANITIZE_STRING);
        $catyedit_place = filter_var($_POST["catyedit_place"], FILTER_SANITIZE_STRING);
        $catyedit_parent = ($_POST["catyedit_parent"] != null || $_POST["catyedit_parent"] != "0") ? filter_var($_POST["catyedit_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

      


        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $catyedit_type == "link") {
            echo "please enter the link";
        }
           
         else {

            $stmt = $db->prepare("UPDATE `tbl_categories` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_place`=?,`clm_status`=?,`clm_parent`=?,`clm_type`=?  WHERE `clm_id`=?");
            $stmt->execute(array($name, $description, $link, $catyedit_place, $status, $catyedit_parent, $catyedit_type, $id));


            if ($stmt) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        }
    } else if ($_POST['type'] === "headoffadd") {



        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $headoffadd_type = filter_var($_POST["headoffadd_type"], FILTER_SANITIZE_STRING);
        $headoffadd_parent = ($_POST["headoffadd_parent"] != null || $_POST["headoffadd_parent"] != "0") ? filter_var($_POST["headoffadd_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;


        $date = (isset($_POST["date"]) && ($_POST["date"] != null)) ? date("Y-m-d H:i:s",strtotime($_POST["date"])) : "";
        $offername = filter_var($_POST["offername"], FILTER_SANITIZE_STRING);
        $limited = filter_var($_POST["limited"], FILTER_SANITIZE_STRING);
        $in = filter_var($_POST["in"], FILTER_SANITIZE_STRING);
        $coupon = $_POST["coupon"] ;


        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $headoffadd_type == "link") {
            echo "please enter the link";
        } else if ($date == "" && $limited == "yes") {
                echo "please enter the date";
            } else if ($offername == "") {
                echo "please enter the offer name";
            } else if ($coupon == "") {
                echo "please enter the coupon";
            } else {


            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                $img = md5(time()) . "_header_offer_img.jpg";
                $logo = md5(time()) . "_header_offer_logo.png";


                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("INSERT INTO `tbl_header_offers`(`clm_name`, `clm_description`, `clm_link`, `clm_status`, `clm_image`, `clm_logo`, `clm_type` ,`clm_parent` ,
                `clm_date`,`clm_limited`,`clm_in`,`clm_coupon`,`clm_offername`) VALUES (?,?,?,?,?,?,?,?  ,?,?,?,?,?)");
                $stmt->execute(array($name, $description, $link, $status, $img, $logo, $headoffadd_type, $headoffadd_parent,
                $date , $limited , $in , $coupon , $offername  ));

                if ($stmt && $stmt->rowCount() > 0) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {
                echo "please choose the images";
            }
        }
    } else  if ($_POST['type'] === "headofferedit") {

        $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $headofferedit_type = filter_var($_POST["headofferedit_type"], FILTER_SANITIZE_STRING);
        $headofferedit_parent =  ($_POST["headofferedit_parent"] != null || $_POST["headofferedit_parent"] != "0") ? filter_var($_POST["headofferedit_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

        $date = (isset($_POST["date"]) && ($_POST["date"] != null)) ? date("Y-m-d H:i:s",strtotime($_POST["date"])) : "";
        $offername = filter_var($_POST["offername"], FILTER_SANITIZE_STRING);
        $limited = filter_var($_POST["limited"], FILTER_SANITIZE_STRING);
        $in = filter_var($_POST["in"], FILTER_SANITIZE_STRING);
        $coupon = $_POST["coupon"] ;


        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $headofferedit_type == "link") {
            echo "please enter the link";
        } else if ($date == "" && $limited == "yes") {
            echo "please enter the date";
        } else if ($offername == "") {
            echo "please enter the offer name";
        } else if ($coupon == "") {
            echo "please enter the coupon";
        } else {

            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                $get = getItem("tbl_header_offers", "clm_id", $id);

                $img = md5(time()) . "_header_offer_img.jpg";
                $logo = md5(time()) . "_header_offer_logo.png";
                $oldimage = $get["clm_image"];
                $oldlogo = $get["clm_logo"];

                unlink('../images/offers/' . $oldimage);
                unlink('../images/offers/' . $oldlogo);

                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_header_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_image`=?,`clm_logo`=?,`clm_type`=?,`clm_parent`=? ,
                  `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $img, $logo, $headofferedit_type, $headofferedit_parent, 
                $date , $limited , $in , $coupon , $offername , $id ));




                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0 && $_FILES['logo']['name'] == "") {
                $get = getItem("tbl_header_offers", "clm_id", $id);

                $img = md5(time()) . "_header_offer_img.jpg";
                $oldimage = $get["clm_image"];

                unlink('../images/offers/' . $oldimage);

                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_header_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_image`=?,`clm_type`=?,`clm_parent`=? ,
                `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");

                $stmt->execute(array($name, $description, $link, $status, $img, $headofferedit_type, $headofferedit_parent,
                $date , $limited , $in , $coupon , $offername , $id ));

                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] == "") {

                $get = getItem("tbl_header_offers", "clm_id", $id);

                $logo = md5(time()) . "_header_offer_logo.png";
                $oldlogo = $get["clm_logo"];

                unlink('../images/offers/' . $oldlogo);

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_header_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_logo`=?,`clm_type`=?,`clm_parent`=? ,
                `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $logo, $headofferedit_type, $headofferedit_parent, 
                $date , $limited , $in , $coupon , $offername, $id ));




                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {

                $stmt = $db->prepare("UPDATE `tbl_header_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_type`=?,`clm_parent`=? ,
                `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $headofferedit_type, $headofferedit_parent,
                $date , $limited , $in , $coupon , $offername , $id ));



                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            }
        } //else
    } else if ($_POST['type'] === "mainoffadd") {

        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $mainoffadd_type = filter_var($_POST["mainoffadd_type"], FILTER_SANITIZE_STRING);
        $style = filter_var($_POST["style"], FILTER_SANITIZE_STRING);
        $mainoffadd_parent = ($_POST["mainoffadd_parent"] != null || $_POST["mainoffadd_parent"] != "0") ? filter_var($_POST["mainoffadd_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

        $date = (isset($_POST["date"]) && ($_POST["date"] != null)) ? date("Y-m-d H:i:s",strtotime($_POST["date"])) : "";
        $offername = filter_var($_POST["offername"], FILTER_SANITIZE_STRING);
        $limited = filter_var($_POST["limited"], FILTER_SANITIZE_STRING);
        $in = filter_var($_POST["in"], FILTER_SANITIZE_STRING);
        $coupon = $_POST["coupon"] ;


        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $mainoffadd_type == "link") {
            echo "please enter the link";
        } else if ($date == "" && $limited == "yes") {
            echo "please enter the date";
        } else if ($offername == "") {
            echo "please enter the offer name";
        } else if ($coupon == "") {
            echo "please enter the coupon";
        } else {


            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                $img = md5(time()) . "_main_offer_img.jpg";
                $logo = md5(time()) . "_main_offer_logo.png";


                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("INSERT INTO `tbl_main_offers`(`clm_name`, `clm_description`, `clm_link`, `clm_status`, `clm_image`, `clm_logo`, `clm_type` ,`clm_parent`, `clm_limited`, `clm_style`,
                `clm_date`,`clm_in`,`clm_coupon`,`clm_offername`) VALUES (?,?,?,?,?,?,?,?  ,?,?,?,?,?,?)");
                $stmt->execute(array($name, $description, $link, $status, $img, $logo, $mainoffadd_type, $mainoffadd_parent, $limited, $style,
                $date  , $in , $coupon , $offername  ));


                if ($stmt && $stmt->rowCount() > 0) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {
                echo "please choose the images";
            }
        }
    } else  if ($_POST['type'] === "mainoffedit") {

        $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $style = filter_var($_POST["style"], FILTER_SANITIZE_STRING);
        $mainoffedit_type = filter_var($_POST["mainoffedit_type"], FILTER_SANITIZE_STRING);
        $mainoffedit_parent = ($_POST["mainoffedit_parent"] != null || $_POST["mainoffedit_parent"] != "0") ? filter_var($_POST["mainoffedit_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;
    
        $date = (isset($_POST["date"]) && ($_POST["date"] != null)) ? date("Y-m-d H:i:s",strtotime($_POST["date"])) : "";
        $offername = filter_var($_POST["offername"], FILTER_SANITIZE_STRING);
        $limited = filter_var($_POST["limited"], FILTER_SANITIZE_STRING);
        $in = filter_var($_POST["in"], FILTER_SANITIZE_STRING);
        $coupon = $_POST["coupon"] ;

        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $mainoffedit_type == "link") {
            echo "please enter the link";
        } else if ($date == "" && $limited == "yes") {
            echo "please enter the date";
        } else if ($offername == "") {
            echo "please enter the offer name";
        } else if ($coupon == "") {
            echo "please enter the coupon";
        } else {

            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                $get = getItem("tbl_main_offers", "clm_id", $id);

                $img = md5(time()) . "_main_offer_img.jpg";
                $logo = md5(time()) . "_main_offer_logo.png";
                $oldimage = $get["clm_image"];
                $oldlogo = $get["clm_logo"];

                unlink('../images/offers/' . $oldimage);
                unlink('../images/offers/' . $oldlogo);

                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_main_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_image`=?,`clm_logo`=?,`clm_type`=? ,`clm_parent`=?,`clm_style`=?,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $img, $logo, $mainoffedit_type, $mainoffedit_parent,  $style, 
                $date , $limited , $in , $coupon , $offername, $id ));




                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0 && $_FILES['logo']['name'] == "") {
                $get = getItem("tbl_main_offers", "clm_id", $id);

                $img = md5(time()) . "_main_offer_img.jpg";
                $oldimage = $get["clm_image"];

                unlink('../images/offers/' . $oldimage);

                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_main_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_image`=?,`clm_type`=? ,`clm_parent`=?,`clm_style`=? ,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $img, $mainoffedit_type, $mainoffedit_parent,  $style, 
                $date , $limited , $in , $coupon , $offername, $id ));


                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] == "") {

                $get = getItem("tbl_main_offers", "clm_id", $id);

                $logo = md5(time()) . "_main_offer_logo.png";
                $oldlogo = $get["clm_logo"];

                unlink('../images/offers/' . $oldlogo);

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_main_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_logo`=?,`clm_type`=? ,`clm_parent`=?,`clm_style`=? ,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $logo, $mainoffedit_type, $mainoffedit_parent,  $style, 
                $date , $limited , $in , $coupon , $offername, $id ));



                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {

                $stmt = $db->prepare("UPDATE `tbl_main_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_type`=? ,`clm_parent`=?,`clm_style`=? ,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $mainoffedit_type, $mainoffedit_parent,  $style, 
                $date , $limited , $in , $coupon , $offername, $id ));


                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            }
        } //else
    } else if ($_POST['type'] === "smalloffadd") {

        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $smalloffadd_type = filter_var($_POST["smalloffadd_type"], FILTER_SANITIZE_STRING);
        $smalloffadd_parent =  ($_POST["smalloffadd_parent"] != null || $_POST["smalloffadd_parent"] != "0") ? filter_var($_POST["smalloffadd_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

        $date = (isset($_POST["date"]) && ($_POST["date"] != null)) ? date("Y-m-d H:i:s",strtotime($_POST["date"])) : "";
        $offername = filter_var($_POST["offername"], FILTER_SANITIZE_STRING);
        $limited = filter_var($_POST["limited"], FILTER_SANITIZE_STRING);
        $in = filter_var($_POST["in"], FILTER_SANITIZE_STRING);
        $coupon = $_POST["coupon"] ;

        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $smalloffadd_type == "link") {
            echo "please enter the link";
        }  else if ($date == "" && $limited == "yes") {
            echo "please enter the date";
        } else if ($offername == "") {
            echo "please enter the offer name";
        } else if ($coupon == "") {
            echo "please enter the coupon";
        } else {

            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                $img = md5(time()) . "_small_offer_img.jpg";
                $logo = md5(time()) . "_small_offer_logo.png";


                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("INSERT INTO `tbl_small_offers`(`clm_name`, `clm_description`, `clm_link`, `clm_status`, `clm_image`, `clm_logo`, `clm_type` ,`clm_parent`, `clm_limited` ,
                `clm_date`,`clm_in`,`clm_coupon`,`clm_offername`) VALUES (?,?,?,?,?,?,?,?  ,?,?,?,?,?)");
                $stmt->execute(array($name, $description, $link, $status, $img, $logo, $smalloffadd_type, $smalloffadd_parent, $limited,
                $date  , $in , $coupon , $offername  ));


                if ($stmt && $stmt->rowCount() > 0) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {
                echo "please choose the images";
            }
        }
    } else  if ($_POST['type'] === "smalloffedit") {

        $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
        $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $smalloffedit_type = filter_var($_POST["smalloffedit_type"], FILTER_SANITIZE_STRING);
        $smalloffedit_parent = ($_POST["smalloffedit_parent"] != null || $_POST["smalloffedit_parent"] != "0") ? filter_var($_POST["smalloffedit_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

        $date = (isset($_POST["date"]) && ($_POST["date"] != null)) ? date("Y-m-d H:i:s",strtotime($_POST["date"])) : "";
        $offername = filter_var($_POST["offername"], FILTER_SANITIZE_STRING);
        $limited = filter_var($_POST["limited"], FILTER_SANITIZE_STRING);
        $in = filter_var($_POST["in"], FILTER_SANITIZE_STRING);
        $coupon = $_POST["coupon"] ;
        
        if ($name == "") {
            echo "please enter the name";
        } else if ($description == "") {
            echo "please enter the description";
        } else if ($link == "" && $smalloffedit_type == "link") {
            echo "please enter the link";
        }  else if ($date == "" && $limited == "yes") {
            echo "please enter the date";
        } else if ($offername == "") {
            echo "please enter the offer name";
        } else if ($coupon == "") {
            echo "please enter the coupon";
        } else {
            
            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                $get = getItem("tbl_small_offers", "clm_id", $id);

                $img = md5(time()) . "_small_offer_img.jpg";
                $logo = md5(time()) . "_small_offer_logo.png";
                $oldimage = $get["clm_image"];
                $oldlogo = $get["clm_logo"];

                unlink('../images/offers/' . $oldimage);
                unlink('../images/offers/' . $oldlogo);

                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_small_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_image`=?,`clm_logo`=?,`clm_type`=? ,`clm_parent`=?,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $img, $logo, $smalloffedit_type, $smalloffedit_parent, 
                $date , $limited , $in , $coupon , $offername, $id ));

                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }

            } else if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0 && $_FILES['logo']['name'] == "") {
                $get = getItem("tbl_small_offers", "clm_id", $id);

                $img = md5(time()) . "_small_offer_img.jpg";
                $oldimage = $get["clm_image"];

                unlink('../images/offers/' . $oldimage);

                $Hpic1 = $_FILES['image']['tmp_name'];
                $Htpath1 = '../images/offers/' . $img;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 0) copy($Hpic1, $Htpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_small_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_image`=?,`clm_type`=? ,`clm_parent`=?,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $img, $smalloffedit_type, $smalloffedit_parent, 
                $date , $limited , $in , $coupon , $offername, $id ));

                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0 && $_FILES['image']['name'] == "") {

                $get = getItem("tbl_small_offers", "clm_id", $id);

                $logo = md5(time()) . "_small_offer_logo.png";
                $oldlogo = $get["clm_logo"];

                unlink('../images/offers/' . $oldlogo);

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/offers/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_small_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_logo`=?,`clm_type`=? ,`clm_parent`=?,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $logo, $smalloffedit_type, $smalloffedit_parent, 
                $date , $limited , $in , $coupon , $offername, $id ));

                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {

                $stmt = $db->prepare("UPDATE `tbl_small_offers` SET `clm_name`=?,`clm_description`=?,`clm_link`=?,`clm_status`=?,`clm_type`=? ,`clm_parent`=? ,
                 `clm_date`=?,`clm_limited`=?,`clm_in`=?,`clm_coupon`=?,`clm_offername`=? WHERE `clm_id`=?");
                $stmt->execute(array($name, $description, $link, $status, $smalloffedit_type, $smalloffedit_parent, 
                $date , $limited , $in , $coupon , $offername, $id ));

                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            }
        } //else



    } else if ($_POST['type'] === "linkadd") {

        $link = filter_var($_POST["uselink"], FILTER_SANITIZE_URL);
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $linkadd_parent =  ($_POST["linkadd_parent"] != null || $_POST["linkadd_parent"] != "0") ? filter_var($_POST["linkadd_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

        if ($link == "") {
            echo "please enter the link";
        } else {


            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0) {

                $logo = md5(time()) . "_link_img.png";


                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/links/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("INSERT INTO `tbl_links`(`clm_link`, `clm_status`, `clm_image`,`clm_parent`) VALUES (?,?,?,?)");
                $stmt->execute(array($link, $status, $logo, $linkadd_parent));


                if ($stmt && $stmt->rowCount() > 0) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {
                echo "please choose the images";
            }
        }
    } else  if ($_POST['type'] === "linkedit") {

        $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
        $link =  filter_var($_POST["uselink"], FILTER_SANITIZE_URL);
        $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
        $linkedit_parent = ($_POST["linkedit_parent"] != null || $_POST["linkedit_parent"] != "0") ? filter_var($_POST["linkedit_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

        if ($link == "") {
            echo "please enter the link";
        } else {

            if ($_FILES['logo']['name'] != "" && $_FILES['logo']['error'] == 0) {

                $get = getItem("tbl_links", "clm_id", $id);

                $logo = md5(time()) . "_link_img.png";
                $oldlogo = $get["clm_image"];

                unlink('../images/links/' . $oldlogo);

                $Gpic1 = $_FILES['logo']['tmp_name'];
                $Gtpath1 = '../images/links/' . $logo;


                for ($i = 0; $i <= 1; $i++) {
                    if ($i == 1) copy($Gpic1, $Gtpath1);
                }

                $stmt = $db->prepare("UPDATE `tbl_links` SET `clm_link` =?, `clm_status`=?, `clm_image`=?,`clm_parent`=? WHERE clm_id = ?");
                $stmt->execute(array($link, $status, $logo, $linkedit_parent, $id));

                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {

                $stmt = $db->prepare("UPDATE `tbl_links` SET `clm_link` =?, `clm_status`=?,`clm_parent`=? WHERE clm_id = ?");
                $stmt->execute(array($link, $status, $linkedit_parent, $id));

                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            }
        } //else
    } elseif ($_POST['type'] == "useradd") {


        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $personal = filter_var($_POST["personal"], FILTER_SANITIZE_EMAIL);
        $phone = $_POST["phone"];


        if ($username == "") {
            echo "Please enter username...";
        } else if ($password == "") {
            echo "Please enter password...";
        } else if ($email == "") {
            echo "Please enter email...";
        } else if ($personal == "") {
            echo "Please enter personal...";
        } else if ($phone == "") {
            echo "Please enter phone...";
        } else {


            if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {


                $image =  md5(time()) . "__profile.png";

                $pic1 = $_FILES['image']['tmp_name'];
                $tpath1 = '../images/users/' . $image;


                copy($pic1, $tpath1);

                $stmt = $db->prepare("INSERT INTO tbl_users (clm_u_username , clm_u_password , clm_u_email , clm_u_img  , clm_u_personal, clm_u_phone) VALUES (? , ? , ? ,?, ? ,? ) ");
                $stmt->execute(array($username, md5($password), $email, $image , $personal , $phone));


                if ($stmt && $stmt->rowCount() > 0) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {
                $stmt = $db->prepare("INSERT INTO tbl_users (clm_u_username , clm_u_password , clm_u_email , clm_u_img , clm_u_personal, clm_u_phone) VALUES (? , ? , ? ,?, ? ,? ) ");
                $stmt->execute(array($username, md5($password), $email, "empty", $personal , $phone));


                if ($stmt && $stmt->rowCount() > 0) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            }



            /* else*/
        }
    } elseif ($_POST['type'] == "useredit") {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $personal = filter_var($_POST["personal"], FILTER_SANITIZE_EMAIL);
        $phone = $_POST["phone"];
        $userid = $_POST["id"];
        $pass = empty($_POST["password"]) ? $_POST["oldpassword"] : md5($_POST["password"]);

        if ($username == "") {
            echo "Please enter username...";
        } else if ($email == "") {
            echo "Please enter email...";
        } else if ($personal == "") {
            echo "Please enter personal...";
        } else if ($phone == "") {
            echo "Please enter phone...";
        } else {


            if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                $get = getItem("tbl_users", "clm_u_id", $userid);
                $image = $get['clm_u_username'] . md5(time()) . "__profile.png";
                $oldImg = $get["clm_u_img"];

                $pic1 = $_FILES['image']['tmp_name'];
                $tpath1 = '../images/users/' . $image;

                if ($oldImg != "empty") {
                    unlink('../images/users/' . $oldImg);
                }
                copy($pic1, $tpath1);

                $stmt = $db->prepare("UPDATE tbl_users SET clm_u_username = ? , clm_u_password = ? ,clm_u_email = ? , clm_u_img = ? ,clm_u_personal = ? , clm_u_phone = ?  WHERE clm_u_id = ? ");
                $stmt->execute(array($username, $pass, $email, $image, $personal , $phone, $userid));


                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            } else {
                $stmt = $db->prepare("UPDATE tbl_users SET clm_u_username = ? , clm_u_password = ? ,clm_u_email = ?  ,clm_u_personal = ? , clm_u_phone = ?  WHERE clm_u_id = ? ");
                $stmt->execute(array($username, $pass, $email, $personal , $phone, $userid));


                if ($stmt) {
                    echo "successfully";
                } else {
                    echo "something went wrong";
                }
            }
        }
    


        
    
    //} elseif ($_POST['type'] == "offeradd") {


    //     $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    //     $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
    //     $offeradd_offer = filter_var($_POST["offeradd_offer"], FILTER_SANITIZE_STRING);
    //      $offeradd_offer = filter_var($_POST["offeradd_offer"], FILTER_SANITIZE_STRING);

    //      $coupon = filter_var($_POST["coupon"], FILTER_SANITIZE_STRING);
    //      $offeradd_type = filter_var($_POST["offeradd_type"], FILTER_SANITIZE_STRING);
    //      $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";

    //      $offeradd_offer = explode("@" , $offeradd_offer);
    //      $offeradd_id = $offeradd_offer[0];
    //      $offeradd_oo = $offeradd_offer[1];
       
    //     if ($name == "") {
    //         echo "Please enter name...";
    //     } else if ($link == "") {
    //         echo "Please enter link...";
    //     } else {


   
    //             $stmt = $db->prepare("INSERT INTO tbl_offer (clm_title , clm_link ,clm_type ,clm_coupon , clm_offer , clm_oo , clm_status ) VALUES (? , ? , ? ,? , ?,?,?) ");
    //             $stmt->execute(array($name ,$link, $offeradd_type,$coupon , $offeradd_id , $offeradd_oo, $status));


    //             if ($stmt && $stmt->rowCount() > 0) {
    //                 echo "successfully";
    //             } else {
    //                 echo "something went wrong";
    //             }

    //         /* else*/
    //     }


    // } elseif ($_POST['type'] == "offeredit") {
      
    //     $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
     
    //     $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    //     $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
    //     $offeredit_offer = filter_var($_POST["offeredit_offer"], FILTER_SANITIZE_STRING);
    //      $offeredit_offer = filter_var($_POST["offeredit_offer"], FILTER_SANITIZE_STRING);
    //      $offeredit_offer = explode("@" , $offeredit_offer);
    //      $offeredit_id = $offeredit_offer[0];
    //      $offeredit_oo = $offeredit_offer[1];


    //      $coupon = filter_var($_POST["coupon"], FILTER_SANITIZE_STRING);
    //      $offeredit_type = filter_var($_POST["offeredit_type"], FILTER_SANITIZE_STRING);
    //      $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";

    //     echo $offeredit_oo ;
    //     if ($name == "") {
    //         echo "Please enter name...";
    //     } else if ($link == "") {
    //         echo "Please enter link...";
    //     } else {

    //             $stmt = $db->prepare("UPDATE tbl_offer SET clm_title = ? , clm_link = ? , clm_type = ? , clm_coupon = ? , clm_offer = ? , clm_oo = ? , clm_status = ? WHERE clm_id = ? ");
    //             $stmt->execute(array($name ,$link, $offeredit_type,$coupon, $offeredit_id , $offeredit_oo, $status ,$id));

    //             if ($stmt) {
    //                 echo "successfully";
    //             } else {
    //                 echo "something went wrong";
    //             }
            
    //     }

   
} elseif ($_POST['type'] == "adminadd") {


    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if ($username == "") {
        echo "Please enter username...";
    } else if ($password == "") {
        echo "Please enter password...";
    } else if ($email == "") {
        echo "Please enter email...";
    } else {


        if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

                   
            $image =  md5(time()) . "__profile.png";

            $pic1 = $_FILES['image']['tmp_name'];
            $tpath1 = 'images/users/' . $image;


            copy($pic1, $tpath1);

            $stmt = $db->prepare("INSERT INTO tbl_admin (clm_a_user , clm_a_pass , clm_a_email , clm_a_img ) VALUES (? , ? , ? ,? ) ");
            $stmt->execute(array($username, md5($password), $email, $image));


            if ($stmt && $stmt->rowCount() > 0) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        } else {
            $stmt = $db->prepare("INSERT INTO tbl_admin (clm_a_user , clm_a_pass , clm_a_email , clm_a_img ) VALUES (? , ? , ? ,? ) ");
            $stmt->execute(array($username, md5($password), $email, "empty"));


            if ($stmt && $stmt->rowCount() > 0) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        }



        /* else*/
    }
} elseif ($_POST['type'] == "adminedit") {
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $userid = $_POST["id"];
    $pass = empty($_POST["password"]) ? $_POST["oldpassword"] : md5($_POST["password"]);
    
    if ($username == "") {
        echo "Please enter username...";
    } else if ($email == "") {
        echo "Please enter email...";
    } else {


        if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

            $get = getItem("tbl_admin", "clm_a_id", $userid);
            $image = $get['clm_a_user'] . md5(time()) . "__profile.png";
            $oldImg = $get["clm_a_img"];

            $pic1 = $_FILES['image']['tmp_name'];
            $tpath1 = 'images/users/' . $image;

            if ($oldImg != "empty") {
                unlink('images/users/' . $oldImg);
            }
            copy($pic1, $tpath1);

            $stmt = $db->prepare("UPDATE tbl_admin SET clm_a_user = ? , clm_a_pass = ? ,clm_a_email = ? , clm_a_img = ?  WHERE clm_a_id = ? ");
            $stmt->execute(array($username, $pass, $email, $image, $userid));


            if ($stmt) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        } else {
            $stmt = $db->prepare("UPDATE tbl_admin SET clm_a_user = ? , clm_a_pass = ? ,clm_a_email = ? WHERE clm_a_id = ? ");
            $stmt->execute(array($username, $pass, $email, $userid));


            if ($stmt) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        }
    }

} else if ($_POST['type'] === "blogadd") {

    $name = $_POST["name"];
    $text = $_POST["text"];
    $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
    $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
    $blogadd_type = filter_var($_POST["blogadd_type"], FILTER_SANITIZE_STRING);
    $blogadd_parent =  ($_POST["blogadd_parent"] != null || $_POST["blogadd_parent"] != "0") ? filter_var($_POST["blogadd_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;
    if ($name == "") {
        echo "please enter the name";
    } else if ($text == "") {
        echo "please enter the text";
    } else if ($link == "" && $blogadd_type == "link") {
        echo "please enter the link";
    } else {


        if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {

            $img = md5(time()) . "_blog_img.jpg";


            $Hpic1 = $_FILES['image']['tmp_name'];
            $Htpath1 = '../images/blog/' . $img;



            for ($i = 0; $i <= 1; $i++) {
                copy($Hpic1, $Htpath1);
            }

            $stmt = $db->prepare("INSERT INTO `tbl_blog`(`clm_name`, `clm_text`, `clm_link`, `clm_status`, `clm_image`, `clm_type` ,`clm_parent`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(array($name, $text, $link, $status, $img, $blogadd_type, $blogadd_parent));


            if ($stmt && $stmt->rowCount() > 0) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        } else {
            echo "please choose the images";
        }
    }
} else  if ($_POST['type'] === "blogedit") {

    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
    $name = $_POST["name"];
    $text = $_POST["text"];
    $link = (isset($_POST["uselink"]) && ($_POST["uselink"] != null)) ? filter_var($_POST["uselink"], FILTER_SANITIZE_URL) : "empty";
    $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
    $blogedit_type = filter_var($_POST["blogedit_type"], FILTER_SANITIZE_STRING);
    $blogedit_parent = ($_POST["blogedit_parent"] != null || $_POST["blogedit_parent"] != "0") ? filter_var($_POST["blogedit_parent"], FILTER_SANITIZE_NUMBER_INT) : 0;

    if ($name == "") {
        echo "please enter the name";
    } else if ($text == "") {
        echo "please enter the text";
    } else if ($link == "" && $blogedit_type == "link") {
        echo "please enter the link";
    } else {

       if ($_FILES['image']['name'] != "" && $_FILES['image']['error'] == 0) {
            $get = getItem("tbl_blog", "clm_id", $id);

            $img = md5(time()) . "_blog_img.jpg";
            $oldimage = $get["clm_image"];

            unlink('../images/blog/' . $oldimage);

            $Hpic1 = $_FILES['image']['tmp_name'];
            $Htpath1 = '../images/blog/' . $img;


            for ($i = 0; $i <= 1; $i++) {
                if ($i == 0) copy($Hpic1, $Htpath1);
            }

            $stmt = $db->prepare("UPDATE `tbl_blog` SET `clm_name`=?,`clm_text`=?,`clm_link`=?,`clm_status`=?,`clm_image`=?,`clm_type`=? ,`clm_parent`=? WHERE `clm_id`=?");
            $stmt->execute(array($name, $text, $link, $status, $img, $blogedit_type, $blogedit_parent,  $id));

            if ($stmt) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        } else {

            $stmt = $db->prepare("UPDATE `tbl_blog` SET `clm_name`=?,`clm_text`=?,`clm_link`=?,`clm_status`=?,`clm_type`=? ,`clm_parent`=? WHERE `clm_id`=?");
            $stmt->execute(array($name, $text, $link, $status, $blogedit_type, $blogedit_parent,  $id));

            if ($stmt) {
                echo "successfully";
            } else {
                echo "something went wrong";
            }
        }
    } //else
}

}
