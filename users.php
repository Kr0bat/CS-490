<?php

function getPass($username)
{
  //initialize constants
  DEFINE ('DB_USER', 'jpr47');
  DEFINE ('DB_PASSWORD','CompSci490**');
  DEFINE ('DB_HOST', 'sql1.njit.edu');
  DEFINE ('DB_NAME', 'jpr47');
  
  // connect to database
  $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
  //set the encoding
  mysqli_set_charset($dbc, 'utf8');
  
  
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
  
  
  mysqli_close($dbc);
  
}

function getProfile($username)
{
  //initialize constants
  DEFINE ('DB_USER', 'jpr47');
  DEFINE ('DB_PASSWORD','CompSci490**');
  DEFINE ('DB_HOST', 'sql1.njit.edu');
  DEFINE ('DB_NAME', 'jpr47');
  
  // connect to database
  $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
  //set the encoding
  mysqli_set_charset($dbc, 'utf8');
  
  
  //make query
  $q1 = "SELECT first_name AS fname, last_name AS lname, pfp_url AS profile_picture, description AS profile_description  FROM user WHERE username = '$username' ";
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
  
  
  mysqli_close($dbc);
  
}

function updateFname($fname, $username)
{
  //initialize constants
  DEFINE ('DB_USER', 'jpr47');
  DEFINE ('DB_PASSWORD','CompSci490**');
  DEFINE ('DB_HOST', 'sql1.njit.edu');
  DEFINE ('DB_NAME', 'jpr47');
  
  // connect to database
  $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
  //set the encoding
  mysqli_set_charset($dbc, 'utf8');
  
  
  //make query
  $q1 = "UPDATE user SET first_name = '$fname' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  mysqli_close($dbc);
  
}

function updateLname($lname, $username)
{
  //initialize constants
  DEFINE ('DB_USER', 'jpr47');
  DEFINE ('DB_PASSWORD','CompSci490**');
  DEFINE ('DB_HOST', 'sql1.njit.edu');
  DEFINE ('DB_NAME', 'jpr47');
  
  // connect to database
  $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
  //set the encoding
  mysqli_set_charset($dbc, 'utf8');
  
  
  //make query
  $q1 = "UPDATE user SET last_name = '$lname' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  mysqli_close($dbc);
  
}

function updateDesc($desc, $username)
{
  //initialize constants
  DEFINE ('DB_USER', 'jpr47');
  DEFINE ('DB_PASSWORD','CompSci490**');
  DEFINE ('DB_HOST', 'sql1.njit.edu');
  DEFINE ('DB_NAME', 'jpr47');
  
  // connect to database
  $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
  //set the encoding
  mysqli_set_charset($dbc, 'utf8');
  
  
  //make query
  $q1 = "UPDATE user SET description = '$desc' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  mysqli_close($dbc);
  
}




 ?>
