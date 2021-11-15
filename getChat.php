<?php
header('Content-Type: application/json; charset=utf-8');
include("chats.php");
//echo json_encode($data);

if ( isset($_POST['get_chat']) ){
    //set the chats as read once they've been retrieved
    $sender = $_POST['sender'];
    $recipient = $_POST['recipient'];
    $timestamp = $_POST['timestamp'];
    $newChats = [];

    //$sender = "Karim";
    //$recipient = "Max";
    //$currentTime = date('Y-n-j H:i:s'); //Must be in javascript format
    
    $lastUpdated = strtotime($timestamp); //strtotime returns the epoch time in seconds
    //print_r(json_encode(strtotime($currentTime)));
    
    $allChats = getChat($sender, $recipient);
    
    foreach($allChats as $chat){ 
        $chatTime = strtotime($chat['t']);
        if ($chatTime >= $lastUpdated){
            $newChats[] = $chat;
            setRead($chat['recipient'], $chat['sender']);
        }
    }


    //print_r($allChats);
    //echo "AAAA";
    print_r(json_encode($newChats));
}

if ( isset($_POST['set_chat']) ){
    $sender = $_POST['sender'];
    $recipient = $_POST['recipient'];
    $msg = $_POST['msg'];

    sendChat($recipient, $sender, $msg);
}

if ( isset($_POST['anyUnread'])){
    
    $recipient = $_POST['recipient'];
    
    //print_r(json_encode("AAAA"));
    
    $allChat = allChats($recipient);
    //print_r(json_encode($allChat));

    
    foreach($allChat as $user){
        //print_r(json_encode($chat['recipient']) . " AND THE SENDER " .  $chat['s']);
        $latestChat = getChat($user, $recipient);
        $latestChat = $latestChat[count($latestChat)-1];

        if ( $latestChat['r'] == 0 && $latestChat['recipient'] == $recipient ) {
            
            print_r(json_encode( ['unread' => true] ));
            return 1;
        }
        //print_r(json_encode($latestChat));
    }

    print_r(json_encode( ['unread' => false] ));
    
}

?>