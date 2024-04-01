<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["create_user"])) {
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $user_email = $_POST["user_email"];
    $username = $_POST["username"];
    $user_password = $_POST["user_password"];

    
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_email, username, user_password, user_image, randSalt) VALUES('{$user_firstname}' , '{$user_lastname}', '{$user_role}', '{$user_email}', '{$username}', '{$user_password}','','')";

    $connection = mysqli_connect("localhost","root","","cmsrepo");

    $create_user_query = mysqli_query($connection, $query);


    if (!$create_user_query) {
      die("Querry Failed " . mysqli_error($connection));
    } else {
        echo "<h2 class='text-success'>User created sucessfully</h2>";
        echo "<a href='./users.php?source=includes/view_all_users.php'>view users</a> ";
    }
}
?>

<form action=""class="col-xs-6" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Role</option>
            <option value="subscriber">subscriber</option>
            <option value="admin">admin</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_status">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_content">Password</label>
        <input class="form-control" name="user_password" type="password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
    
    
</form>
<?php include "includes/admin_footer.php"; ?>