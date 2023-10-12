<?php include "includes/admin_header.php"; ?>

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
                            <?php 
                            
                            if (isset($_GET["submit"])){
                                $cat_title = $_GET["cat_title"];

                                if ($cat_title == "" || empty($cat_title)) {
                                    echo "This field should not be empty";
                                } else {
                                    $query = "INSERT INTO category(cat_title) VALUE ('{$cat_title}')";
                                    $create_category_query = mysqli_query($connection, $query);
                                    if(!$create_category_query){
                                        die("Query Failed".mysqli_error($connection));
                                    }
                                }
                            }
                            
                            ?>
                            <form action="categories.php" method="get">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                                
                            </form>
                        </div> 
                        <!--category form end -->
                        <div class="col-xs-6">
                            <?php 
                                $query = "SELECT * FROM category";
                                $select_category = mysqli_query($connection,$query);
                               
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Category</th>
                                </thead>
                                <tbody>

                                    <?php 
                                    while ($row = mysqli_fetch_assoc($select_category)) {
                                        $cat_id = $row["cat_id"];
                                        $cat_title = $row["cat_title"];
                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>" ;
                                        echo "<td>{$cat_title}</td>" ;
                                        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>" ;
                                        echo "</tr>";
                                    }
                                
                                    ?>

                                    <?php 
                                    
                                    if (isset($_GET["delete"])) {
                                    $del_cat_id = $_GET["delete"];
                                    $query = "DELETE FROM category WHERE cat_id = {$del_cat_id}";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                    }
                                    
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper --> include "includes/admin_footer.php"; ?>