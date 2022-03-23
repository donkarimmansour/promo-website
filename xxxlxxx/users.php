<?php

$pageTitle = basename(__FILE__, ".php");
require_once "includes/header.php";

 if(!isset($_SESSION['admin_id'])){

    header( "Location:index.php");
			exit;
}else{

breadcrumbs("Users", "Users");

$do = isset($_GET["do"]) ? $_GET["do"] : "manage";

if ($do == "manage") {

    $sort = "ASC";

    $arr_sort = array("DESC", "ASC");

    if (isset($_GET["sort"]) && in_array($_GET["sort"], $arr_sort)) {

        $sort = $_GET["sort"];
    }

    $stmt = $db->prepare("SELECT from_unixtime(UNIX_TIMESTAMP(clm_u_date),'%y') as year ,
         from_unixtime(UNIX_TIMESTAMP(clm_u_date),'%M') as month ,
        from_unixtime(UNIX_TIMESTAMP(clm_u_date),'%D') as day ,
         clm_u_id ,clm_u_username , clm_u_email ,clm_u_img
         FROM tbl_users WHERE  clm_u_id != -1 ORDER BY `clm_u_id` $sort");

    $stmt->execute();
    $getAll = $stmt->fetchall();



    if (!empty($getAll)) {
?>

        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>

                    Users
                    <span style="float: right;">
                        <a style="<?php if (isset($_GET["sort"])  && $_GET["sort"] == "ASC") {
                                        echo "font-weight: bold;color:black;";
                                    } else {
                                        echo "font-weight: 400;color:#6c757d;";
                                    } ?>" href="?sort=ASC">Asc</a><span> / </span>
                        <a style="<?php if (isset($_GET["sort"])  && $_GET["sort"] == "DESC") {
                                        echo "font-weight: bold;color:black;";
                                    } else {
                                        echo "font-weight: 400;color:#6c757d;";
                                    } ?>" href="?sort=DESC">Desc</a>
                    </span>

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
                                                <img style="width: 50px; height: 50px;" class="rounded-circle" src="<?php if($get["clm_u_img"] == "empty"){echo '../images/empty.png';}else{echo "../images/users/{$get["clm_u_img"]}";}?>" alt="">
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




            <div>
                <button type="button" class="btn btn-primary btn-lg btn-block">
                    <a style="color: #ffffff;" href="?do=add">Add New Member</a>
                </button>
            </div>


        </div>
        <!-- /.content -->




    <?php


    } else {
        btnAdd("Add New Member");
    }
} else if ($do == "edit") {
    // edit

    $userId = isset($_GET["id"]) && is_numeric($_GET["id"]) ? intval($_GET["id"]) : 0;
    $count = checkItem("tbl_users", "clm_u_id", $userId);

    if ($count > 0) {
        $get = getItem("tbl_users", "clm_u_id", $userId);


    ?>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Edit</h4>
                </div>
                <div class="card-body text-center">

                    <form method="post" id="useredit" enctype="multipart/form-data">

                        <div id="useredit_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                            <strong>xxx</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <input type="hidden" name="id" value="<?php echo  $userId;  ?>">


                        <div class="img_box w-100% ">
                            <div class="row">

                                <div class="col">
                                    <div style="margin:auto;">
                                        <img class="img-fluid rounded" type="image" id="profile_img" src="<?php if($get["clm_u_img"] == "empty"){echo '../images/empty.png';}else{echo "../images/users/{$get["clm_u_img"]}";}?>" alt="add image" style="max-width: 200px;" />
                                    </div>
                                    <div class="col-12 m-3">
                                        <label for="file_img" class="btn">Image</label>
                                        <input class="form-control-file" accept="image/*" style="background: #d0d0e0;" type="file" name="image" id="file_img">
                                    </div>
                                </div>


                            </div>
                        </div>




                        <div class="form-group text-left">
                            <label for="name" class="control-label mb-1">Username</label>
                            <input type="text" id="name" value="<?php echo $get['clm_u_username']; ?>" name="username" class="form-control" placeholder="username">
                            <small id="useredit_name" class="text-danger d-none">please enter the Username</small>

                        </div>
                        <div class="form-group text-left">
                            <label for="pass" class="control-label mb-1">Password</label>
                            <input type="password" id="pass" value="" name="password" class="form-control" placeholder="Password">
                            <input type="hidden" id="oldpass" value="<?php echo $get['clm_u_password']; ?>" name="oldpassword" class="form-control" placeholder="Password">

                        </div>
                        <input type="hidden" name="type" value="useredit">

                        <div class="form-group text-left">
                            <label for="email" class="control-label mb-1">Email</label>
                            <input type="email" id="email" value="<?php echo $get['clm_u_email']; ?>" name="email" class="form-control" placeholder="email">
                            <small id="useredit_email" class="text-danger d-none">please enter the Email</small>

                        </div>

                        <div class="form-group text-left">
                            <label for="personal" class="control-label mb-1">personal Email</label>
                            <input type="email" id="personal" value="<?php echo $get['clm_u_personal']; ?>" name="personal" class="form-control" placeholder="personal email">
                            <small id="useredit_personal" class="text-danger d-none">please enter the personal Email</small>

                        </div>
                        <div class="form-group text-left">
                            <label for="email" class="control-label mb-1">phone number</label>
                            <input type="text" id="phone" value="<?php echo $get['clm_u_phone']; ?>" name="phone" class="form-control" placeholder="phone number">
                            <small id="useredit_phone" class="text-danger d-none">please enter phone number</small>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                <span>Update</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div> <!-- /.card -->

        </div>



    <?php
    } //if 
    /* end page html */
} elseif ($do == "add") {
    ?>

    <!-- Content -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Add</h4>
            </div>
            <div class="card-body text-center">

                <form method="post" id="useradd">

                    <div id="useradd_msg" class="alert  alert-dismissible fade show d-none" role="alert">
                        <strong>xxx</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="img_box w-100% ">
                            <div class="row">

                                <div class="col">
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
                        <label for="name" class="control-label mb-1">Username</label>
                        <input type="text" id="name" name="username" class="form-control" placeholder="username">
                        <small id="useradd_name" class="text-danger d-none">please enter the Username</small>

                    </div>
                    <div class="form-group text-left">
                        <label for="pass" class="control-label mb-1">Password</label>
                        <input type="password" id="pass" name="password" class="form-control" placeholder="Password">
                        <small id="useradd_pass" class="text-danger d-none">please enter the Password</small>

                    </div>
                    <input type="hidden" name="type" value="useradd">

                    <div class="form-group text-left">
                        <label for="email" class="control-label mb-1">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="email">
                        <small id="useradd_email" class="text-danger d-none">please enter the Email</small>

                    </div>
                    <div class="form-group text-left">
                            <label for="personal" class="control-label mb-1">personal Email</label>
                            <input type="email" id="personal"  name="personal" class="form-control" placeholder="personal email">
                            <small id="useredit_personal" class="text-danger d-none">please enter the personal Email</small>

                        </div>
                        <div class="form-group text-left">
                            <label for="email" class="control-label mb-1">phone number</label>
                            <input type="text" id="phone"  name="phone" class="form-control" placeholder="phone number">
                            <small id="useredit_phone" class="text-danger d-none">please enter phone number</small>

                        </div>
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



<?php  } else if ($do == "delete") {


    $userId = isset($_GET["id"]) && is_numeric($_GET["id"]) ? intval($_GET["id"]) : 0;

    $count = checkItems("tbl_users", "clm_u_id", $userId);

    if ($count > 0) {

        $stmt = $db->prepare("DELETE FROM tbl_users WHERE clm_u_id = :ui ");
        $stmt->bindparam("ui", $userId);
        $stmt->execute();

        returnToBack("this user is deleted", "success", "back");

        /* EMPTY*/
    } else {
        returnToBack("this user isn't deleted", "danger", "back");
    }
    /* end page delete */
}


require_once "includes/footer.php";
 }
ob_end_flush();
?>