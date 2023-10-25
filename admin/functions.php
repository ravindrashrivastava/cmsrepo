<?php

function insertCategory() {
    global $connection;
    if (isset($_POST["submit"])) {
        $cat_title = $_POST["cat_title"];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO category(cat_title) VALUE ('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {
                die("Query Failed".mysqli_error($connection));
            }
        }
    }
}

function selectAllCategories() {
    global $connection;
    $query = "SELECT * FROM category";
    $select_category = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_category)) {
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];
        echo "<tr>";
        echo "<td>{$cat_id}</td>" ;
        echo "<td>{$cat_title}</td>" ;
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>" ;
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>" ;
        echo "</tr>";
    }

    if (isset($_GET["delete"])) {
        $del_cat_id = $_GET["delete"];
        $query = "DELETE FROM category WHERE cat_id = {$del_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }

}
