<html>
<?php
include("comments.php");


if (isset($_REQUEST['username']) && isset($_REQUEST['comment']) && isset($_REQUEST['postId'])){
    $commenter = $_REQUEST['username'];
    $description = $_REQUEST['comment'];
    $post_id = $_REQUEST['postId'];

    
    insertComment($commenter, $description, $post_id);
}

?>
 </html>