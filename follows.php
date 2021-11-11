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
 
 function unfollow($follower, $username)
 {
     //make database connection
     require('databaseConnect.php');
     
       
    //make query
    $q1 = " DELETE FROM follows WHERE follower = '$follower' AND username = '$username' ";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
 
    //close database connection
    mysqli_close($dbc);
 }
 
 function isFollowing($follower, $username)
 {
      //make database connection
     require('databaseConnect.php');
     
     //make query
     $q1 = "SELECT follower, username FROM follows WHERE follower = '$follower' AND username = '$username' ";
     $r = @mysqli_query ($dbc, $q1); 
     
     // check if user follows 
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
             return 1;
        }
     }
     else
     {
          return 0;
     }
     
    
 
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
         $q2 = "SELECT id FROM post WHERE Creator = '$value[username]'";
         $r = @mysqli_query ($dbc, $q2); 
     
         // get list of posts id
         if($r)
         { 
    
                while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                {
           
                 $posts[] = $row['id'];
                }    
         }
         else
         {
             return 0;
         }
    
    }
    
    rsort($posts);
    return $posts;
    
}

function grabAllfollowers($username)
 {
     //make database connection
     require('databaseConnect.php');
     
       
    //make query
    $q1 = "SELECT follower FROM follows WHERE username = '$username'";
    $r = @mysqli_query ($dbc, $q1); 
    
     if($r)
     { 
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
           $follower[] = $row;
        }    
        
        return $follower;
        
     }
     else
     {
         return 0;
     }
    
    //close database connection
    mysqli_close($dbc);
 }


 ?>
 </body> 
 </html>