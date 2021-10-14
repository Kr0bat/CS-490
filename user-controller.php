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
<body>
<?php
session_start();
#include("users.php"); TODO include backend functions

/* TODO, remove validateUser from projectSiteMiddle.php and refactor codebase
function validateUser($username, $passInput){
    $pass = getUserPass($username);
    if ($pass == null){
        return false;
    }

    if (password_verify($pass, $user[password])) {
        return true;
    }
    return false;
}*/

function updateUser(){
    $fname = $_REQUEST['edit_account_name_first'];
    $lname = $_REQUEST['edit_account_name_last'];
    $desc = $_REQUEST['edit_account_description'];
    echo "<p>";
    echo $fname + "\n";
    echo $lname + "\n";
    echo $desc + "\n";
    //TODO: Call post functions in user.php
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    updateUser();
    header("Location: /~kg448/account.php");
}
else{echo "somethings wrong...";}
?>
</body>
</html>