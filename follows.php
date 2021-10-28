<html>
	<head>
		<title>Sample PHP</title>
	</head>
	<body>
 <?php
 
function follow($follower, $username)
 {
     //make database connection
     require('databaseConnect.php');
     
       
    //make query
    $q1 = " INSERT INTO follows (follower, username) VALUES ('$follower', '$username')";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
 
    //close database connection
    mysqli_close($dbc);
 }
 
 function SearchPostbyFollow($follower, $username)
 {
     //make database connection
     require('databaseConnect.php');
     
     //make query
     $q1 = "SELECT follower AS follower, username AS username FROM follows WHERE follower = '$follower' AND username = '$username'";
     $r = @mysqli_query ($dbc, $q1); 
     
     // check if user follows other user
     if($r)
     { 
        
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        
        if($row == 0)
        {
           return 0;
        }
        else
        {
            //make query
            $q2 = "SELECT Title AS title, Description AS description, Link AS link, Creator AS creator FROM post WHERE Creator = '$username'";
            $r = @mysqli_query ($dbc, $q2); 
     
           // get list of posts
           if($r)
           { 
    
                while($row2 = mysqli_fetch_array($r, MYSQLI_ASSOC))
               {
           
                    $posts[] = $row2;
            
               }    
        
               return $posts; 
            }
        }
    }
 }
 
 
 ?>
 </body> 
 </html>