<?php
require_once "includes/header.php";


if (!isset($_SESSION['admin_id'])) {
    header("Location:index.php");
    exit;
} else {

breadcrumbs("Website", "Links");

$do = isset($_GET["do"]) ? $_GET["do"] : "manage";

if ($do == "manage") {

    $sort = "ASC";

    $arr_sort = array("DESC", "ASC");

    if (isset($_GET["sort"]) && in_array($_GET["sort"], $arr_sort)) {

        $sort = $_GET["sort"];
    }

    $stmt = $db->prepare("SELECT * FROM tbl_links ORDER BY `clm_id` $sort");

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
                                    <th>ID</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th style="text-align: center;">Modify</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Link</th>
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


                                        <td> #<?php echo $get["clm_id"]; ?> </td>
                                        <td>

                                            <?php

                                            $title = $get["clm_link"];

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
                    <a style="color: #ffffff;" href="?do=add">Add a New Link</a>
                </button>
            </div>


        </div>
        <!-- /.content -->



    <?php


    } else {
        btnAdd("Add a New Link");
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
                                <form method="post" id="linkadd" enctype="multipart/form-data">

                                    <div id="linkadd_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                        <strong>xxx</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <div class="img_box w-100% ">
                                        <div class="row">

                                            <div class="col">
                                                <div style="margin:auto;">
                                                    <img class="img-fluid rounded" type="image" id="profile-img" src="../images/empty.png" alt="add image" style="max-width: 200px;" />
                                                </div>
                                                <div class="col-12 m-3">
                                                    <label for="file-img" class="btn">Logo</label>
                                                    <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="logo" id="file-img">
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>


           

                                    <div class="form-group text-left">
                                        <label for="uselink" class="control-label mb-1">Link</label>
                                        <input type="text" id="uselink" name="uselink" class="form-control" placeholder="link">
                                        <small id="linkadd_link" class="text-danger d-none">please enter the link</small>
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
                                        <div class="col col-md-3"><label for="linkadd_parent" class=" form-control-label">Parent</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="linkadd_parent" id="linkadd_parent" class="form-control-lg form-control">

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

                                    <input type="hidden" name="type" value="linkadd">

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

                    $count = checkItem("tbl_links", "clm_id", $hoId);

                    if ($count > 0) {
                        $get = getItem("tbl_links", "clm_id", $hoId);
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
                                                    <form method="post" id="linkedit" enctype="multipart/form-data">

                                                        <div id="linkedit_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                                            <strong>xxx</strong>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="img_box w-100% ">
                                                            <div class="row">

                                                                <div class="col">
                                                                    <div style="margin:auto;">
                                                                        <img class="img-fluid rounded" type="image" id="profile-img" src="../images/links/<?php echo $get["clm_image"]; ?>" alt="add image" style="max-width: 200px;" />
                                                                    </div>
                                                                    <div class="col-12 m-3">
                                                                        <label for="file-img" class="btn">Logo</label>
                                                                        <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="logo" id="file-img">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>



                

                                                        <div class="form-group text-left">
                                                            <label for="euselink" class="control-label mb-1">Link</label>
                                                            <input type="text" id="euselink" name="uselink" class="form-control" placeholder="link"
                                                             value="<?php echo $get["clm_link"]; ?>">
                                                            <small id="elinkedit_link" class="text-danger d-none">please enter the link</small>
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
                                                            <div class="col col-md-3"><label for="linkedit_parent" class=" form-control-label">Parent</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="linkedit_parent" id="linkedit_parent" class="form-control-lg form-control">
                                                               
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

                                                        <input type="hidden" name="type" value="linkedit">
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

                            $count = checkItem("tbl_links", "clm_id", $Id);

                            if ($count > 0) {

                                $stmt = $db->prepare("DELETE FROM tbl_links WHERE clm_id = :ci ");
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