<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | Spotifeed</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body  style="background-color: #161616; font-family: 'Montserrat', sans-serif;">
<?php
session_start();
include("users.php");
include("chats.php");
//
// =======
// =========================
// CHECK SESSION INFORMATION
// =========================
// =======
//

if ($_SERVER[HTTP_HOST] == "maxedward.com") {

    // -------
    // ADMIN USER
    // -------
    include("sidebar-admin.php");
    $role = "admin";
    $showIndividual = false;

    if (isset($_GET['chatWith'])) {
        
        // TODO: VERIFY USER EXISTS IN DATABASE
        $userExists = true;
        if (true) {
            $showIndividual = true;
        }
        
    }

    if ($showIndividual) {
        $_SESSION['chatWith'] = $_GET['chatWith'];
        include("content-chat-individual.php");
    } else {
        include("content-chat.php");
    }

} else {
    if ( (isset($_POST['newdm_submit'])) && ( $_SESSION['role'] == "admin" || $_SESSION['role'] == "basic" ) ){
        $recipient = $_SESSION['chatWith'];
        $msg = $_POST['newdm_msg'];
        $sender = $_SESSION['username'];

        sendChat($recipient, $sender, $msg);
    }

    $role = false;
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {

            // -------
            // ADMINISTRATOR
            // -------
            include("sidebar-admin.php");
            $role = "admin";
            $showIndividual = false;

            if (isset($_GET['chatWith'])) {
                
                
                $userExists = true;
                if ( getProfile($_GET['chatWith']) ) {
                    $showIndividual = true;
                }

            }

            if ($showIndividual) {
                $_SESSION['chatWith'] = $_GET['chatWith'];
                include("content-chat-individual.php");
            } else {
                include("content-chat.php");
            }

        } else if ($_SESSION['role'] == "basic") {
            
            // -------
            // BASIC USER
            // -------
            include("sidebar-basic.php");
            $role = "basic";
            $showIndividual = false;

            if (isset($_GET['chatWith'])) {
                
                $userExists = true;
                if ( getProfile($_GET['chatWith']) ) {
                    $showIndividual = true;
                }

            }

            if ($showIndividual) {
                $_SESSION['chatWith'] = $_GET['chatWith'];
                include("content-chat-individual.php");
            } else {
                include("content-chat.php");
            }

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