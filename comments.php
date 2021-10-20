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
       
    //make query
    $q1 = "INSERT INTO comment (post_id, commenter, description, comment_id) VALUES ('$post_id', '$commenter', '$description', '$comment_id')";
    
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
 
 
  ?>
 </body>  
 </html>