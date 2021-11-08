<html>
 <?php
 
 function getChat($recipient, $sender)
 {
     //make database connection
     require('databaseConnect.php');
       
    //make query
    $q1 = " SELECT message AS msg, time AS t, sender AS s, recipient_read AS r, recipient as recipient FROM chat WHERE (sender = '$sender' AND recipient = '$recipient') OR (sender = '$recipient' AND recipient = '$sender')";
    
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
    $q1 = " SELECT sender AS s FROM chat WHERE recipient = '$recipient'";
    
    $r = @mysqli_query ($dbc, $q1);
    
    //get list of chats
    
    if($r)
    { 
    
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
            if(in_array($row['s'], $usernames))
            {
                    continue;
            }
            else
            {
                    $usernames[] = $row['s'];
            }
        }    
        
         
    }
    else
    {
        return 0;
    }
    
    
    //make query
    $q2 = " SELECT recipient AS s FROM chat WHERE sender = '$recipient'";
    $r = @mysqli_query ($dbc, $q2);
    
     while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
     {
            if(in_array($row['s'], $usernames))
            {
                    continue;
            }
            else
            {
                    $usernames[] = $row['s'];
            }
     }    
    
    return $usernames;
}

function setRead($recipient, $sender)
{
    //make database connection
    require('databaseConnect.php');
    
    //make query
    $q1 = " UPDATE chat SET recipient_read = 1  WHERE (sender = '$sender' AND recipient = '$recipient')";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection
    mysqli_close($dbc);
  
}

function sendChat($recipient, $sender, $message)
{
    //make database connection
    require('databaseConnect.php');
    
    $new_message = mysqli_real_escape_string($dbc, $message);
    
    //make query
    $q1 = "INSERT INTO chat (recipient, sender, message) VALUES ('$recipient', '$sender', '$new_message') ";
    
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection
     mysqli_close($dbc);
    
}
//print_r(getChat("Karim", "Max"));
?>
 </html>