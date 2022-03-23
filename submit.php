<?php
session_start() ;

require_once "./includes/function/connect.php";
require_once "./includes/function/function.php";
require("./includes/function/PHPMailer/PHPMailerAutoload.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {

if ($_POST['type'] == "signup") {


        $name = filter_var($_POST["sname"], FILTER_SANITIZE_STRING);
        $personalemail = filter_var($_POST["spersonalemail"], FILTER_SANITIZE_STRING);
        $phonenumber = filter_var($_POST["sphonenumber"], FILTER_SANITIZE_EMAIL);
        $institutionemail = filter_var($_POST["sinstitutionemail"], FILTER_SANITIZE_EMAIL);


        if ($name == "") {
            echo "Please enter name...";
        } else if ($personalemail == "") {
            echo "Please enter personal email...";
        } else if ($phonenumber == "") {
            echo "Please enter phone number...";
        } else if ($institutionemail == "") {
            echo "university or institution email...";
        } else {



            $stmt = $db->prepare("SELECT * FROM `tbl_users` WHERE  (`clm_u_personal` = ? OR `clm_u_email` = ?) " );
            $stmt->execute(array($personalemail ,$institutionemail));
            
            $row = $stmt->rowcount();
            
            if($row > 0){
            
            $fetch = $stmt->fetch();
            
                if ($personalemail == $fetch['clm_u_personal'])
                    {
                        echo "personal email already exists" ;
                    }
               else if($institutionemail == $fetch['clm_u_email'])
                    {
                        echo "institution email already exists";
                    }
            
            
            }
            
            else{
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $generate_password = substr(str_shuffle($chars),0,10);
            
                $stmt = $db->prepare("INSERT INTO `tbl_users` (`clm_u_username`, `clm_u_personal`, `clm_u_email`, `clm_u_phone`, `clm_u_password` , `clm_u_img`) 
                VALUES ( ?, ?, ? , ?, ? , ?)  ");
                
                $stmt->execute(array($name ,$personalemail , $institutionemail , $phonenumber , md5($generate_password),"empty"));
            
            
                if($stmt && $stmt->rowCount() > 0){
                
                    sendcode($institutionemail , $name , $generate_password);
                }
                
                else{
                    echo "something went wrong" ;
                }
            
            }//else
            

            /* else*/
        }
    } elseif ($_POST['type'] == "login") {
     

        $personalemail = filter_var($_POST["linstitutionemail"], FILTER_SANITIZE_EMAIL);
        $institutionemail = filter_var($_POST["linstitutionemail"], FILTER_SANITIZE_EMAIL);
        $pass = $_POST["lpassword"];


            if ($personalemail == "") {
                echo "Please enter personal email...";
            } else if ($pass == "") {
                echo "Please enter password...";
            } else if ($institutionemail == "") {
                echo "university or institution email...";
            } else {


        $stmt = $db->prepare("SELECT `clm_u_id`,  `clm_u_personal`, `clm_u_email` , `clm_u_password` FROM `tbl_users` 
        WHERE  (`clm_u_personal` = ? OR `clm_u_email` = ?) AND `clm_u_password` = ?");
        
        $stmt->execute(array($personalemail , $institutionemail ,md5($pass)));
        $fetch = $stmt->fetch();
        $row = $stmt->rowcount();
        
        if($row > 0){
        
                $stmt = $db->prepare("SELECT * FROM  `tbl_users` WHERE `clm_u_id` = ? ");
                $stmt->execute(array($fetch["clm_u_id"]));
                $_SESSION['user_u_id'] = $fetch['clm_u_id'];
                echo "successfully" ;


        }
        else{

            echo "Email Or Password  Is Not Correct" ;
        
        }//else
        

    }

} elseif ($_POST['type'] == "profile") {

    $name = filter_var($_POST["cname"], FILTER_SANITIZE_STRING);
    $personalemail = filter_var($_POST["cpersonalemail"], FILTER_SANITIZE_STRING);
    $phonenumber = filter_var($_POST["cphonenumber"], FILTER_SANITIZE_EMAIL);
    $institutionemail = filter_var($_POST["cinstitutionemail"], FILTER_SANITIZE_EMAIL);
    $user_id = filter_var($_POST["user_id"], FILTER_SANITIZE_NUMBER_INT);
    $pass = $_POST["cpassword"];
    $oldpass = $_POST["oldpassword"];
    $password = empty($pass) ? $oldpass : $pass ;
    


    if ($name == "") {
        echo "Please enter name...";
    } else if ($personalemail == "") {
        echo "Please enter personal email...";
    } else if ($phonenumber == "") {
        echo "Please enter phone number...";
    } else if ($institutionemail == "") {
        echo "university or institution email...";
    } else {


  
           $stmt = $db->prepare("UPDATE `tbl_users` 
            SET `clm_u_personal` = ? ,`clm_u_phone` = ? ,`clm_u_email` = ? ,
             `clm_u_password` = ? , `clm_u_username` = ?  WHERE `clm_u_id` = ? " );
            $stmt->execute(array($personalemail ,$phonenumber ,$institutionemail , md5($password) ,$name ,$user_id));

            if($stmt && $stmt->rowCount() > 0){
                
                echo "successfully" ;
            }
            
            else{
                echo "something went wrong" ;
            }

    }


} elseif ($_POST['type'] == "forgot") {


    $institutionemail = filter_var($_POST["finstitutionemail"], FILTER_SANITIZE_EMAIL);
  
    $stmt = $db->prepare("SELECT * FROM `tbl_users` WHERE clm_u_email = ?");
    $stmt->execute(array($institutionemail));
    $row = $stmt->rowcount();
    $fetch = $stmt->fetch();
    
    if($row == 0){
    
      echo "Email Or Password  Is Not Correct" ;
    
    }else{
        $username = $fetch['clm_u_username'];
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $generate_password = substr(str_shuffle($chars),0,10);
    
        sendcode($institutionemail , $username , $generate_password);
      }





}

}

function sendcode($institutionemail , $username , $generate_password){
    global $db ;

    $md5_password = md5($generate_password);

    $stmts = $db->prepare("SELECT * FROM tbl_smtp");
    $stmts->execute();
    $gets = $stmts->fetch();

    $html = $db->prepare("SELECT * FROM tbl_html");
    $html->execute();
    $getH = $html->fetch();

    
    if($gets['clm_st_state'] == "on"){
              
        $stmp_Host = $gets['clm_st_host'] ;
        $stmp_Username = $gets['clm_st_username'] ;
        $stmp_Password = $gets['clm_st_password'] ;
        $stmp_Port = $gets['clm_st_port'] ;
        $stmp_From =  $gets['clm_st_from'] ;
        $stmp_FromName =  $gets['clm_st_fromname'] ;
        $stmp_reply_to =  $gets['clm_st_reply_to'] ;
        $stmp_Secure =   $gets["clm_st_security"];
        
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP();
        $mail->Host = $stmp_Host;
        $mail->SMTPAuth = true;
        $mail->Username = $stmp_Username;
        $mail->Password = $stmp_Password;
        $mail->From = $stmp_From;
        $mail->SMTPSecure = $stmp_Secure ;
        $mail->Port = $stmp_Port;
        $mail->FromName = $stmp_FromName;
        $mail->AddAddress("{$institutionemail}");
        $mail->AddReplyTo("{$stmp_reply_to}");
        $mail->WordWrap = 50;
        $mail->IsHTML(true);

      
        
        $stmt = $db->prepare("UPDATE `tbl_users` SET `clm_u_password` = ? WHERE clm_u_email = ?");
        $stmt->execute(array($md5_password,$institutionemail));

        if($getH['clm_subject'] != null){
            $mail->Subject = $getH['clm_subject'];
        }else{
            $mail->Subject = "Restore password";
        }

        if($getH['clm_subject'] != null){

         $message =	base64_decode($getH['clm_html']) ;

         if(strpos($message, "(/newCode)") !== false ){
            $message = str_replace("(/newCode)", $generate_password , $message );  ;
         } if(strpos($message, "(/username)") !== false ){
            $message = str_replace("(/username)", $username , $message );  ;
         } if(strpos($message, "(/email)") !== false ){
            $message = str_replace("(/email)", $institutionemail , $message );  ;
         }

            $mail->Body = $message ;
        
        }else{
            $mail->Body    = "<div style='text-align: center;'>
            &nbsp; ------------------------------<wbr>------------------------------<wbr>---------<br>
            &nbsp; Password Reset<br>
            &nbsp; ------------------------------<wbr>------------------------------<wbr>---------<br>
            <br>
            &nbsp; Dear {$username},<br>
            <br>
            <br>
            &nbsp;For your information:<br>
            <br>
            <br>
            &nbsp; User Name :&nbsp; {$username} <br>
            &nbsp; Email :&nbsp; {$institutionemail} <br>
            &nbsp; New Password :&nbsp; {$generate_password} <br>
            <br>
            <br>
            </div>";
        }
        
        $mail->AltBody = "By Karrim Mansour";

            if($mail->Send())
            {
               echo "password sent to your email";   			
               
            }else{
                echo "something went wrong (SMTP protocol)";
                 
            }

        }else{
            echo "You must turn on the SMTP protocol";
        }

}
