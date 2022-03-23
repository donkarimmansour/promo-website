<?php  ob_start();
session_start();

 require_once "../includes/function/connect.php"; 
 require_once "../includes/function/function.php"; 

if(!isset($_SESSION['admin_id'])){

    header( "Location:index.php");
			exit;
}else{

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="karim mansour" />
        <title><?php getTitle(); ?></title>
        <meta name="description" content="karim mansour">
        <link href="./assets/css/styles.css" rel="stylesheet" />
        <link href="../assets/css/all.min.css" rel="stylesheet" />

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php">xxxx</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="/"><i class="fas fa-bars"></i></button>
        
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <img class="user-avatar rounded-circle" style="width: 35px;height: 35px;" src="images/users/<?php echo $_SESSION['admin_img'] ?>" alt="User Avatar">

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php"><i class="fas fa-id-badge"></i> My Profile</a>
                        <div class="dropdown-divider"></div> 
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">By Karim Mansour</div>
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Website</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fab fa-elementor"></i></div>
                                Website
                           
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="catygories.php"><i class="fas fa-list-ul"></i>&nbsp; Catygories</a>
                                    <a class="nav-link" href="big_offers.php"><i class="fas fa-heading"></i>&nbsp; Head Offers</a>
                                    <a class="nav-link" href="main_offers.php"><i class="fas fa-minus"></i>&nbsp; Main Offers</a>
                                    <a class="nav-link" href="small_offers.php"><i class="fas fa-compress-alt"></i>&nbsp; Small Offers</a>
                                    <a class="nav-link" href="offer.php"><i class="fas fa-coffee"></i>&nbsp; Offers (not work)</a>
                                    <a class="nav-link" href="links.php"><i class="fas fa-link"></i>&nbsp; Links</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                Blog
                             
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                   <a class="nav-link" href="catygories.php"><i class="fas fa-list-ul"></i>&nbsp; Catygories</a>
                                    <a class="nav-link" href="blog.php"><i class="fa fa-users"></i>&nbsp; Blog</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                Users
                             
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="users.php"><i class="fa fa-users"></i>&nbsp; Users</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                                Admin
                            </a>
                            <a class="nav-link" href="message.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-code"></i></div>
                                Message
                            </a>
                            <a class="nav-link" href="smtp.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope-square"></i></div>
                                Smtp
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                          echo $_SESSION['admin_user'] ;
                        ?> <i class="fas fa-meh-rolling-eyes"></i>
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>


     <?php 
     
     }
     ?>
        