<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Spotifeed</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="like-controller.js"> </script>
    <script src="comment-controller.js"> </script>
</head>

<body  style="background-color: #161616; font-family: 'Montserrat', sans-serif;">
<?php
session_start();
include("profile-controller.php"); //profile-controller includes posts.php
include("user-controller.php");
include("factory.php");
include("users.php");

//
// =======
// =========================
// CHECK SESSION INFORMATION
// =========================
// =======
//

if ($_SERVER[HTTP_HOST] == "maxedward.com") {

    // -------
    // BASIC USER
    // -------
    include("sidebar-admin.php");
    include("content-account.php");
    $role = "admin";
    $_SESSION['role'] = "admin";

} else {
    $role = false;
    if (isset($_SESSION['role'])) {
        
        //
        // \/ \/ \/ \/ \/ KARIM'S CODE STARTS HERE \/ \/ \/ \/ \/
        if ( (isset($_POST['edit_account_submit'])) && ( $_SESSION['role'] == "admin" || $_SESSION['role'] == "basic" ) )  {
            $fname = $_POST['edit_account_name_first'];
            $lname = $_POST['edit_account_name_last'];
            $desc = $_POST['edit_account_description'];
            $user = $_SESSION['username'];
            $pic_url = $_POST['edit_account_pfp_link'];

            
            updateFname($fname, $user);
            updateLname($lname, $user);
            updateDesc($desc, $user);
            updateProfilePic($user, $pic_url);

            header("Location: /~kg448/account.php");
        }
        // ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
        //

        if ($_SESSION['role'] == "admin") {

            // -------
            // ADMINISTRATOR
            // -------
            include("sidebar-admin.php");
            include("content-account.php");
            $role = "admin";

        } else if ($_SESSION['role'] == "basic") {
            
            // -------
            // BASIC USER
            // -------
            include("sidebar-basic.php");
            include("content-account.php");
            $role = "basic";

        } else {

            // xxxxxxx
            // REDIRECT TO LOGIN
            // xxxxxxx
            header("Location: /~kg448/index.php");

        }
    } else {

        // xxxxxxx
        // REDIRECT TO LOGIN
        // xxxxxxx
        header("Location: /~kg448/index.php"); 

    }
}


?>
</body>
</html>