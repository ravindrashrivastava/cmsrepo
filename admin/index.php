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
                            
                            <small><?php echo $_SESSION["username"]; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                       
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                        
                                            $que = "SELECT * FROM posts";
                                            $post_count_que = mysqli_query($connection, $que);
                                            $post_count = mysqli_num_rows($post_count_que);
                                            echo "<div class='huge'>{$post_count}</div>"
                                        
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php 
                                        
                                        $que = "SELECT * FROM comments";
                                        $comment_count_que = mysqli_query($connection, $que);
                                        $comment_count = mysqli_num_rows($comment_count_que);
                                        echo "<div class='huge'>{$comment_count}</div>"
                                    
                                    ?>

                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            
                                            $que = "SELECT * FROM users";
                                            $user_count_que = mysqli_query($connection, $que);
                                            $user_count = mysqli_num_rows($user_count_que);
                                            echo "<div class='huge'>{$user_count}</div>"
                                        
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            
                                            $que = "SELECT * FROM category";
                                            $category_count_que = mysqli_query($connection, $que);
                                            $category_count = mysqli_num_rows($category_count_que);
                                            echo "<div class='huge'>{$category_count}</div>"
                                        
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                                <!-- /.row -->
                <?php 

                    $que = "SELECT * FROM posts WHERE post_status = 'published'";
                    $published_post_count_que = mysqli_query($connection, $que);
                    $published_post_count = mysqli_num_rows($published_post_count_que);

                    $que = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $draft_post_count_que = mysqli_query($connection, $que);
                    $draft_post_count = mysqli_num_rows($draft_post_count_que);

                    $que = "SELECT * FROM comments WHERE comment_status = '&#10060 Unapproved'";
                    $unapproved_comment_count_que = mysqli_query($connection, $que);
                    $unapproved_comment_count = mysqli_num_rows($unapproved_comment_count_que);

                    $que = "SELECT * FROM users WHERE user_role = 'subscriber'";
                    $subscriber_count_que = mysqli_query($connection, $que);
                    $subscriber_count = mysqli_num_rows($subscriber_count_que);

                
                ?>


                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],

                        <?php 
                        
                        $element_data = ['All Post','Active Post','Draft Post','Comment','Pending Comment','User','Subscribers','Category'];
                        $element_count = [$post_count, $published_post_count, $draft_post_count, $comment_count, $unapproved_comment_count, $user_count, $subscriber_count, $category_count];
                        
                        for ($i=0; $i < 8; $i++) { 
                            echo "['{$element_data[$i]}'" . "," . "{$element_count[$i]}],";
                        }
                        ?>


                        // ['Posts', 1000,],
                        ]);

                        var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>







            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>