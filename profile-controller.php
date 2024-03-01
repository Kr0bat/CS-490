<?php
include("posts.php");
include("comments.php");
include("users.php");
include("text-controller.php");


    function getUserPosts($username, $user = null){ 
        //$username is the user being looked up, while $user is the user who is looking up a user
        //$user is used to see if a user has liked posts from the profile that the user is looking at


        $postList = [];
        $postList = searchPostByC($username);

        if (!$user){
            $user = $username;
        }

        /*
        foreach($postList as $index => $post){ 
            $post['comments'] = [];
            $postList[$index] = $post;
        }*/
        
        //print_r($postList)

        $idList = allPostId();

        $likeList = searchPostIdbyLiker($user);
        
        foreach($postList as $index => $post){
            //$post['comments']= SearchCommentByP($post['id']);
            $postList[$index] = $post;
            $postList[$index]['description'] = richText( $postList[$index]['description'] );
            $postList[$index]['title'] = richText( $postList[$index]['title'] );


            $likeCount = count(getLikes($post['id']));
            $postList[$index]['likeCount'] = $likeCount;

            if ( in_array($post['id'], $likeList) ){
                $postList[$index]['liked'] = true;
                
            }
            else{
                $postList[$index]['liked'] = false;
            }

            $rawComments = SearchCommentByP($post['id']);
            $comments = [];

            foreach($rawComments as $comNum => $rawComment){
                $comments[$comNum]["description"] = richText( $rawComment["description"] );
                $comments[$comNum]["timestamp"] = $rawComment["timestamp"];
                //$comments[$index]["commenter"] = $rawComment["creator"];
                $comments[$comNum]["creator"] = $rawComment["commenter"];
                //$comments[$index]["creator"]["profile_picture"] = 
            }

            $postList[$index]["comments"] = $comments;
        }


        
        
        
        $postList = array_reverse($postList);
        return $postList;
    }
?>

