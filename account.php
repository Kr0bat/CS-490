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
</head>

<body  style="background-color: #161616; font-family: 'Montserrat', sans-serif;">
<?php
session_start();
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
    include("https://maxedward.com/~kg448/sidebar-basic.php");
    include("https://maxedward.com/~kg448/content-account.php");
    $role = "basic";


} else {
    $role = false;
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {

            // -------
            // ADMINISTRATOR
            // -------
            include("https://maxedward.com/~kg448/sidebar-admin.php");
            include("https://maxedward.com/~kg448/content-account.php");
            $role = "admin";

        } else if ($_SESSION['role'] == "basic") {
            
            // -------
            // BASIC USER
            // -------
            include("https://maxedward.com/~kg448/sidebar-basic.php");
            include("https://maxedward.com/~kg448/content-account.php");
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