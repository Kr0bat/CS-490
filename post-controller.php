<?php
include("posts.php");
//if a POST request is recieved, call likePost on the given post using the given username
//If the user post is already liked, remove the like



if (isset($_REQUEST['username']) && isset($_REQUEST['id'])){
    $username = $_REQUEST['username'];
    $id = $_REQUEST['id'];
    $liked = false;

    $allLikes = getLikes($id);

    foreach ($allLikes as $likes) {
        if ($likes['liker'] == $username) {
            $liked = true;
        }
    }

    if ($liked){
        removeLike($id, $username);
        echo "post Unliked";
    }
    else{
        likePost($_REQUEST['id'], $_REQUEST['username']);
        echo "post Liked";
    }
}




?>