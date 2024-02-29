<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        
    </thead>
    <tbody>
        <?php 

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row["user_id"];
                $username = $row["username"];
                $user_password = $row["user_password"];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_email = $row["user_email"];
                $user_image = $row["user_image"];
                $user_role = $row["user_role"];

          
                    ?>

                    <tr>
                    <td><?php echo $user_id ;?></td>
                    <td><?php echo $username ;?></td>
                    <td><?php echo $user_firstname ;?></td>
                    <td><?php echo $user_lastname ;?></td>
                    <td><?php echo $user_email ;?></td>
                    <td><?php echo $user_role ;?></td>
                    <td><a href="users.php?make_adm=<?php echo $user_id ; ?>">Admin</a></td>
                    <td><a href="users.php?make_subs=<?php echo $user_id ; ?>">Subscriber</a></td>
                    <td><a href="users.php?source=edit_user&edit_user=<?php echo $user_id ; ?>">Edit</a></td>
                    <td><a href="users.php?delete=<?php echo $user_id ; ?>">Delete</a></td>

                    <tr>
      <?php } ?>

      <?php 

        if (isset($_GET["delete"])) {
            $del_user_id = $_GET["delete"];
            $que = "DELETE FROM users WHERE user_id = {$del_user_id}";
            $del_user_que = mysqli_query($connection,$que);
            header("location: users.php");
        }

        if (isset($_GET["make_adm"])) {
            $make_adm_user_id = $_GET["make_adm"];
            $que = "UPDATE users SET user_role = 'admin' WHERE user_id = $make_adm_user_id";
            $admin_que = mysqli_query($connection,$que);
            if ($admin_que) {
                echo "que running";
            }
            header("location: users.php");
        }

        if (isset($_GET["make_subs"])) {
            $make_subs_user_id = $_GET["make_subs"];
            $que = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $make_subs_user_id";
            $subs_que = mysqli_query($connection,$que);
            if ($subs_que) {
                echo "que running";
            }
            header("location: users.php");
        }
      
      
      ?>
        
    </tbody>
</table>
