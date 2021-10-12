<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<style>
input {
    cursor: pointer;
}
button {
    cursor: pointer;
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
        <a href="/~kg448/feed.php" class="subtitleBold" style="text-decoration: none;">Cancel</a>
    </div>
    <div class="col-12 bodyText" style="font-size: clamp(1rem, max(5vh, 5vw), 4rem); background-color: #161616; text-align: center; padding-top: 5vh; overflow: visible; color: #e8e8e8;">
        New Post
    </div>
</body>
</html>