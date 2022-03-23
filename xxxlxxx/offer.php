<?php
require_once "includes/header.php";


if (!isset($_SESSION['admin_id'])) {
    header("Location:index.php");
    exit;
} else {

breadcrumbs("Website", "Offers");

$do = isset($_GET["do"]) ? $_GET["do"] : "manage";

if ($do == "manage") {

    $sort = "ASC";

    $arr_sort = array("DESC", "ASC");

    if (isset($_GET["sort"]) && in_array($_GET["sort"], $arr_sort)) {

        $sort = $_GET["sort"];
    }

    $stmt = $db->prepare("SELECT * FROM tbl_offer ORDER BY `clm_id` $sort");

    $stmt->execute();
    $getAll = $stmt->fetchall();



    if (!empty($getAll)) {
?>


        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Header Offers
                    <span style="float: right;"> <a href=""> <a href=""></a></a>
                        <a style="<?php if (isset($_GET["sort"])  && $_GET["sort"] == "ASC") {
                                        echo "font-weight: bold;color:black;";
                                    } else {
                                        echo "font-weight: 400;color:#6c757d;";
                                    } ?> ?>" href="?sort=ASC">Asc</a><span> / </span>
                        <a style="<?php if (isset($_GET["sort"])  && $_GET["sort"] == "DESC") {
                                        echo "font-weight: bold;color:black;";
                                    } else {
                                        echo "font-weight: 400;color:#6c757d;";
                                    } ?> ?>" href="?sort=DESC">Desc</a>
                    </span>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th style="text-align: center;">Modify</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th style="text-align: center;">Modify</th>
                                </tr>
                            </tfoot>
                            <tbody>





                                <?php
                                $counter = 1;
                                foreach ($getAll as $get) {
                                ?>
                                    <tr>

                                        <td>#<?php echo $counter; ?>.</td>

                                        <td><?php echo $get["clm_title"]; ?> </td>


                                        <td> #<?php echo $get["clm_id"]; ?> </td>

                                        <td> <?php echo $get["clm_status"]; ?></td>
                                        <td> <?php echo $get["clm_date"]; ?></td>

                                        <td style="text-align: center;">
                                            <a href="?do=edit&id=<?php echo $get["clm_id"]; ?>"><span class="btn btn-success"><i class='fa fa-edit'></i> Edit</span></a>
                                            <a href="?do=delete&id=<?php echo $get["clm_id"]; ?>"><span class="btn btn-danger confirm"><i class='fas fa-trash-alt'></i> Delete</span></a>
                                        </td>
                                    </tr>

                                <?php $counter++;
                                } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div>
                <button type="button" class="btn btn-primary btn-lg btn-block">
                    <a style="color: #ffffff;" href="?do=add">Add a New Offer</a>
                </button>
            </div>


        </div>
        <!-- /.content -->



    <?php


    } else {
        btnAdd("Add a New Offer");
    }
} // end manage => 

elseif ($do == "add") {
    ?>

    <!-- Content -->
    <div class="container">

        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Add</h4>
            </div>
            <div class="card-body-- text-center">
                <div class="sufee-login d-flex align-content-center flex-wrap">
                    <div class="container">

                        <div class="login-content">
                            <div class="login-form">
                                <form method="post" id="offeradd" enctype="multipart/form-data">

                                    <div id="offeradd_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                        <strong>xxx</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="name" class="control-label mb-1">Title</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="title">
                                        <small id="offeradd_name" class="text-danger d-none">please enter the title</small>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="offeradd_type" class=" form-control-label">Type</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="offeradd_type" id="offeradd_type" class="form-control-lg form-control">
                                                <option value="offer">Offer</option>
                                                <option value="link">Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="cuselink" class="control-label mb-1">Link</label>
                                        <input type="text" id="cuselink" name="uselink" class="form-control" placeholder="link" disabled>
                                        <small id="offeradd_link" class="text-danger d-none">please enter the link</small>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="coupon" class="control-label mb-1">coupon</label>
                                        <input type="text" id="coupon" name="coupon" class="form-control" placeholder="coupon">
                                        <small id="offeradd_coupon" class="text-danger d-none">please enter the coupon</small>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="status" class=" form-control-label">Status</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="status" id="status" class="form-control-lg form-control">
                                                <option value="draft">Draft</option>
                                                <option value="publish">Publish</option>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="offeradd_offer" class=" form-control-label">offer</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="offeradd_offer" id="offeradd_offer" class="form-control-lg form-control">

                                                <?php

                                                $offertops = $db->prepare("SELECT tbl_header_offers.clm_id , tbl_header_offers.tbl_name , tbl_header_offers.clm_name FROM tbl_header_offers 
                                                            UNION
                                                            SELECT tbl_main_offers.clm_id , tbl_main_offers.tbl_name  , tbl_main_offers.clm_name FROM  tbl_main_offers 
                                                            UNION
                                                            SELECT tbl_small_offers.clm_id , tbl_small_offers.tbl_name , tbl_small_offers.clm_name  FROM  tbl_small_offers 
                                                            ORDER BY clm_id ;");
                                                $offertops->execute();
                                                $offertopFetch = $offertops->fetchAll();
                                                $offertopCount = $offertops->rowCount();


                                                if ($offertopCount > 0) {
                                                    foreach ($offertopFetch as $offertop) {

                                                ?>
                                                        <option value="<?php echo $offertop["clm_id"] . "@" . $offertop["tbl_name"] ?>"><?php echo "#" . $offertop["clm_id"] . " " .  $offertop["clm_name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="type" value="offeradd">

                                    <div>
                                        <button type="submit" class="btn btn-lg btn-info btn-block">
                                            <span>Add</span>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div> <!-- /.card -->

                    </div>
                    <!-- /.content -->




                    <?php


                } elseif ($do == "edit") {

                    $hoId = isset($_GET["id"]) && is_numeric($_GET["id"]) ? intval($_GET["id"]) : 0;

                    $count = checkItem("tbl_offer", "clm_id", $hoId);

                    if ($count > 0) {
                        $get = getItem("tbl_offer", "clm_id", $hoId);
                    ?>

                        <!-- Content -->
                        <div class="container">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Edit</h4>
                                </div>
                                <div class="card-body-- text-center">
                                    <div class="sufee-login d-flex align-content-center flex-wrap">
                                        <div class="container">


                                            <div class="login-content">
                                                <div class="login-form">
                                                    <form method="post" id="offeredit" enctype="multipart/form-data">

                                                        <div id="offeredit_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                                            <strong>xxx</strong>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="form-group text-left">
                                                            <label for="name" class="control-label mb-1">Title</label>
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="title" value="<?php echo $get["clm_title"]; ?>">
                                                            <small id="offeredit_name" class="text-danger d-none">please enter the title</small>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label for="offeredit_type" class=" form-control-label">Type</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="offeredit_type" id="offeredit_type" class="form-control-lg form-control">
                                                                    <option value="offer" <?php if ($get["clm_type"] == "offer") {
                                                                                                echo "Selected";
                                                                                            } ?>>Offer</option>
                                                                    <option value="link" <?php if ($get["clm_type"] == "link") {
                                                                                                echo "Selected";
                                                                                            } ?>>Link</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="ucuselink" class="control-label mb-1">Link</label>
                                                            <input type="text" id="ucuselink" name="uselink" class="form-control" placeholder="link"
                                                            <?php if ($get["clm_type"] == "offer") { echo "disabled"; } ?> value="<?php if ($get["clm_type"] == "link") {echo $get["clm_link"]; } ?>">
                                                            <small id="offeredit_link" class="text-danger d-none">please enter the link</small>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="coupon" class="control-label mb-1">coupon</label>
                                                            <input type="text" id="coupon" name="coupon" class="form-control" placeholder="coupon" value="<?php echo $get["clm_coupon"]; ?>">
                                                            <small id="offeredit_coupon" class="text-danger d-none">please enter the coupon</small>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label for="status" class=" form-control-label">Status</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="status" id="status" class="form-control-lg form-control">

                                                                    <option value="draft" <?php if ($get["clm_status"] == "draft") {
                                                                                                echo "Selected";
                                                                                            } ?>>Draft</option>
                                                                    <option value="publish" <?php if ($get["clm_status"] == "publish") {
                                                                                                echo "Selected";
                                                                                            } ?>>Publish</option>

                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label for="offeredit_offer" class=" form-control-label">offer</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="offeredit_offer" id="offeredit_offer" class="form-control-lg form-control">


                                                                    <?php

                                                                    $offers = $db->prepare("SELECT tbl_header_offers.clm_id , tbl_header_offers.tbl_name , tbl_header_offers.clm_name FROM tbl_header_offers 
                                                                                            UNION
                                                                                            SELECT tbl_main_offers.clm_id , tbl_main_offers.tbl_name  , tbl_main_offers.clm_name FROM  tbl_main_offers 
                                                                                            UNION
                                                                                            SELECT tbl_small_offers.clm_id , tbl_small_offers.tbl_name , tbl_small_offers.clm_name  FROM  tbl_small_offers 
                                                                                            ORDER BY clm_id ;");
                                                                    $offers->execute();
                                                                    $offerFetch = $offers->fetchAll();
                                                                    $offerCount = $offers->rowCount();


                                                                    if ($offerCount > 0) {
                                                                        foreach ($offerFetch as $offer) {

                                                                    ?>
                                                                            <option value="<?php echo $offer["clm_id"] . "@" . $offer["tbl_name"] ?>" <?php if ($get["clm_offer"] == $offer["clm_id"]) {
                                                                                                                                                        echo "Selected";
                                                                                                                                                    } ?>><?php echo "#" . $offer["clm_id"] . " " .  $offer["clm_name"] ?></option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="type" value="offeredit">
                                                        <input type="hidden" name="id" value="<?php echo $hoId; ?>">

                                                        <div>
                                                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                                                <span>Add</span>
                                                            </button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div> <!-- /.card -->

                                        </div>
                                        <!-- /.content -->




                                <?php

                            } else {
                                $url = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "/";
                                header("location:{$url}");
                                exit();
                            }
                        } else if ($do == "delete") {


                            $Id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? intval($_GET["id"]) : 0;

                            $count = checkItem("tbl_offer", "clm_id", $Id);

                            if ($count > 0) {

                                $stmt = $db->prepare("DELETE FROM tbl_offer WHERE clm_id = :ci ");
                                $stmt->bindparam("ci", $Id);
                                $stmt->execute();

                                returnToBack("this offer is deleted", "success", "back");
                            } else {
                                returnToBack("this offer isn't deleted", "danger", "back");
                            }
                            /* end page delete */
                        }




                        require_once "includes/footer.php";
                      }

                        ob_end_flush();

                                ?>