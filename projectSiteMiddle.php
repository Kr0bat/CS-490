<!Doctype html>
<html>
	<head>
 		<title> PPP Records </title>
		<link rel = "stylesheet" type = "text/css" href = "ppp.css">
 		<meta charset="UTF-8" />
 
 	</head>
<body>
    <p>
<?php
// checking username
// checking password_get_info
// return users info
// connect to db

$dbc = null;

function connectDb(){
$db_host = "sql1.njit.edu";
$db_name = "kg448";
$db_user = "kg448";
$db_password = "Temppass1!";
GLOBAL $dbc;
$dbc = @mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: '.mysqli_connect_error() ); 
}

function validateUser($user, $password){
    if (empty($user)){
      return false;
    }
    if (password_verify($password, $user[password])){ # 
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
    
    $sql = "SELECT * FROM `users` WHERE username='$username'";
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
    </p>
</body>

</html>