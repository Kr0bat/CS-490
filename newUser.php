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
    $role = "admin";
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
    if (isset($_POST['newuser_submit'])){



        $username = $_POST['newuser_username'];
        $password = $_POST['newuser_password'];
        $type = $_POST['newuser_type'];
        $firstName = $_POST['newuser_first'];
        $lastName = $_POST['newuser_last'];

        if ($type == "on") {
            $type = "admin";
        } else {
            $type = "basic";
        }
        
        if ( is_null(getProfile($username)) ){
            createAccount($username, $password, $type, $firstName, $lastName);
            header("Location: /~kg448/feed.php?successMsgUser=$username");
        }
        else {
            print('
            <header>
                <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: max(1.35vw, 2.5vh); color: #eaeaea; background-color: #9c5151ff">
                    '.$username.' already exists
                </div>
            </header>');
        }
        
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
    <title>Creating New User</title>
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
        Add New User
    </div>
    <div class="col-8 push-2 colsm-12 pushsm-0 bodyLight newPostBackBox" style="text-align: left; margin-top: 3ch;">
        <form method="POST">
            <div class="col-10 push-1" style="margin: 2ch 0 0.5ch 0;">
                <div class="col-12">
                    <input maxlength="40" type="text" name="newuser_username" placeholder="Username" value="" style="width: 100%; background-color: #000; border-color: #090909; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
            </div>
            <div class="col-10 push-1" style="margin: 2ch 0 0.5ch 0;">
                <div class="col-12">
                    <input maxlength="100" type="password" name="newuser_password" placeholder="Password" value="" style="width: 100%; background-color: #000; border-color: #090909; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
            </div>
            <div class="col-10 push-1" style="margin: 2ch 0 0.5ch 0;">
                <div class="col-55 colsm-12 pushsm-0" style="margin-bottom: 2ch;">
                    <input maxlength="40" type="text" name="newuser_first" placeholder="First Name" value="" style="width: 100%; background-color: #000; border-color: #090909; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
                <div class="col-55 push-1 colsm-12 pushsm-0">
                    <input maxlength="40" type="text" name="newuser_last" placeholder="Last Name" value="" style="width: 100%; background-color: #000; border-color: #090909; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px;" required />
                </div>
            </div>
            <div class="col-10 push-1" style="margin: 2ch 0 1ch 0;">
                <div class="col-6 push-3">
                    <input type="checkbox" name="newuser_type"> Make Admin?
                </div>
            </div>
            <div class="col-10 push-1" style="margin: 1ch 0 2ch 0;">
                <button type="submit" name="newuser_submit" style="width: 50%; background-color: #2e7934; border-color: #2e7934; border-style: outset; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 0.5ch 0;">Create User</button>
            </div>
        </form>
    </div>
</body>
</html>