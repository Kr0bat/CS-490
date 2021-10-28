<?php
include("posts.php");
include("comments.php");

    function getUserPosts($username){
        $postList = [];
        $postList = searchPostByC($username);

        /*
        foreach($postList as $index => $post){ 
            $post['comments'] = [];
            $postList[$index] = $post;
        }*/
        
        //print_r($postList)

        
        foreach($postList as $index => $post){
            $post['comments']= SearchCommentByP($post['id']);
            $postList[$index] = $post;
        }
        

        return $postList;
    }
?>

