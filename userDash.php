<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<?php
include("initializeMiddle.php");

session_start();

function grabArray( $textFile ) {
    $remove = "\n";
    $tab = " ";
    $file = $textFile;
    $fopen = fopen($file, r);
    $fread = fread($fopen,filesize($file));
    fclose($fopen);
    $split = explode($remove, $fread);
    $array = array();
    foreach ($split as $string) {
        if ($string != NULL && $string != "\n") {
            $array[] = explode($tab, $string);
        }
    }      
    return $array; 
}

//
// -----
// LOG OUT
// -----
//
if (isset($_GET['logout'])) {
    $_SESSION['role'] = 'logged out';
    $_SESSION['username'] = '';
    $_SESSION['password'] = '';
    header("Location: index.php");
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "basic") {
        //print("<br/>Successful PM Login<br/>");
        include("content-user.php");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
?>

<body style="background-color: #2f3a41; font-family: Avenir;">
    <div class="col-12 bodyText" style="font-size: 3vh; margin-top: 0.5vh; color: black; font-weight: 600; text-align: center; vertical-align: bottom;">
        <a href="index.php" class="bodyText" style="font-size: 1.75vh; font-weight: 600; text-align: center; vertical-align: bottom;">
            <div class="col-3 push-05 bodyText" style="font-size: 1.75vh; margin-top: 1vh; color: #a3c7e3; font-weight: 600; text-align: center; vertical-align: bottom; background-color: rgba(60, 86, 102, 0.57); padding: 1vh 1vw; border-radius: 1vh; text-decoration: none; border-color: #db9291; border-width: 1vh;">
                Log Out
            </div>
        <a>
    </div>
    <div class="col-12" style="text-align: center; margin: 10vh 0; font-size: 5rem; color: #eaeaea;; font-weight: bolder;">
        Basic User Dashboard
    </div>
</body>
</html>