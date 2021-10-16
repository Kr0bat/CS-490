<?php # databaseConnect.php

  //initialize constants
  DEFINE ('DB_USER', 'jpr47');
  DEFINE ('DB_PASSWORD','CompSci490**');
  DEFINE ('DB_HOST', 'sql1.njit.edu');
  DEFINE ('DB_NAME', 'jpr47');
  
  // connect to database
  $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
  //set the encoding
  mysqli_set_charset($dbc, 'utf8');
  
?>