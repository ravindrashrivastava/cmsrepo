<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                    <?php
                        if (isset($_GET["source"])) {
                            $source = $_GET["source"];
                        } else {
                            $source ="";
                        }
                        switch ($source) {
                            case 10:
                                echo "this is 10";
                                break;
                            case 15:
                                echo "this is 15";
                                break;
                            case 200:
                                echo "this is 200";
                                break;
                            default:
                                include "includes/view_all_post.php";
                                break;
                        }
                    ?>
                  
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>