<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Spotifeed</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="like-controller.js"> </script>
    <script src="api-controller.js"> </script>
    <script src="comment-controller.js"> </script>
</head>

<body  style="background-color: #161616; font-family: 'Montserrat', sans-serif;">
<?php
session_start();
include("users.php");
include("posts.php");
include("follows.php");
include("comments.php");

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
    include("content-search.php");
    $role = "basic";

} else {
    $role = false;
    if (isset($_SESSION['role'])) {

        //
        // \/ \/ \/ \/ \/ KARIM'S CODE STARTS HERE \/ \/ \/ \/ \/
        if ( (isset($_POST['delete_post_submit'])) && ( $_SESSION['role'] == "admin" || $_SESSION['role'] == "basic" ) )  {
            $newPostID = $_POST['delete_post_id'];
            $creator = $_POST['delete_post_creator'];

            //print($newPostID.'<br/>'.$creator.'<br/>');

            if ($_SESSION['role'] == "admin" || ( strtolower($_SESSION['username']) == strtolower($creator)) ) {
                removePost($newPostID);
                print('
                <header>
                    <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: max(1.35vw, 2.5vh); color: #eaeaea; background-color: #9c5151ff">
                        Post (ID #'.$newPostID.') successfully deleted
                    </div>
                </header>');
                //header("Location: /~kg448/feed.php?deleteMsgPost=$newPostID");
                //print('Has rights');
            } else {
                //print('Cannot do that');
            }

        }

        if ( (isset($_POST['follow_submit'])) && ( $_SESSION['role'] == "admin" || $_SESSION['role'] == "basic" ) ) {

            $followee = $_POST['follow_username'];
            $searchMsg = $_POST['follow_search_msg'];
            $viewAll = $_POST['follow_view_all'];

            if (isFollowing($_SESSION['username'], $followee)) {
                unfollow($_SESSION['username'], $followee);
            } else {
                follow($_SESSION['username'], $followee);
            }

            header('Location: /~kg448/search.php?search_msg='.$searchMsg.'&viewAll='.$viewAll);
        }
        // ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
        //


        if ($_SESSION['role'] == "admin") {

            // -------
            // ADMINISTRATOR
            // -------
            include("sidebar-admin.php");
            include("content-search.php");
            $role = "admin";

        } else if ($_SESSION['role'] == "basic") {
            
            // -------
            // BASIC USER
            // -------
            include("sidebar-basic.php");
            include("content-search.php");
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