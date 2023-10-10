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
                            <form action="">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat-title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                                
                            </form>
                        </div> 
                        <!--category form end -->
                        <table class="table table-bordered">
                            <thead>
                                <th>Id</th>
                                <th>Category</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>asia</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>europe</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>amri</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>asia</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>