<!DOCTYPE html>
<html lang="en">

<?php
session_start();
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
    $role = "basic";
    include("sidebar-admin.php");

} else {
    $role = false;
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {

            // -------
            // ADMINISTRATOR
            // -------
            $role = "admin";
            include("sidebar-admin.php");

        } else if ($_SESSION['role'] == "basic") {
            
            // -------
            // BASIC USER
            // -------
            $role = "basic";
            include("sidebar-basic.php");

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

    //
    // \/ \/ \/ \/ \/ KARIM'S CODE STARTS HERE \/ \/ \/ \/ \/
    if (isset($_POST['newpost_submit'])){
        include("posts.php");
        $title = $_POST['newpost_title'];
        $link = $_POST['newpost_link'];
        $description = $_POST['newpost_description'];
        $user = $_SESSION['username'];

        $user = ucfirst($user);
        insertPost($user, $title, $description, $link);
        header("Location: /~kg448/feed.php");
    }
    // ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
    //
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
    border-radius: 1ch;
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
    <!--div class="col-12 subtitleBold" style="text-align: left; margin: max(1ch, 2vh) 0 0 max(2ch, 2vw)">
        <a href="/~kg448/feed.php" class="subtitleBold" style="text-decoration: none; font-size: 18px">Cancel</a>
    </div-->
    <div class="col-12 titleBold" style="text-align: center; margin-top: 3ch;">
        New Post
    </div>
    <div class="col-8 push-2 colsm-12 pushsm-0 bodyLight newPostBackBox" style="text-align: left; margin-top: 3ch;">
        <form method="POST">
            <div class="col-10 push-1" style="margin: 2ch 1ch 0.5ch 1ch;">
                <div class="col-55 colsm-10 pushsm-1">
                    <input maxlength="40" type="text" name="newpost_title" placeholder="Title of your post" value="" style="width: 100%; background-color: #000; border-color: #090909; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
                <div class="col-55 push-1 colsm-10 pushsm-1">
                    <input maxlength="100" type="text" name="newpost_link" placeholder="Paste Spotify song link here" value="" style="width: 100%; background-color: #000; border-color: #090909; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
            </div>
            <div class="col-10 push-1" style="margin: 1ch 1ch 2ch 1ch;">
                <input maxlength="240" type="text" name="newpost_description" placeholder="Add your own description here" value="" style="width: 100%; background-color: #000; border-color: #090909; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7.5ch; vertical-align: top;" required />
            </div>
            <div class="col-10 push-1" style="margin: 0.5ch 1ch 2ch 1ch;">
                <button type="submit" name="newpost_submit" style="width: 50%; background-color: #2e7934; border-color: #2e7934; border-style: outset; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 0.5ch 0;">Post</button>
            </div>
        </form>
    </div>
</body>
</html>