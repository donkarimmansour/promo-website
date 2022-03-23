<?php
require_once "includes/header.php";


if (!isset($_SESSION['admin_id'])) {
    header("Location:index.php");
    exit;
} else {

breadcrumbs("Website", "Head Offers");

$do = isset($_GET["do"]) ? $_GET["do"] : "manage";

if ($do == "manage") {

    $sort = "ASC";

    $arr_sort = array("DESC", "ASC");

    if (isset($_GET["sort"]) && in_array($_GET["sort"], $arr_sort)) {

        $sort = $_GET["sort"];
    }

    $stmt = $db->prepare("SELECT * FROM tbl_header_offers ORDER BY `clm_id` $sort");

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
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th style="text-align: center;">Modify</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Description</th>
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

                                        <td><?php echo $counter; ?>.</td>

                                        <td> #<?php echo $get["clm_name"]; ?> </td>


                                        <td> #<?php echo $get["clm_id"]; ?> </td>
                                        <td>

                                            <?php

                                            $title = $get["clm_description"];

                                            if (strlen($title) < 20) {
                                                echo $title;
                                            } else {
                                                echo substr($title, 0, 20) . "..";
                                            }

                                            ?> </td>

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
                                <form method="post" id="headoffadd" enctype="multipart/form-data">

                                    <div id="headoffadd_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                        <strong>xxx</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <div class="img_box w-100% ">
                                        <div class="row">

                                            <div class="col-6">
                                                <div style="margin:auto;">
                                                    <img class="img-fluid rounded" type="image" id="profile-img" src="../images/empty.png" alt="add image" style="max-width: 200px;" />
                                                </div>
                                                <div class="col-12 m-3">
                                                    <label for="file-img" class="btn">Logo</label>
                                                    <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="logo" id="file-img">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div style="margin:auto;">
                                                    <img class="img-fluid rounded" type="image" id="profile_img" src="../images/empty.png" alt="add image" style="max-width: 200px;" />
                                                </div>
                                                <div class="col-12 m-3">
                                                    <label for="file_img" class="btn">Image</label>
                                                    <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="image" id="file_img">
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="name" class="control-label mb-1">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="name">
                                        <small id="headoffadd_name" class="text-danger d-none">please enter the name</small>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="description">Description</label>
                                        <textarea type="text" class="form-control" name="description" id="description" rows="5" placeholder="description"></textarea>
                                        <small id="headoffadd_description" class="text-danger d-none">please enter the description</small>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="headoffadd_type" class=" form-control-label">Type</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="headoffadd_type" id="headoffadd_type" class="form-control-lg form-control">
                                                <option value="offer">Offer</option>
                                                <option value="link">Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="uselink" class="control-label mb-1">Link</label>
                                        <input type="text" id="huselink" name="uselink" class="form-control" placeholder="link" disabled>
                                        <small id="headoffadd_link" class="text-danger d-none">please enter the link</small>
                                    </div>


                                    <div class="form-group text-left">
                                        <label for="offername" class="control-label mb-1">Offer Title</label>
                                        <input type="text" id="offername" name="offername" class="form-control" placeholder="Offer Title">
                                        <small id="headoffadd_offername" class="text-danger d-none">please enter the Offer Title</small>
                                    </div>


                                    <div class="form-group text-left">
                                        <label for="coupon" class="control-label mb-1">coupon</label>
                                        <input type="text" id="coupon" name="coupon" class="form-control" placeholder="coupon">
                                        <small id="headoffadd_coupon" class="text-danger d-none">please enter the coupon</small>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="in" class=" form-control-label">Status</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="in" id="in" class="form-control-lg form-control">
                                                <option value="instore">In Store</option>
                                                <option value="online">Online</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="headoffadd_limited" class=" form-control-label">Limited</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="limited" id="headoffadd_limited" class="form-control-lg form-control">
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="form-group text-left">
                                        <label for="date" class="control-label mb-1">Date</label>
                                        <input type="datetime-local" id="date" name="date" class="form-control" placeholder="date" disabled>
                                        <small id="headoffadd_date" class="text-danger d-none">please enter the date</small>
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




                                    <div class="row form-group" id="useparent">
                                        <div class="col col-md-3"><label for="headoffadd_parent" class=" form-control-label">Parent</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="headoffadd_parent" id="headoffadd_parent" class="form-control-lg form-control">

                                                <?php

                                                $categories = getItems("tbl_categories", "*");
                                                $categoriescount = checkItems("tbl_categories", "*");

                                                if ($categoriescount > 0) {
                                                    foreach ($categories as $categorty) {

                                                ?>
                                                        <option value="<?php echo $categorty["clm_id"] ?>"><?php echo "#" . $categorty["clm_id"] . " " .  $categorty["clm_name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="type" value="headoffadd">

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

                    $count = checkItem("tbl_header_offers", "clm_id", $hoId);

                    if ($count > 0) {
                        $get = getItem("tbl_header_offers", "clm_id", $hoId);
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
                                                    <form method="post" id="headofferedit" enctype="multipart/form-data">

                                                        <div id="headofferedit_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                                            <strong>xxx</strong>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="img_box w-100% ">
                                                            <div class="row">

                                                                <div class="col-6">
                                                                    <div style="margin:auto;">
                                                                        <img class="img-fluid rounded" type="image" id="profile-img" src="../images/offers/<?php echo $get["clm_logo"]; ?>" alt="add image" style="max-width: 200px;" />
                                                                    </div>
                                                                    <div class="col-12 m-3">
                                                                        <label for="file-img" class="btn">Logo</label>
                                                                        <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="logo" id="file-img">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div style="margin:auto;">
                                                                        <img class="img-fluid rounded" type="image" id="profile_img" src="../images/offers/<?php echo $get["clm_image"]; ?>" alt="add image" style="max-width: 200px;" />
                                                                    </div>
                                                                    <div class="col-12 m-3">
                                                                        <label for="file_img" class="btn">Image</label>
                                                                        <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="image" id="file_img">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="name" class="control-label mb-1">Name</label>
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="name" value="<?php echo $get["clm_name"]; ?>">
                                                            <small id="headofferedit_name" class="text-danger d-none">please enter the name</small>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="description">Description</label>
                                                            <textarea type="text" class="form-control" name="description" id="description" rows="5" placeholder="description"><?php echo $get["clm_description"]; ?></textarea>
                                                            <small id="headofferedit_description" class="text-danger d-none">please enter the description</small>

                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label for="headofferedit_type" class=" form-control-label">Type</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="headofferedit_type" id="headofferedit_type" class="form-control-lg form-control">
                                                                    <option value="offer" <?php if ($get["clm_type"] == "offer") { echo "Selected";} ?>>Offer</option>
                                                                    <option value="link" <?php if ($get["clm_type"] == "link") {echo "Selected";} ?>>Link</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="euselink" class="control-label mb-1">Link</label>
                                                            <input type="text" id="heuselink" name="uselink" class="form-control" placeholder="link" 
                                                            <?php if ($get["clm_type"] == "link") { echo "enabled"; } else echo "disabled"; ?> 
                                                            value="<?php if ($get["clm_type"] == "link") { echo $get["clm_link"];} ?>">
                                                            <small id="eheadofferedit_link" class="text-danger d-none">please enter the link</small>
                                                        </div>




                                                <div class="form-group text-left">
                                                    <label for="offername" class="control-label mb-1">Offer Title</label>
                                                    <input type="text" id="offername" name="offername" class="form-control" placeholder="Offer Title" value="<?php echo $get["clm_offername"]; ?>">
                                                    <small id="headofferedit_offername" class="text-danger d-none">please enter the Offer Title</small>
                                                </div>


                                                <div class="form-group text-left">
                                                    <label for="coupon" class="control-label mb-1">coupon</label>
                                                    <input type="text" id="coupon" name="coupon" class="form-control" placeholder="coupon" value="<?php echo $get["clm_coupon"]; ?>">
                                                    <small id="headofferedit_coupon" class="text-danger d-none">please enter the coupon</small>
                                                </div>


                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="in" class=" form-control-label">Status</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="in" id="in" class="form-control-lg form-control">
                                                            <option value="instore" <?php if ($get["clm_in"] == "instore") {  echo "Selected";} ?>>In Store</option>
                                                            <option value="online" <?php if ($get["clm_in"] == "online") {  echo "Selected";} ?>>Online</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="headofferedit_limited" class=" form-control-label">Limited</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="limited" id="headofferedit_limited" class="form-control-lg form-control">
                                                            <option value="no" <?php if ($get["clm_limited"] == "no") {  echo "Selected";} ?>>No</option>
                                                            <option value="yes" <?php if ($get["clm_limited"] == "yes") {  echo "Selected";} ?>>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="form-group text-left">
                                                    <label for="date" class="control-label mb-1">Date</label>
                                                    <input type="datetime-local" id="date" name="date" class="form-control" placeholder="date" 
                                                    <?php if ($get["clm_limited"] == "yes") { echo "enabled"; } else echo "disabled"; ?> 
                                                    value="<?php if ($get["clm_limited"] == "yes") { echo date('Y-m-d\TH:i:s', strtotime($get["clm_date"])) ;} ?>">
                                                    <small id="headofferedit_date" class="text-danger d-none">please enter the date</small>
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


                                                        <div class="row form-group" id="useparent">
                                                            <div class="col col-md-3"><label for="headofferedit_parent" class=" form-control-label">Parent</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="headofferedit_parent" id="headofferedit_parent" class="form-control-lg form-control">

                                                                    <?php

                                                                    $categories = getItems("tbl_categories", "*");
                                                                    $categoriescount = checkItems("tbl_categories", "*");

                                                                    if ($categoriescount > 0) {
                                                                        foreach ($categories as $categorty) {

                                                                    ?>
                                                                            <option value="<?php echo $categorty["clm_id"] ?>" <?php if ($get["clm_parent"] == $categorty["clm_id"]) {
                                                                                                                                    echo "Selected";
                                                                                                                                } ?>><?php echo "#" . $categorty["clm_id"] . " " .  $categorty["clm_name"] ?></option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="type" value="headofferedit">
                                                        <input type="hidden" name="id" value="<?php echo $hoId; ?>">

                                                        <div>
                                                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                                                <span>Edit</span>
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

                            $count = checkItem("tbl_header_offers", "clm_id", $Id);

                            if ($count > 0) {

                                $stmt = $db->prepare("DELETE FROM tbl_header_offers WHERE clm_id = :ci ");
                                $stmt->bindparam("ci", $Id);
                                $stmt->execute();

                                returnToBack("this offer is deleted", "success", "back");
                            }else{
                                returnToBack("this offer isn't deleted", "danger", "back");

                            }
                            /* end page delete */
                        }




                        require_once "includes/footer.php";
                       }

                        ob_end_flush();
  ?>