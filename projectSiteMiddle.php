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
  if ($password == $user[password]) { #change to password_verify
      return true;
  }
      
  return false;
}

function retrieveUser($username, $password){
  connectDB();
  GLOBAL $dbc;

  //echo "Begin db query!";
  /*
    $select_user = $dbc->prepare("SELECT * FROM photographer WHERE pID = ?");
    #gettype($select_user);
    $select_user->bind_param("i", $username);
    $select_user->execute();

    #echo $select_user;
    echo "statement executed";
    $result = $select_user->get_result();
    echo "result found";

    $user = $result->fetch_assoc();
    echo "user found";
    echo gettype($user);
    echo $user;
    */
    
    $sql = "SELECT * FROM `person` WHERE username='$username'";
    echo $sql;
    $result = mysqli_query($dbc, $sql);
    $user = mysqli_fetch_array($result);
    echo "User: $user";
    
    if (validateUser($user, $password)){
      $clean_user = array(
        "username" => $user[username],
        "type" => $user[type]
        );
      return $clean_user;
    }
    return null;
}
#echo retrieveUser("Karim", "pass")['type'];
?>