<?php
require_once "includes/header.php";


if (!isset($_SESSION['admin_id'])) {
    header("Location:index.php");
    exit;
} else {

breadcrumbs("Blog", "Blog");


$do = isset($_GET["do"]) ? $_GET["do"] : "manage";

if ($do == "manage") {

    $sort = "ASC";

    $arr_sort = array("DESC", "ASC");

    if (isset($_GET["sort"]) && in_array($_GET["sort"], $arr_sort)) {

        $sort = $_GET["sort"];
    }

    $stmt = $db->prepare("SELECT * FROM tbl_blog ORDER BY `clm_id` $sort");

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
                    <a style="color: #ffffff;" href="?do=add">Add a New Article</a>
                </button>
            </div>


        </div>
        <!-- /.content -->



    <?php


    } else {
        btnAdd("Add a New Article");
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
                                <form method="post" id="blogadd" enctype="multipart/form-data">

                                    <div id="blogadd_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                        <strong>xxx</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <div class="img_box w-100% ">
                                        <div style="margin:auto;">
                                            <img class="img-fluid rounded" type="image" id="profile_img" src="../images/empty.png" alt="add image" style="max-width: 200px;" />
                                        </div>
                                        <div class="col-12 m-3">
                                            <label for="file_img" class="btn">Image</label>
                                            <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="image" id="file_img">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="name" class="control-label mb-1">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="name">
                                        <small id="blogadd_name" class="text-danger d-none">please enter the name</small>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="blogadd_text">Text</label>
                                        <textarea type="text" class="form-control" name="text" id="blogadd_text" rows="5" placeholder="text"></textarea>
                                        <small id="blogadd_textt" class="text-danger d-none">please enter the text</small>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="blogadd_type" class=" form-control-label">Type</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="blogadd_type" id="blogadd_type" class="form-control-lg form-control">
                                                <option value="article" checked>Article</option>
                                                <option value="link">Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="uselink" class="control-label mb-1">Link</label>
                                        <input type="text" id="buselink" name="uselink" class="form-control" placeholder="link" disabled>
                                        <small id="blogadd_link" class="text-danger d-none">please enter the link</small>
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
                                        <div class="col col-md-3"><label for="blogadd_parent" class=" form-control-label">Parent</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="blogadd_parent" id="blogadd_parent" class="form-control-lg form-control">

                                                <?php

                                                $categories =  getItemsBySelector("tbl_categories", "clm_place", "blog");
                                                $categoriescount = checkItem("tbl_categories", "clm_place", "blog");

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

                                    <input type="hidden" name="type" value="blogadd">

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

                    $count = checkItem("tbl_blog", "clm_id", $hoId);

                    if ($count > 0) {
                        $get = getItem("tbl_blog", "clm_id", $hoId);
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
                                                    <form method="post" id="blogedit" enctype="multipart/form-data">

                                                        <div id="blogedit_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                                                            <strong>xxx</strong>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="img_box w-100% ">
                                                            <div style="margin:auto;">
                                                                <img class="img-fluid rounded" type="image" id="profile_img" src="../images/blog/<?php echo $get["clm_image"]; ?>" alt="add image" style="max-width: 200px;" />
                                                            </div>
                                                            <div class="col-12 m-3">
                                                                <label for="file_img" class="btn">Image</label>
                                                                <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="image" id="file_img">
                                                            </div>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="name" class="control-label mb-1">Name</label>
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="name" value="<?php echo $get["clm_name"]; ?>">
                                                            <small id="blogedit_name" class="text-danger d-none">please enter the name</small>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="eblogedit_text">Text</label>
                                                            <textarea type="text" class="form-control" name="text" id="eblogedit_text" rows="5" placeholder="text"><?php echo $get["clm_text"]; ?></textarea>
                                                            <small id="blogedit_textt" class="text-danger d-none">please enter the text</small>

                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col col-md-3"><label for="blogedit_type" class=" form-control-label">Type</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="blogedit_type" id="blogedit_type" class="form-control-lg form-control">
                                                                    <option value="article" <?php if ($get["clm_type"] == "offer") {
                                                                                                echo "Selected";
                                                                                            } ?>>Article</option>
                                                                    <option value="link" <?php if ($get["clm_type"] == "link") {
                                                                                                echo "Selected";
                                                                                            } ?>>Link</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group text-left">
                                                            <label for="euselink" class="control-label mb-1">Link</label>
                                                            <input type="text" id="beuselink" name="uselink" class="form-control" placeholder="link" <?php if ($get["clm_type"] == "link") {
                                                                                                                                                            echo "enabled";
                                                                                                                                                        } else echo "disabled"; ?> value="<?php if ($get["clm_type"] == "link") {
                                                                                                                                                                                                echo $get["clm_link"];
                                                                                                                                                                                            } ?>">
                                                            <small id="eblogedit_link" class="text-danger d-none">please enter the link</small>
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
                                                            <div class="col col-md-3"><label for="blogedit_parent" class=" form-control-label">Parent</label></div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="blogedit_parent" id="blogedit_parent" class="form-control-lg form-control">

                                                                    <?php


                                                                    $categories =  getItemsBySelector("tbl_categories", "clm_place", "blog");
                                                                    $categoriescount = checkItem("tbl_categories", "clm_place", "blog");

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

                                                        <input type="hidden" name="type" value="blogedit">
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

                            $count = checkItem("tbl_blog", "clm_id", $Id);

                            if ($count > 0) {

                                $stmt = $db->prepare("DELETE FROM tbl_blog WHERE clm_id = :ci ");
                                $stmt->bindparam("ci", $Id);
                                $stmt->execute();

                                returnToBack("this offer is deleted", "success", "back");
                            } else {
                                returnToBack("this offer isn't deleted", "danger", "back");
                            }
                            /* end page delete */
                        }


 

                                require_once "includes/footer.php";







                                ?>

                                <script src="includes/tinymce/tinymce.min.js"></script>
                                <script>
                                    function myTinymce(id) {
                                        tinymce.init({
                                            selector: id,
                                            height: 600,
                                            plugins: 'print preview paste importcss searchreplace autolink autosave  directionality code visualblocks visualchars fullscreen image link media  codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap  emoticons',
                                            imagetools_cors_hosts: ['picsum.photos'],
                                            menubar: 'file edit view  format tools table help',
                                            toolbar: 'undo redo  | image_upload bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  link anchor | ltr rtl',
                                            toolbar_sticky: true,

                                            setup: function(ed) {

                                             var fileInput = $('<input id="tinymce-uploader"  type="file" name="pic" accept="image/*" style="display:none">');
                                                   $(ed.getElement()).parent().append(fileInput);

                                             fileInput.on("change", function() {

                                             if (this.files && this.files[0]) {

                                                 let reader = new FileReader();
                                                 let formData = new FormData()
                                                 formData.append("image", this.files[0]) ,

                                                 reader.onload = function () {
                                                    $.ajax({
                                                        url: "upload.php",
                                                        type: "post",
                                                        data: formData ,
                                                        contentType: false,
                                                        processData: false,
                                                        async: false,
                                                        success: function(response) {
                                                            if (response) {
                                                                ed.insertContent('<img src="../images/articale/' + response + '"/>');
                                                            }
                                                        }
                                                    
                                                    });
                                                }
                                                 reader.readAsDataURL(this.files[0]);

                                                }

                                                });

                                                ed.ui.registry.addButton('image_upload', {
                                                    tooltip: 'Upload Image',
                                                    icon: 'image',
                                                    onAction: function() {
                                                        fileInput.trigger('click');
                                                    }
                                                });

                                            }

                                        });

                                    }

                                    myTinymce("#blogadd_text")
                                    myTinymce("#eblogedit_text")
                                </script>
                                <?php




                     }

                                ob_end_flush();

                                ?>
                                
                                
                                       
