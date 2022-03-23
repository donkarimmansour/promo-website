<?php
require_once "includes/header.php";


if (!isset($_SESSION['admin_id'])) {
    header("Location:index.php");
    exit;
} else {

breadcrumbs("Website", "categories");

$do = isset($_GET["do"]) ? $_GET["do"] : "manage";

if ($do == "manage") {

    $sort = "ASC";

    $arr_sort = array("DESC", "ASC");

    if (isset($_GET["sort"]) && in_array($_GET["sort"], $arr_sort)) {

        $sort = $_GET["sort"];
    }

    $stmt = $db->prepare("SELECT * FROM tbl_categories ORDER BY `clm_id` $sort");

    $stmt->execute();
    $getAll = $stmt->fetchall();



    if (!empty($getAll)) {
?>


        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Catygories
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
                    <a style="color: #ffffff;" href="?do=add">Add a New Category</a>
                </button>
            </div>


        </div>
        <!-- /.content -->



    <?php


    } else {
        btnAdd("Add a New Category");
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
                                <form method="post" id="catyadd">

                                    <div id="catyadd_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                        <strong>xxx</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="name" class="control-label mb-1">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="name">
                                        <small id="catyadd_name" class="text-danger d-none">please enter the name</small>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="description">Description</label>
                                        <textarea type="text" class="form-control" name="description" id="description" rows="5" placeholder="description"></textarea>
                                        <small id="catyadd_description" class="text-danger d-none">please enter the description</small>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="catyadd_type" class=" form-control-label">Type</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catyadd_type" id="catyadd_type" class="form-control-lg form-control">
                                                <option value="category">Category</option>
                                                <option value="link">Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group text-left" >
                                        <label for="uselink" class="control-label mb-1">Link</label>
                                        <input type="text" id="uselink" name="uselink" class="form-control" placeholder="link" disabled>
                                        <small id="catyadd_link" class="text-danger d-none">please enter the link</small>
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
                                        <div class="col col-md-3"><label for="catyadd_place" class=" form-control-label">Place</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catyadd_place" id="catyadd_place" class="form-control-lg form-control">
                                                <option value="blog">Blog</option>
                                                <option value="website">Website</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group" id="useparent" >
                                        <div class="col col-md-3"><label for="catyadd_parent" class=" form-control-label">Parent</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catyadd_parent" id="catyadd_parent" class="form-control-lg form-control" disabled> 

                                            <?php

                                                $categories = getItems("tbl_categories", "*");
                                                $categoriescount = checkItems("tbl_categories", "*");

                                                if ($categoriescount > 0) {
                                                    foreach ($categories as $categorty) {

                                                ?>
                                                        <option value="<?php echo $categorty["clm_id"] ?>"><?php echo "#". $categorty["clm_id"] ." ".  $categorty["clm_name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="type" value="catyadd">
                                    
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


} 




elseif ($do == "edit") {

    $categoryId = isset($_GET["id"]) && is_numeric($_GET["id"]) ? intval($_GET["id"]) : 0;

    $count = checkItem("tbl_categories", "clm_id", $categoryId);

    if ($count > 0) {
        $get = getItem("tbl_categories", "clm_id", $categoryId);
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
                                <form method="post" id="catyedit">

                                    <div id="catyedit_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                        <strong>xxx</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="name" class="control-label mb-1">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="name"  value="<?php echo $get["clm_name"];?>"  >
                                        <small id="catyedit_name" class="text-danger d-none">please enter the name</small>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="description">Description</label>
                                        <textarea type="text" class="form-control" name="description" id="description" rows="5" placeholder="description"><?php echo $get["clm_description"];?></textarea>
                                        <small id="catyedit_description" class="text-danger d-none">please enter the description</small>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="catyedit_type" class=" form-control-label">Type</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catyedit_type" id="catyedit_type" class="form-control-lg form-control">
                                                <option value="category" <?php if ($get["clm_type"] == "category") { echo "Selected";} ?>>category</option>
                                                <option value="link" <?php if ($get["clm_type"] == "link") { echo "Selected";} ?>>Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group text-left" >
                                        <label for="euselink" class="control-label mb-1">Link</label>
                                        <input type="text" id="euselink" name="uselink" class="form-control" placeholder="link" 
                                        <?php if($get["clm_type"] == "link"){ echo "enabled";} else echo "disabled" ;?>  
                                        value="<?php if($get["clm_type"] == "link"){ echo $get["clm_link"];}?>" >
                                        <small id="ecatyedit_link" class="text-danger d-none">please enter the link</small>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="status" class=" form-control-label">Status</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="status" id="status" class="form-control-lg form-control">
                         
                                        <option value="draft" <?php if ($get["clm_status"] == "draft") { echo "Selected";} ?>>Draft</option>
                                        <option value="publish" <?php if ($get["clm_status"] == "publish") { echo "Selected";} ?>>Publish</option>
                                        
                                    </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="catyedit_place" class=" form-control-label">Place</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catyedit_place" id="catyedit_place" class="form-control-lg form-control">
                                                 <option value="blog" <?php if ($get["clm_place"] == "blog") { echo "Selected";} ?>>Blog</option>
                                                 <option value="website" <?php if ($get["clm_place"] == "website") { echo "Selected";} ?>>Website</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group" id="useparent" >
                                        <div class="col col-md-3"><label for="catyedit_parent" class=" form-control-label">Parent</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catyedit_parent" id="catyedit_parent" class="form-control-lg form-control"> 
                                            <?php

                                                $categories = getItems("tbl_categories", "*");
                                                $categoriescount = checkItems("tbl_categories", "*");

                                                if ($categoriescount > 0) {
                                                    foreach ($categories as $categorty) {

                                                ?>
                                                <option value="<?php echo $categorty["clm_id"] ?>"   <?php if ($get["clm_parent"] == $categorty["clm_id"]) { echo "Selected";} ?>><?php echo "#". $categorty["clm_id"] ." ".  $categorty["clm_name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="type" value="catyedit">
                                    <input type="hidden" name="id" value="<?php echo $categoryId;?>">
                                    
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

 }else{
        $url = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "/";
        header("location:{$url}");
        exit();
    }
 
}else if ($do == "delete") {


    $categoryId = isset($_GET["id"]) && is_numeric($_GET["id"]) ? intval($_GET["id"]) : 0;

    $count = checkItem("tbl_categories", "clm_id", $categoryId);

    if ($count > 0) {

        $stmt = $db->prepare("DELETE FROM tbl_categories WHERE clm_id = :ci ");
        $stmt->bindparam("ci", $categoryId);
        $stmt->execute();

        returnToBack("this category is deleted", "success", "back");

    }else{
        returnToBack("this category isn't deleted", "danger", "back");

    }
    /* end page delete */
}




require_once "includes/footer.php";
 }

ob_end_flush();

    ?>