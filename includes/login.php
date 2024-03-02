<?php include "db.php";
session_start();
// $connection = mysqli_connect("localhost","root","","cmsrepo");
// if ($connection) {
//     echo "connected";
// } else {
//     echo "not connected";
// }

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    $que = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_que = mysqli_query($connection, $que);

    if (!$select_user_que) {
        die("error". mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_que)) {
        $db_user_id = $row["user_id"];
        $db_username = $row["username"];
        $db_user_password = $row["user_password"];
        $db_user_firstname = $row["user_firstname"];
        $db_user_lastname = $row["user_lastname"];
        $db_user_role = $row["user_role"];

    }

    echo $db_username;

    if ($username === $db_username && $password === $db_user_password) {
        $_SESSION["username"] = $db_username;
        $_SESSION["firstname"] = $db_firstname;
        $_SESSION["lastname"] = $db_lastname;
        $_SESSION["user_role"] = $db_user_role;
        // echo "session set";
        header("Location: ../admin");



    } else {
        header("Location: ../index.php");
        // echo "wrong";
    }
    // echo $_SESSION["username"];
}


?>