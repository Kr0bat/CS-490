<html>
	<head>
		<title>Sample PHP</title>
	</head>
	<body>
 <?php
 
 function insertPost($username, $title, $description, $link)
 {
     //make database connection
     require('databaseConnect.php');
     
     $new_title = mysqli_real_escape_string($dbc, $title);
     $new_description = mysqli_real_escape_string($dbc, $description);
     
       
    //make query
    $q1 = " INSERT INTO post (Title, Description, Link, Creator) VALUES ('$new_title', '$new_description', '$link', '$username')";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
 
    //close database connection
    mysqli_close($dbc);
 }
 
 function getPost($id)
 {
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = " SELECT Title AS title, Description AS description, Link AS link, Creator AS creator, id as id FROM post WHERE id = '$id'";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    
    //close database connection
    mysqli_close($dbc);
    
    return $row;
 }
 
 function allPostId()
 {
    //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = " SELECT id AS i FROM post";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
        $id[] = $row['i'];
    
    }
    
    //close database connection
    mysqli_close($dbc);
    
    return $id;
 }
 
 function allPost()
 {
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = " SELECT Title AS title, Description AS description, Link AS link, Creator AS creator, id as id FROM post ORDER BY Timestamp";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
        $posts[] = $row;
    }
    
    //close database connection
    mysqli_close($dbc);
    
    return $posts;
 }
 
 function searchPostByT($Title)
 {
     //make database connection
     require('databaseConnect.php');
     
     //make query
     $q1 = "SELECT Title AS title, Description AS description, Link AS link, Creator AS creator, id AS id FROM post WHERE Title LIKE '%$Title%'";
     $r = @mysqli_query ($dbc, $q1); 
     
     // get list of users
     if($r)
     { 
    
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
           
            $posts[] = $row;
            
        }    
        
        return $posts; 
    }
    else
    {
        return 0;
    }
 }
 
 function searchPostByD($Description)
 {
     //make database connection
     require('databaseConnect.php');
     
     //make query
     $q1 = "SELECT Title AS title, Description AS description, Link AS link, Creator AS creator, id AS id FROM post WHERE Description LIKE
     '%$Description%'";
     $r = @mysqli_query ($dbc, $q1); 
     
     // get list of users
     if($r)
     { 
    
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
           
            $posts[] = $row;
            
        }    
        
        return $posts; 
    }
    else
    {
        return 0;
    }
 } 
 
 function searchPostByC($Creator)
 {
     //make database connection
     require('databaseConnect.php');
     
     //make query
     $q1 = "SELECT Title AS title, Description AS description, Link AS link, Creator AS creator, id as id FROM post WHERE Creator = '$Creator'";
     $r = @mysqli_query ($dbc, $q1); 
     
     // get list of posts
     if($r)
     { 
    
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
           
            $posts[] = $row;
            
        }    
        
        return $posts; 
    }
    else
    {
        return 0;
    }
 } 
 
 function removePost($id)
 {
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = "DELETE FROM post WHERE id = $id";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection
    mysqli_close($dbc);
 }
 
 function likePost($post_id, $liker)
{
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = "INSERT INTO likes (post_id, liker) VALUES ('$post_id', '$liker')";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection 
    mysqli_close($dbc);

}
 
 function getLikes($post_id)
 {
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = " SELECT liker FROM likes WHERE post_id = '$post_id'";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    // get list of likes
     if($r)
     { 
    
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
           
            $likes[] = $row;
            
        }    
        
        return $likes; 
    }
    else
    {
        return 0;
    }
    
 }
 
 ?>
 </body> 
 </html>