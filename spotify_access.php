<html>
 <?php
 
 function getTokens()
 {
    //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "SELECT * FROM spotify_access_info";
  $r = @mysqli_query ($dbc, $q1); 
  
  //get access token
  if($r)
  {
      while($row = mysqli_fetch_array($r))
      {
          $tokens[] = $row;
      }
      
      return $tokens;
  }
  else
  {
    return 0;
  }
  
  //close database connection
  mysqli_close($dbc);
 }
 
 function UpdateAccessToken($access_token, $new_access_token)
 {
  
   //make database connection
   require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE spotify_access_info SET access_token = '$new_access_token' WHERE access_token = '$access_token'";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  mysqli_close($dbc);
  
}

function UpdateRefreshToken($refresh_token, $new_refresh_token)
{
  
   //make database connection
   require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE spotify_access_info SET refresh_token = '$new_refresh_token' WHERE refresh_token = '$refresh_token'";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  mysqli_close($dbc);
  
}

function UpdateExpiration($expiration, $new_expiration)
{
  
   //make database connection
   require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE spotify_access_info SET expiration = '$new_expiration' WHERE expiration = '$expiration'";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  mysqli_close($dbc);
  
}

 ?>
 </html>