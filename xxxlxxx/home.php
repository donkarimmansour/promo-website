<?php
$pageTitle = basename(__FILE__, ".php");
require_once "includes/header.php";


if (!isset($_SESSION['admin_id'])) {

    header("Location:index.php");
    exit;
} else {

?>
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class=" col-md-4 col-sm-12">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-heading"></i> Head Offers <?php countItems("tbl_header_offers", "clm_id"); ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="big_offers.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class=" col-md-4 col-sm-12">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"><i class="fas fa-minus"></i> Main Offers <?php countItems("tbl_main_offers", "clm_id"); ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="main_offers.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><i class="fas fa-compress-alt"></i> Small Offers <?php countItems("tbl_small_offers", "clm_id"); ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="small_offers.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body"><i class="fas fa-coffee"></i> Offer <?php countItems("tbl_offer", "clm_id"); ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="offer.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body"><i class="fas fa-link"></i> Links <?php countItems("tbl_links", "clm_id"); ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="links.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body"><i class="fa fa-users"></i> Users <?php countItems("tbl_users", "clm_u_id"); ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="users.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

        </div>


        <?php

        $stmt = $db->prepare("SELECT from_unixtime(UNIX_TIMESTAMP(clm_u_date),'%y') as year ,
                                from_unixtime(UNIX_TIMESTAMP(clm_u_date),'%M') as month ,
                                from_unixtime(UNIX_TIMESTAMP(clm_u_date),'%D') as day ,
                                clm_u_id ,clm_u_username , clm_u_email ,clm_u_img
                                FROM tbl_users WHERE  clm_u_id != -1 ORDER BY `clm_u_id` DESC LIMIT 10");

        $stmt->execute();
        $getAll = $stmt->fetchall();



        if (!empty($getAll)) {

        ?>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Latest Ten Users
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>UserName</th>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Modify</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>UserName</th>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Modify</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($getAll as $get) {
                                ?>

                                    <tr>
                                        <td><?php echo $counter; ?>.</td>
                                        <td><?php echo $get["clm_u_username"]; ?></td>
                                        <td>#<?php echo $get["clm_u_id"]; ?></td>
                                        <td>
                                            <div class="round-img">
                                                <img style="width: 50px; height: 50px;" class="rounded-circle" src="<?php if($get["clm_u_img"] == "empty"){echo '../images/empty.png';}else{echo "../images/users/{$get["clm_u_img"]}";}?>" alt="avatar" style="max-width: 200px;">
                                            </div>
                                        </td>
                                        <td><?php echo $get["clm_u_email"]; ?></td>
                                        <td>
                                            <span class="count"><?php echo $get["year"]; ?> </span>
                                            /<span> <?php echo $get["month"]  . " / " . $get["day"]; ?> </span>
                                        </td>
                                        <td>
                                            <a href="users.php?do=edit&id=<?php echo $get["clm_u_id"]; ?>"><span class="btn btn-success"><i class='fa fa-edit'></i> Edit</span></a>
                                            <a href="users.php?do=delete&id=<?php echo $get["clm_u_id"]; ?>"><span class="btn btn-danger confirm"><i class='fas fa-trash-alt'></i> Delete</span></a>
                                        </td>
                                    </tr>
                                <?php $counter++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php } ?>

     


    </div> <!-- /.content -->


<?php require_once "includes/footer.php";
}
ob_end_flush();
?>