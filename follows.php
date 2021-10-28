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
 
 function SearchPostbyFollow($follower)
 {
     //make database connection
     require('databaseConnect.php');
     
     //make query
     $q1 = "SELECT follower AS follower, username AS username FROM follows WHERE follower = '$follower'";
     $r = @mysqli_query ($dbc, $q1); 
     
     // check all of the users follower follows
     if($r)
     { 
        
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $followList[] = $row;
        
        
        if($row == 0)
        {
           return 0;
        }
        else
        {
            while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
            {
                 $followList[] = $row;
            }
        }
    }
    else
    {
         return 0;
    }
    
    foreach($followList as $value)
    {
          //make query
         $q2 = "SELECT Title AS title, Description AS description, Link AS link, Creator AS creator FROM post WHERE Creator = '$value[username]'";
         $r = @mysqli_query ($dbc, $q2); 
     
         // get list of posts
         if($r)
         { 
    
                while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                {
           
                 $posts[] = $row;
            
                }    
         }
         else
         {
             return 0;
         }
    
    }
    
    return $posts;
    
    
}
 
 
 ?>
 </body> 
 </html>