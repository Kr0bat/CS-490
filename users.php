<html>
 <?php

function getPass($username)
{
  //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "SELECT password AS pword FROM user WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //get user's password
  if($r)
  {
    $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
    return $row['pword'];
  }
  else
  {
    return 0;
  }
  
  //close database connection
  mysqli_close($dbc);
  
}

function getProfile($username)
{
 //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "SELECT first_name AS fname, last_name AS lname, pfp_url AS profile_picture, description AS profile_description, username  FROM user WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //get user's info
  if($r)
  {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    return $row;
  }
  else
  {
    return 0;
  }
  
}

function updateFname($fname, $username)
{
  //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE user SET first_name = '$fname' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  mysqli_close($dbc);
  
}

function updateLname($lname, $username)
{
 //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE user SET last_name = '$lname' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  mysqli_close($dbc);
  
}

function updateDesc($desc, $username)
{
  
   //make database connection
   require('databaseConnect.php');
   
   $new_desc = mysqli_real_escape_string($dbc, $desc);
   
  //make query
  $q1 = "UPDATE user SET description = '$new_desc' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  mysqli_close($dbc);
  
}

function userSearch($username)
{
   //make database connection
   require('databaseConnect.php');
   
  //make query
  $q1 = "SELECT username AS s FROM user WHERE username LIKE '%$username%' OR first_name LIKE '%$username%' OR last_name LIKE '%$username%' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  // get list of users
  if($r)
    { 
    
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
            //echo $row[s];
            $usernames[] = $row['s'];
            
        }    
        
        return $usernames; 
    }
    else
    {
        return 0;
    }
}

function isAdmin($username)
{
  //make database connection
  require('databaseConnect.php');
    
  //make query
  $q1 = "SELECT type AS t FROM user WHERE username = '$username' ";
  
  //execute query
  $r = @mysqli_query ($dbc, $q1);
  
  
  if($r)
  {
      $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
      if($row['t'] == 'admin')
      {
          return 1;
      }
      else
      {
          return 0;
      }
  }
  else
  {
      return 0;
  }
  
}

function updateProfilePic($username, $pic_url)
{
    //make database connection
    require('databaseConnect.php');
    
    //make query
    $q1 = "UPDATE user SET pfp_url = '$pic_url' WHERE username = '$username'";
  
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection
    mysqli_close($dbc);
    
}

function createAccount($username, $password, $type, $firstName, $lastName)
{
    //make database connection
    require('databaseConnect.php');
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    //make query
    $q1 = "INSERT INTO user (username, password, type, first_name, last_name) VALUES ('$username', '$hashed_password', '$type', '$firstName', '$lastName')";
  
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection
    mysqli_close($dbc);  

}

function blockAccount($username)
{
    //make database connection
    require('databaseConnect.php');
    
    //make query
    $q1 = "UPDATE user SET blocked_status = 1 WHERE username = '$username'";
  
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection
    mysqli_close($dbc);  
}

function unblockAccount($username)
{
    //make database connection
    require('databaseConnect.php');
    
    //make query
    $q1 = "UPDATE user SET blocked_status = 0 WHERE username = '$username'";
  
    //execute query
    $r = @mysqli_query ($dbc, $q1);
    
    //close database connection
    mysqli_close($dbc);  
}

function isBlocked($username)
{
  //make database connection
  require('databaseConnect.php');
    
  //make query
  $q1 = "SELECT blocked_status as bt FROM user WHERE username = '$username' ";
  
  //execute query
  $r = @mysqli_query ($dbc, $q1);
  
  
  if($r)
  {
      $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
      if($row['bt'] == 1)
      {
          return 1;
      }
      else
      {
          return 0;
      }
  }
  else
  {
      return 0;
  }
}

 ?>
 </html>