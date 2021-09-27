<!DOCTYPE html>
<html lang="en">

<?php
include("projectSiteMiddle.php");

session_start();

function checkLogin( $name, $pass ) {

    $user = retrieveUser($name, $pass); 
    $role = false;

    if ($user != null) {
        $role = $user['type'];
        $_SESSION['username'] = $name;
        $_SESSION['password'] = $password;
        
        if ($role == "admin") {
            $_SESSION['role'] = "admin";
        } else if ($role == "basic") {
            $_SESSION['role'] = "basic";
        }
        print($role);
        #echo "Role found: $role";
        return true;
    }

    return false;

}
/*
function checkAdmin( $name ) {
    $file = "490-admins.txt";
    $fopen = fopen($file, r);
    $fread = fread($fopen,filesize($file));
    fclose($fopen);
    $remove = "\n";
    $split = explode($remove, $fread);
    $array = array();
    $tab = " ";
    foreach ($split as $string) {
        $array[] = explode($tab, $string);
    }
    //print_r($array);
    //print("<br/><br/>");
    foreach ($array as $entry => $info) {
        if ($info[0] == $name) {
            return true;
        }
    }
    return false;
}*/

if (isset($_POST['btn_login_update'])) {
    $userClean = (str_replace(' ', '', $_POST['username_input']));
    $user = $userClean;
    $passwordClean = str_replace('\n', '', $_POST['password_input']);
    $passwordClean2 = str_replace(' ', '', $passwordClean);
    $password = $passwordClean2;
    #echo "<p> THIS IS THE USERNAME $user</br>THIS IS THE PASSWORD $password</p>";
    #echo "<p> </br> $_SERVER[REMOTE_ADDR] </p>";
    //print_r($_SESSION);

    print_r(checkLogin($user,$password));

    if ( checkLogin($user,$password) != false )  {
        $loginInfo = checkLogin($user,$password);

        if ($_SESSION['role'] == "admin") {
            header("Location: adminDash.php");
        } else if ($_SESSION['role'] == "basic") {
            header("Location: userDash.php");
        }
    
    } else {
        print('
        <header>
            <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: 1.35vw; color: #eaeaea; background-color: #9c5151ff">
                User or Password not recognized
            </div>
        </header>');
    }

}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G7 Portal</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<footer class="footer2" style="width: 100%; bottom: 0; height: 20vh; background-color: #2f3a41; text-align: center">
    <img src="assets/logo_NJIT.png" class="imgFitMid" style="height: 17vh; margin-left: 50%; transform: translate(-50%, 0.75vh);" />
</footer>

<body style="background-color: #2f3a41">
    <div class="col-12 bodyText" style="font-size: 75px; background-color: #2f3a41; text-align: center; padding-top: 5vh; overflow: visible; color: #e8e8e8;">
        G7 Portal
    </div>
    <div class="col-12" style="height: 50vh; padding-top: 25vh; background-color: #2f3a41; text-align: center">
        <form method="POST">
            <input type="text" name="username_input" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" style="background-color: #32424b; border-color: #597687; border-style: solid; color: #e8e8e8; padding: 1vh 1vw; border-radius: 1vh; font-size: max(2vw, 2vh)" required />
            <input type="password" name="password_input" placeholder="Password" value="<?php echo $_SESSION['password']; ?>" style="background-color: #32424b; border-color: #597687; border-style: solid; color: #e8e8e8; padding: 1vh 1vw; border-radius: 1vh; font-size: max(2vw, 2vh)" required />
            <button type="submit" name="btn_login_update" style="background-color: #32424b; border-color: #597687; border-style: solid; color: #e8e8e8; padding: 1vh 1vw; border-radius: 1vh; font-size: max(2vw, 2vh)"><strong>Login</strong></button>
        </form>
    </div>
    
</body>
</html>