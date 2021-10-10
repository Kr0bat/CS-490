<?php
// checking username
// checking password_get_info
// return users info
// connect to db

$dbc = null;

function connectDb(){
$db_host = "sql1.njit.edu";
$db_name = "jpr47";
$db_user = "jpr47";
$db_password = "CompSci490**";
GLOBAL $dbc;
$dbc = @mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: '.mysqli_connect_error() ); 
}

function validateUser($user, $password) {
  if (empty($user)) {
      return false;
  }
  if (password_verify($password, $user[password])) {
      return true;
  }
      
  return false;
}

function retrieveUser($username, $password){
  connectDB();
  GLOBAL $dbc;
    
    $sql = "SELECT * FROM `user` WHERE username='$username'";
    $result = mysqli_query($dbc, $sql);
    $user = mysqli_fetch_array($result);
    
    if (validateUser($user, $password)){
      $clean_user = array(
        "username" => $user[username],
        "type" => $user[type]
        );
      return $clean_user;
    }
    return null;
}
?>