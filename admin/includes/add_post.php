<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["create_post"])) {
    $post_title = $_POST["post_title"];
    $post_category_id = $_POST["post_category_id"];
    $post_author = $_POST["post_author"];
    $post_status = $_POST["post_status"];

    $post_image = $_FILES["post_image"]["name"];
    $post_image_temp =$_FILES["post_image"]["tmp_name"];

    $post_tags = $_POST["post_tags"];
    $post_content = $_POST["post_content"];
    $post_date = date("d-m-y");
    $post_title = $_POST["post_title"];
    $post_comment_count = 0;


    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts (post_category_id, post_title, post_author,post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}',now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";


    $connection = mysqli_connect("localhost","root","","cmsrepo");

    $create_post_query = mysqli_query($connection, $query);

    if (!$create_post_query) {
    die("Querry Failed " . mysqli_error($connection));
    } else {
        echo "<h2 class='text-success'>Post created sucessfully</h2>";
    }
}

?>

<form action=""class="col-xs-6" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="title">PostCategory</label>
        <select name="post_category_id" id="">
            <option>Select Category</option>
            <?php 
            $que = "SELECT * FROM category";
            $display_cat_que = mysqli_query($connection, $que);
            while ($row = mysqli_fetch_assoc($display_cat_que)) {
                $cat_title = $row["cat_title"];
                $cat_id = $row["cat_id"];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <option value="draft">draft</option>
            <option value="published">published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Post Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
    
</form>
<?php include "includes/admin_footer.php"; ?>