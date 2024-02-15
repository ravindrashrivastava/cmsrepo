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
            <th>Edit</th>
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
                <td>some text</td>
                <td><?php echo $comment_date ;?></td>

                <td><a href='posts.php?<?php ?>'>Approve</a></td>
                <td><a href='posts.php?<?php ?>'>Unapprove</a></td>
                
                <td><a href='posts.php?<?php ?>'>Edit</a></td>
                <td><a href='posts.php?<?php ?>'>Delete</a></td>
                </tr>
                
            <?php } ?>
        
    </tbody>
</table>

<?php
if (isset($_GET["delete"])) {
$post_id = $_GET["delete"];
$query = "DELETE FROM posts WHERE post_id = {$post_id}";
$delete_query = mysqli_query($connection, $query);
header("Location: ./posts.php");
}


?>