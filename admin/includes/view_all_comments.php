<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Responce to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
        
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * FROM comments";
            $select_comments = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row["comment_id"];
            $comment_post_id = $row["comment_post_id"];
            $comment_author = $row["comment_author"];
            $comment_email = $row["comment_email"];
            $comment_content = $row["comment_content"];
            $comment_status = $row["comment_status"];
            $comment_date = $row["comment_date"];

          
                ?>

                    <tr>
                    <td><?php echo $comment_id ;?></td>
                    <td><?php echo $comment_author ;?></td>
                    <td><?php echo $comment_content?></td>
                    <td><?php echo $comment_email ;?></td>
                <?php

                    // $query = "SELECT * FROM category WHERE cat_id = $post_category_id";
                    // $select_categories_id = mysqli_query($connection, $query);
                    // while($row = mysqli_fetch_assoc($select_categories_id)) {
                    //     $cat_id = $row["cat_id"];
                    //     $cat_title = $row["cat_title"];

                    //     echo "<td>{$cat_title}</td>";
                    // }
                
                ?>
                <td><?php echo $comment_status ;?></td>

                <?php 

                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                    $que_for_in_responce_to = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($que_for_in_responce_to)) {
                        $post_id = $row["post_id"];
                        $post_title = $row["post_title"];
                    }
                    if (!$que_for_in_responce_to) {
                        die("Query failed". mysqli_error($connection));
                    }
                ?>
                <td><a href="../post.php?p_id=<?php echo $post_id ;?> "><?php echo $post_title ;?></a></td>

                <td><?php echo $comment_date ;?></td>

                <td><a href='comments.php?approve_c_id=<?php echo $comment_id ;?>'>Approve</a></td>
                <td><a href='comments.php?unapprove_c_id=<?php echo $comment_id ;?>'>Unapprove</a></td>
                <td><a href='comments.php?delete_comment_id=<?php echo $comment_id;?>&cp_id=<?php echo $comment_post_id ;?>'>Delete</a></td>
                </tr>
                
            <?php } ?>
        
    </tbody>
</table>

<?php

if (isset($_GET["approve_c_id"])) {
    $approve_c_id = $_GET["approve_c_id"];
    $que = "UPDATE comments SET comment_status = '&#9989 Approved' WHERE comment_id = $approve_c_id";
    $approve_comment_que = mysqli_query($connection,$que);
    header("location: comments.php");
}

if (isset($_GET["unapprove_c_id"])) {
    $unapprove_c_id = $_GET["unapprove_c_id"];
    $que = "UPDATE comments SET comment_status = '&#10060 Unapproved' WHERE comment_id = $unapprove_c_id";
    $unapprove_comment_que = mysqli_query($connection,$que);
    header("location: comments.php");
}



if (isset($_GET["delete_comment_id"])) {
$delete_comment_id = $_GET["delete_comment_id"];
$query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id}";
$delete_query = mysqli_query($connection, $query);
header("Location: ./comments.php");


}
if (isset($_GET["cp_id"])) {
    $comment_post_id = $_GET["cp_id"];
    $que = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = $comment_post_id";
    $update_post_comment_count = mysqli_query($connection, $que);
    header("Location: ./comments.php");
    
    
}


?>