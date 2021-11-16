<!DOCTYPE html>
<html lang="en">
<style>
.chatBoxBack {
    background-color: #111;
    border-radius: 1ch 1ch 0 0;
    height: 85vh;
}
.chatBoxFooter {
    bottom: 0; 
    position: fixed; 
    margin-left: min(7ch, 10vw); 
    width: 80vw;
    z-index: -1;
}
.chatBoxTop {
    height: 75vh;
    padding: 3ch 5ch 0 5ch;
}
.chatBoxTopMobile {
    height: 75vh;
    padding: 3ch 0.25ch 0 0.25ch;
}
.chatTextEntry {
    background-color: #070707;
    height: 10vh;
    border-radius: 1ch 1ch 0 0;
    padding: 1vh
}
.bubbleReceive {
    padding: 1ch 1ch 1ch 2.5ch;
    background-color: #424242;
    color: #fff;
    border-radius: 0.5ch 0.5ch 0.5ch 0;
    word-break: break-word;
}
.bubbleSend {
    padding: 1ch 2.5ch 1ch 1ch;
    background-color: #56b35e;
    color: #fff;
    border-radius: 0.5ch 0.5ch 0 0.5ch;
    word-break: break-word;
}
.bubbleSend:after {
    content: '';
    margin-top: -2ch;
    right: 4.9ch;
    position: absolute;
    border: 0px solid;
    display: block;
    width: 2ch;
    height: 2ch;
    background-color: transparent;
    border-bottom-left-radius: 0.85ch;
    border-bottom-right-radius: 1ch;
    box-shadow: -21px 9px 0px 8px #56b35e;
}
.bubbleReceive:after {
    content: '';
    margin-top: -2ch;
    left: 4.9ch;
    position: absolute;
    border: 0px solid;
    display: block;
    width: 2ch;
    height: 2ch;
    background-color: transparent;
    border-bottom-left-radius: 0.85ch;
    border-bottom-right-radius: 1ch;
    box-shadow: 21px 9px 0px 8px #424242;
}


.bubbleReceiveMobile {
    padding: 1ch 1ch 1ch 2.5ch;
    background-color: #424242;
    color: #fff;
    border-radius: 0.5ch 0.5ch 0.5ch 0;
    word-break: break-word;
}
.bubbleSendMobile {
    padding: 1ch 2.5ch 1ch 1ch;
    background-color: #56b35e;
    color: #fff;
    border-radius: 0.5ch 0.5ch 0 0.5ch;
    word-break: break-word;
}
.bubbleSendMobile:after {
    content: '';
    margin-top: -2ch;
    right: 0;
    position: absolute;
    border: 0px solid;
    display: block;
    width: 2ch;
    height: 2ch;
    background-color: transparent;
    border-bottom-left-radius: 0.85ch;
    border-bottom-right-radius: 1ch;
    box-shadow: -21px 9px 0px 8px #56b35e;
}
.bubbleReceiveMobile:after {
    content: '';
    margin-top: -2ch;
    left: 0;
    position: absolute;
    border: 0px solid;
    display: block;
    width: 2ch;
    height: 2ch;
    background-color: transparent;
    border-bottom-left-radius: 0.85ch;
    border-bottom-right-radius: 1ch;
    box-shadow: 21px 9px 0px 8px #424242;
}
</style>
<?php

$msgList = [
    0 => ["s" => $_SESSION['chatWith'], "msg" => "newest", "t" => "6 min ago"],
    1 => ["s" => $_SESSION['chatWith'], "msg" => "second", "t" => "7 min ago"],
    2 => ["s" => $_SESSION['username'], "msg" => "third", "t" => "10 min ago"],
    3 => ["s" => $_SESSION['chatWith'], "msg" => "fourth", "t" => "15 min ago"],
    4 => ["s" => $_SESSION['username'], "msg" => "fifth", "t" => "18 min ago"],
    5 => ["s" => $_SESSION['username'], "msg" => "sixth", "t" => "25 min ago"],
    6 => ["s" => $_SESSION['chatWith'], "msg" => "seventh", "t" => "26 min ago"],
    7 => ["s" => $_SESSION['username'], "msg" => "eighth", "t" => "32 min ago"],
    8 => ["s" => $_SESSION['chatWith'], "msg" => "ninth", "t" => "36 min ago"],
    9 => ["s" => $_SESSION['username'], "msg" => "tenth", "t" => "44 min ago"],
    10 => ["s" => $_SESSION['chatWith'], "msg" => "eleventh", "t" => "47 min ago"],
    11 => ["s" => $_SESSION['username'], "msg" => "twelvth", "t" => "50 min ago"],
    12 => ["s" => $_SESSION['chatWith'], "msg" => "thirteenth", "t" => "51 min ago"],
    13 => ["s" => $_SESSION['username'], "msg" => "fourteenth", "t" => "54 min ago"],
    14 => ["s" => $_SESSION['chatWith'], "msg" => "fifteenth", "t" => "59 min ago"],
];


//
// \/ \/ \/ \/ \/ KARIM'S CODE STARTS HERE \/ \/ \/ \/ \/

$sender = $_SESSION['chatWith'];
$recipient = $_SESSION['username'];

// CANNOT CHAT WITH BANNED USERS 
if (isBlocked($sender) && !isAdmin($recipient)) {
    header("Location: /~kg448/chat.php");
}

if ($_SERVER[HTTP_HOST] != "maxedward.com") {

    $msgList = getChat($recipient, $sender);

    //ensures messages display in chronological order
    $msgList = array_reverse($msgList);

    //only set read if the latest message in a chat was NOT sent by the logged-in user
    if ( $msgList[0]['recipient'] == $_SESSION['username'] ){
        setRead($recipient, $sender);
    }
    

    ///
    /* 
    // Chats over a week old retain the default timestamp
    // Younger chats gain an easier to read, less detailed timestamp
    */
    ///


    foreach ($msgList as $index => $chat){
        $currTime = time();
        $chatTime = strtotime($chat['t']);
        $chatAge = $currTime - $chatTime;
        $msgList[$index]['msg'] = richText( $chat['msg'] );
        //echo richText($chat['msg']);
        //print_r($msgList[$index]['msg']);
        //print_r($chatAge);

        if($chatAge <= 60){ // One minute, print min without s
            $msgList[$index]['t'] = date("i", $chatAge) . " min ago";
        }
        elseif($chatAge <= 3600){ // One hour, print minutes
            $msgList[$index]['t'] = date("i", $chatAge) . " mins ago";
        }
        else if($chatAge <= 86400){ // One day, print hours
            $msgList[$index]['t'] = date("H", $chatAge) . " hrs ago";
        }
        else if($chatAge < 604800){ // One week, print day and time
            $msgList[$index]['t'] = date("l", $chatTime) . " at " . date("h:ia", $chatTime);
        }
        
        //print_r($Epoch);
    }

}
// ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
//


?>
<body>
    <div class="col-12" style="font-size: 22.5px; <?php if (!$isMobile) { echo "padding-left: 6ch"; } ?>">
        <div class="col-12" style="margin-top: 5vh; height: 10vh;">
            <div class="col-10 push-1 titleBold" style="font-size: min(40px, 5vh); z-index: 10;">
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 3ch">
                                <a href="/~kg448/<?php if (isset($_GET['redirectFrom'])) { echo $_GET['redirectFrom'].'.php'; if ($_GET['redirectFrom'] == "search" && $_GET['searchKey'] != "") { echo '?search_msg='.$_GET['searchKey']; } } else { echo "chat.php"; } ?>" class="subtitleBold underlineOnHover" style="text-decoration: none; font-size: 18px">
                                    Back
                                </a>
                            </td>
                            <td style="max-width: fit-content;">

                                <a href="/~kg448/account.php?viewing=<?php echo $_SESSION['chatWith']; ?>&redirectFrom=chat">
                                    <img src="<?php echo getProfile($_SESSION['chatWith'])["profile_picture"]; ?>" class="logoImg" style="border-radius: 100%; height: 1.53ch; width: 1.53ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                </a>
                            </td>
                            <td style="padding-left: 0.35ch">
                                <a href="/~kg448/account.php?viewing=<?php echo $_SESSION['chatWith']; ?>&redirectFrom=chat" class="titleBold underlineOnHover" style="text-decoration: none;" title="Go to <?php echo $_SESSION['chatWith']; ?>'s Profile">
                                    <div style="max-width: 40vw; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; <?php if (isAdmin($_SESSION['chatWith'])) { echo "color: rgb(175, 107, 72);"; } ?>">
                                        <?php echo getProfile($_SESSION['chatWith'])["fname"].' '.getProfile($_SESSION['chatWith'])["lname"]; ?>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
 
        <div class="<?php if (!$isMobile) { echo "col-10 push-1"; } else { echo "col-12"; } ?>" style="height: 85vh; <?php if (!$isMobile) { echo "width: 75vw; left: 7.6vw;"; } else { echo "width: 100vw;"; } ?>">
            <div class="col-12 chatBoxBack">
                
                <div class="col-12 chatTextEntry">
                    <div class="col-10 push-1">
                        
                            <div class="col-9">
                                <input maxlength="240" type="text" name="newdm_msg" placeholder="Type something to <?php echo $_SESSION['chatWith']; ?>" value="" style="width: 100%; background-color: #000; border-color: #1e4e22; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7vh; vertical-align: top; margin-top: 0.5vh;" required />
                            </div>
                            <div class="col-3">
                                <button type="button" onclick="sendChat('<?php echo $_SESSION[username] ?>', '<?php echo $_SESSION[chatWith] ?>')" name="newdm_submit" style="width: 80%; background-color: #1e4e22; border-color: #1e4e22; border-style: solid; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 1ch 0; margin-top: 0.55vh;">Send</button>
                            </div>
                        
                    </div>
                </div>

                <div class="col-12 chatBoxTop<?php if ($isMobile) { echo "Mobile"; } ?>" style="overflow: auto; width: 100%; flex-direction: column-reverse;">
                    <table id="chatTable" style="height: 73vh; width: 100%; border-spacing: 1ch;">
                        <tbody style="height: 73vh; overflow-y: scroll; width: 100%; display: table-footer-group;">

                            <?php
                            foreach ($msgList as $index => $info) {
                                print('
                                <tr style="width: 100%;">
                                    <td style="width: 50%">');
                                    
                                if ($info['s'] == $_SESSION['chatWith']) {
                                    print('<div class="bubbleReceive');
                                    if ($isMobile) { echo "Mobile"; } 
                                    print(' bodyLight">'.$info['msg'].'</div>');
                                    print('<div class="subtitleLight" style="font-size: 14px; padding-left: 3.5ch; padding-top: 0.25ch;">'.$info['t'].'</div>');
                                }
                                    
                                print('
                                    </td>
                                    <td style="width: 50%">');
                                    
                                if ($info['s'] == $_SESSION['username']) {
                                    print('<div class="bubbleSend');
                                    if ($isMobile) { echo "Mobile"; } 
                                    print(' bodyLight">'.$info['msg'].'</div>');
                                    print('<div class="subtitleLight" style="font-size: 14px; padding-left: 1.5ch; padding-top: 0.25ch;">'.$info['t'].'</div>');
                                }
                                    
                                print('
                                    </td>
                                </tr>');
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div style="height: 32vh; <?php if (!$isMobile) { echo "margin-left: 7.6vw; width: 75vw; "; } else { echo "width: 100vw; "; } ?>position: fixed; bottom: 0; background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 69%, rgba(0,0,0,0) 100%); pointer-events: none;">
        </div>
    </div>
</body>

<script>
    setInterval(function() { getChats("<?php echo $_SESSION['username'] ?>", "<?php echo $_SESSION['chatWith'] ?>", "<?php echo $_SESSION['username'] ?>") }, 1500);
    //getChats("<?php echo $_SESSION['username'] ?>", "<?php echo $_SESSION['chatWith'] ?>")

    var input = document.getElementsByName("newdm_msg")[0];
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            sendChat("<?php echo $_SESSION['username'] ?>", "<?php echo $_SESSION['chatWith'] ?>");
        }
    }); 
</script>

</html>