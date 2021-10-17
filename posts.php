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
       
    //make query
    $q1 = " INSERT INTO post (Title, Description, Link, Creator) VALUES ('$title', '$description', '$link', '$username')";
    
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
    $q1 = " SELECT Title AS title, Description AS description, Link AS link, Creator AS creator  FROM post WHERE id = '$id'";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    
    //close database connection
    mysqli_close($dbc);
    
    return $row;
 }
 
 ?>
 </body> 
 </html>