<!DOCTYPE html>
<html lang="en">

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
    include("sidebar-basic.php");
    include("content-feed.php");
    $role = "basic";

} else {
    $role = false;
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {

            // -------
            // ADMINISTRATOR
            // -------
            include("sidebar-admin.php");
            include("content-feed.php");
            $role = "admin";

        } else if ($_SESSION['role'] == "basic") {
            
            // -------
            // BASIC USER
            // -------
            include("sidebar-basic.php");
            include("content-feed.php");
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

<style>
input {
    cursor: pointer;
}
button {
    cursor: pointer;
}

.newPostBackBox {
    border-radius: 2.5ch;
    background: #1b1b1bff;
    border-color: #373737;
    border-width: 0.35ch;
    border-style: solid;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating New Spotifeed Post</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="shortcut icon" type="image/jpg" href="assets/favicon.ico">
    
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body style="background-color: #161616; font-family: 'Montserrat', sans-serif;">
    <div class="col-12 subtitleBold" style="text-align: left; margin: max(1ch, 2vh) 0 0 max(2ch, 2vw)">
        <a href="/~kg448/feed.php" class="subtitleBold" style="text-decoration: none; font-size: 18px">Cancel</a>
    </div>
    <div class="col-12 titleBold" style="text-align: center; margin-top: 3ch;">
        New Post
    </div>
    <div class="col-8 push-2 colsm-12 pushsm-0 bodyLight newPostBackBox" style="text-align: left; margin-top: 3ch;">
        <form method="POST">
            <div class="col-10 push-1" style="margin: 2ch 1ch 0.5ch 1ch;">
                <div class="col-55 colsm-10 pushsm-1">
                    <input type="text" name="newpost_title" placeholder="Title of your post" value="" style="width: 100%; background-color: #000; border-color: #56b35e; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
                <div class="col-55 push-1 colsm-10 pushsm-1">
                    <input type="text" name="newpost_link" placeholder="Paste Spotify song link here" value="" style="width: 100%; background-color: #000; border-color: #56b35e; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
            </div>
            <div class="col-10 push-1" style="margin: 1ch 1ch 2ch 1ch;">
                <input maxlength="280" type="text" name="newpost_description" placeholder="Add your own description here" value="" style="width: 100%; background-color: #000; border-color: #56b35e; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7.5ch; vertical-align: top;" required />
            </div>
            <div class="col-10 push-1" style="margin: 0.5ch 1ch 2ch 1ch;">
                <button type="submit" name="newpost_submit" style="width: 50%; background-color: #56b35e; border-color: #56b35e; border-style: outset; color: #000; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 0.5ch 0;"><strong>Post</strong></button>
            </div>
        </form>
    </div>
</body>
</html>