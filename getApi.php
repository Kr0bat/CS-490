<?php
header('Content-Type: application/json; charset=utf-8');
include("spotify_access.php");

if ( isset($_POST['get_api_info']) ){
    //print_r(json_encode(getTokens()));

    $tempTokens = getTokens();
    $tokens['access_token'] = $tempTokens['access_token'];
    $tokens['refresh_token'] = $tempTokens['refresh_token'];
    $tokens['expires_in'] = $tempTokens['expiration'];

    print_r(json_encode($tokens));
}

if ( isset($_POST['set_api_info']) ){
    $access = $_POST['access_token'];
    //$refresh = $_POST['refresh_token'];
    $expiration = $_POST['expires_in'];

    UpdateAccessToken($access);
    //UpdateRefreshToken($refresh);
    UpdateExpiration($expiration);
}

?>