<html>
	<head>
		<title>Sample PHP</title>
	</head>
	<body>
 <?php
 
 function insertComment($commenter, $description, $post_id, $comment_id)
 {
     //make database connection
     require('databaseConnect.php');
     
     $new_description = mysqli_real_escape_string($dbc, $description);
       
    //make query
    $q1 = "INSERT INTO comment (post_id, commenter, description, comment_id) VALUES ('$post_id', '$commenter', '$new_description', '$comment_id')";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection 
    mysqli_close($dbc);
 } 
 
 function deleteComment($post_id, $comment_id)
 {
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = "DELETE FROM comment WHERE post_id = '$post_id' AND comment_id = '$comment_id'";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection 
    mysqli_close($dbc);
 }
 
function SearchCommentByC($Commenter)
{

     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = "SELECT description, timestamp FROM comment WHERE commenter = '$Commenter'";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
        $comments[] = $row;
    
    }
    
    //close database connection 
    mysqli_close($dbc);
    
    return $comments;
}

function UpdateComments($description, $Commenter, $post_id, $comment_id)
{
    //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = "UPDATE comment SET description = '$description' WHERE commenter = '$Commenter' AND post_id = '$post_id'  AND comment_id = '$comment_id' ";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection 
    mysqli_close($dbc);
    
}


 
  ?>
 </body>  
 </html>