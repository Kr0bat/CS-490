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

        $idList = allPostId();

        $likeList = [1, 2];
        //$likeList = userLikes($username);
        
        foreach($postList as $index => $post){
            $post['comments']= SearchCommentByP($post['id']);
            $postList[$index] = $post;

            if ( in_array($post['id'], $likeList) ){
                $postList[$index]['liked'] = true;
                
            }
            else{
                $postList[$index]['liked'] = false;
            }
        }


        
        

        return $postList;
    }
?>

