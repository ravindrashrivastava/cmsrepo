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
                    <!--category form start -->
                    <div class="col-xs-6">

                        <?php insertCategory();?>

                        <form action="categories.php" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                            </div>

                        </form>

                        <?php 
                        if (isset($_GET["edit"])) {
                            $cat_id = $_GET["edit"];
                            include "includes/update_categories.php";
                        }
                        ?>


                        
                    </div>
                    <!--category form end -->

                    <!-- category table display -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Category</th>
                            </thead>
                            <tbody>

                                <?php selectAllCategories(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>
<?php include "includes/admin_footer.php"; ?>