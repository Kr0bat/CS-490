<html>
	<head>
		<title>Sample PHP</title>
	</head>
	<body>
 <?php
 
 function getChat($recipient, $sender)
 {
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = " SELECT message AS msg, time AS t, sender AS s FROM chat WHERE (sender = '$sender' AND recipient = '$recipient') OR (sender = '$recipient'
    AND recipient = '$sender')";
    
    $r = @mysqli_query ($dbc, $q1);
    
    //get chat
    if($r)
    { 
    
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
        $chat[] = $row;
    }
    
        return $chat; 
    
    }
    else
    {
        return 0;
    }
    
}

function allChats($recipient)
{
    //make database connection
    require('databaseConnect.php');
    
    //make query
    $q1 = " SELECT sender AS s FROM chat WHERE recipient = '$recipient' ";
    
    $r = @mysqli_query ($dbc, $q1);
    
    //get list of chats
    
    if($r)
    { 
    
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
             $usernames[] = $row;
        }
        
        return $usernames; 
    }
    else
    {
        return 0;
    }
  
}


?>
 </body>
 </html>