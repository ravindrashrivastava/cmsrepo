<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET["edit_user"])) {

    echo $edit_user_id = $_GET["edit_user"];

    $que = "SELECT * FROM users WHERE user_id = $edit_user_id";

    $user_details_display_que = mysqli_query($connection,$que);
    while ($row = mysqli_fetch_assoc($user_details_display_que)) {
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_role = $row["user_role"];
        $user_email = $row["user_email"];
        $username = $row["username"];
        $user_password = $row["user_password"];
    }
    

}

if (isset($_POST["update_user"])) {
        $user_firstname = $_POST["user_firstname"];
        $user_lastname = $_POST["user_lastname"];
        $user_role = $_POST["user_role"];
        $user_email = $_POST["user_email"];
        $username = $_POST["username"];
        $user_password = $_POST["user_password"];


        $que = "UPDATE users SET user_firstname = '{$user_firstname}',  user_lastname = '{$user_lastname}', user_role = '{$user_role}', user_email = '{$user_email}', username = '{$username}' WHERE user_id = $edit_user_id";

        echo $que;

        $user_update_que = mysqli_query($connection,$que);



}


//     $user_firstname = $_POST["user_firstname"];
//     $user_lastname = $_POST["user_lastname"];
//     $user_role = $_POST["user_role"];
//     $user_email = $_POST["user_email"];
//     $username = $_POST["username"];
//     $user_password = $_POST["user_password"];

    
//     $query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_email, username, user_password, user_image, randSalt) VALUES('{$user_firstname}' , '{$user_lastname}', '{$user_role}', '{$user_email}', '{$username}', '{$user_password}','','')";

//     $connection = mysqli_connect("localhost","root","","cmsrepo");

//     $create_user_query = mysqli_query($connection, $query);

//     if (!$create_user_query) {
//       die("Querry Failed " . mysqli_error($connection));
//     } else {
//         echo "<h2 class='text-success'>User created sucessfully</h2>";
//     }
// }

?>

<form action=""class="col-xs-6" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ;?>">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ;?>">
    </div>
    <div class="form-group">
        <select name="user_role" id="" >

            <option value="<?php echo $user_role ;?>"><?php echo $user_role ;?></option>
            <?php 
            
                if ($user_role == 'subscriber') {
                    echo "<option value='admin'>admin</option>";
                } else {
                    echo "<option value='admin'>subscriber</option>";
                }

            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="post_status">Email</label>
        <input type="text" class="form-control" name="user_email" value="<?php echo $user_email ;?>">
    </div>
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ;?>">
    </div>
    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="text" class="form-control" name="user_password" value="<?php echo $user_password ;?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>
    
    
</form>
<?php include "includes/admin_footer.php"; ?>