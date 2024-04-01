
<?php include "includes/header.php";?>
    <!-- Navigation -->
    <?php include "includes/navigation.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                if (isset($_GET["p_id"])) {
                    $post_id = $_GET["p_id"];
                }

                include "includes/db.php";
                $query = "SELECT * FROM posts WHERE post_id = $post_id";
                $select_all_post_query = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_post_query)){
                    $post_id = $row["post_id"];
                    $post_title = $row["post_title"];
                    $post_author = $row["post_author"];
                    $post_date = $row["post_date"];
                    $post_image = $row["post_image"];
                    $post_content = substr($row["post_content"],0);
                    $post_tags = $row["post_tags"];

                    if ($post_status !== 'published') {
                        # code...
                    }


                    ?>;
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ;?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p>
                    <span class="glyphicon glyphicon-time"></span><?php echo $post_date ?>
                </p>
                <hr>
                <img class="img-responsive" src="images\<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>

                <?php } ?>

                
                <!-- Blog Comments -->

                <?php 
                
                if (isset($_POST["comment_submit"])) {
                    $comment_post_id = $_GET["p_id"];
                    $comment_author = $_POST["comment_author"];
                    $comment_email = $_POST["comment_email"];
                    $comment_content = $_POST["comment_content"];

                    $que = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ($comment_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now()) ";

                    $comment_create_que = mysqli_query($connection,$que);
                    if (!$comment_create_que) {
                       die('Query Failed'.mysqli_error($connection));
                    }

                    $que = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $comment_post_id";
                    $post_comment_count_que = mysqli_query($connection,$que);
                   
                    
                }
                
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                           <label for="author">Author</label>
                        <input class="form-control" type="text" name="comment_author" id="author">
                        </div>
                        <div class="form-group">
                           <label for="email">Email</label>
                        <input class="form-control" type="email" name="comment_email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content" id="comment"></textarea>
                        </div>
                        <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

        

<?php include "includes/footer.php";?>
