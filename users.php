<html>
	<head>
		<title>Sample PHP</title>
	</head>
	<body>
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
  msqli_close($dbc);
  
}

function getProfile($username)
{
 //make database connection
  require('databaseConnect.php');
   
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
  
}

function updateFname($fname, $username)
{
  //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE user SET first_name = '$fname' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  msqli_close($dbc);
  
}

function updateLname($lname, $username)
{
 //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE user SET last_name = '$lname' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  msqli_close($dbc);
  
}

function updateDesc($desc, $username)
{
  
  //make database connection
  require('databaseConnect.php');
   
  //make query
  $q1 = "UPDATE user SET description = '$desc' WHERE username = '$username' ";
  $r = @mysqli_query ($dbc, $q1); 
  
  //close database connection
  msqli_close($dbc);
  
}

 ?>
 </body>
 </html>