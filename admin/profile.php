
<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome
                        <small><?php echo $_SESSION["username"] ;?></small>
                    </h1>
                    <?php

                        // User profile data display

                        if (isset($_SESSION["username"])) {
                            $username = $_SESSION["username"];

                            $que = "SELECT * FROM users WHERE username = '{$username}'";
                            $select_user_profile_que = mysqli_query($connection, $que);

                            while ($row = mysqli_fetch_array($select_user_profile_que)) {
                                $user_id = $row["user_id"];
                                $user_password = $row["user_password"];
                                $user_firstname = $row["user_firstname"];
                                $user_lastname = $row["user_lastname"];
                                $user_role = $row["user_role"];
                                $user_email = $row["user_email"];

                            }
                        }

                        //  User profile update

                        if (isset($_POST["update_user"])) {

                            $user_firstname = $_POST["user_firstname"];
                            $user_lastname = $_POST["user_lastname"];
                            $user_role = $_POST["user_role"];
                            $user_email = $_POST["user_email"];
                            $username = $_POST["username"];
                            $user_password = $_POST["user_password"];


                            $que = "UPDATE users SET user_firstname = '{$user_firstname}',  user_lastname = '{$user_lastname}', user_role = '{$user_role}', user_email = '{$user_email}',username = '{$username}' WHERE username = '{$username}'";


                            $user_profile_update_que = mysqli_query($connection,$que);

                            if (!$user_profile_update_que) {
                                echo "query failed";
                            }

                        }

                    
                    ?>

                    <!-- User profile form -->

                    <form action=""class="col-xs-6" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ;?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Last Name</label>
                            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ;?>">
                        </div>
                        <div class="form-group">
                            <select name="user_role" id="" >

                            <option value="<?php echo $user_role ;?>"><?php echo $user_role ;?></option>
                            <?php 

                                if ($user_role == 'subscriber') {
                                    echo "<option value='admin'>admin</option>";
                                } else {
                                    echo "<option value='admin'>subscriber</option>";
                                }

                            ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_status">Email</label>
                            <input type="text" class="form-control" name="user_email" value="<?php echo $user_email ;?>">
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username ;?>">
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Password</label>
                            <input type="text" class="form-control" name="user_password" value="<?php echo $user_password ;?>">
                        </div>
                            <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile">
                        </div>


                    </form>
                  
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>
<?php include "includes/admin_footer.php"; ?>