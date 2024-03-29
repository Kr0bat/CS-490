<!DOCTYPE html>
<html lang="en">
<?php
?>
<style>
.dmContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #ffffff17;
    border-style: solid;
    border-color: #ffffff17;
}
.blueDot::before {
    content: '';
    position: absolute;
    width: 1ch;
    height: 1ch;
    background-color: #56b35e;
    border-radius: 100%;
    margin-left: -1.5ch;
    margin-top: 0.69ch;
}
</style>
<body>
    <div class="col-12" style="font-size: 22.5px; margin-bottom: 5vh; <?php if (!$isMobile) { echo "padding-left: 6ch"; } ?>">
        <div class="col-12" style="margin-top: 5vh">
            <table class="col-10 push-1">
                <tbody>
                    <tr>
                        <td>
                            <div class="titleBold" style="">
                                Direct Messages
                            </div>
                        </td>
                        <td style="text-align: right;">
                            <a href="/~kg448/search.php?viewAll=none" style="text-decoration: none;">
                                <div class="subtitleLight" style="font-size: 20px; font-style: normal;">
                                    + New Chat
                                </div>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12" style="margin-top: 1vh">
            <div class="col-10 push-1 subtitleLight" style="font-size: 22.5px">
                Your Inbox
            </div>
        </div>
        <div class="<?php if (!$isMobile) { echo "col-10 push-1"; } else { echo "col-12"; } ?>" id="chat_list" style="margin: 5vh 0">
        
            <?php
            


            // $chatlist is updated by Middle End. Has three parameters: "msg", "new", and "timestamp".
            $chatlist = [
                "Karim" => ["msg" => "Lorem ipsum dolor sit amet", "new" => "true", "timestamp" => "32 min ago"], 
                "Jose" => ["msg" => "Lorem ipsum dolor sit amet", "new" => "true", "timestamp" => "1 hr ago"],
                "Mom" => ["msg" => "Lorem ipsum dolor sit amet", "new" => "false", "timestamp" => "Fiday at 9:28am"]];

            //
            // \/ \/ \/ \/ \/ KARIM'S CODE STARTS HERE \/ \/ \/ \/ \/
            $chatlist = [];
            $recipient = $_SESSION['username'];
            $senders = allChats($recipient);
            //print_r($senders);
            
            foreach ($senders as $sender){
                $latestChat = getChat($recipient, $sender);

                //Toggles the read dot in chat if there exists a recieved chat that the user hasn't read
                //This will work once chats.php is updated
                $unread = false;
                foreach($latestChat as $index => $chat){
                    if ($chat['recipient'] == $_SESSION['username'] && $chat['r'] == 0){
                        $unread = true;
                    }

                    $latestChat[$index]['msg'] = richText( $chat['msg'] );
                }

                $latestChat = $latestChat[count($latestChat) - 1];
                unset($latestChat[$sender]);
                $chatlist[$sender] = $latestChat;
                $chatlist[$sender]['unread'] = $unread;

            }
            // ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
            //

            //echo "<p style='color:white'> WORDS </p>";
            if (count($chatlist) == 0) {

                
                print('
                    <a href="/~kg448/search.php?viewAll=none">
                        <div class="col-12 bodyBold dmContainer" style="margin: 0.5ch 0">
                            <div class="col-12">
                                <div class="col-12">
                                    
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="underlineOnHover" style="padding-left: 0.35ch">
                                                        Tap to search for users to start a chat
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                    ');
                    

            } else {
                
                foreach($chatlist as $user => $content) {

                    if ((!isBlocked($user) || isAdmin($_SESSION['username'])) && (strtolower($user) != strtolower($_SESSION['username']))) {

                        print('
                        <a name="chat_container" id="chat_container_'.$user.'" href="?chatWith='.$user.'">
                            <div class="col-12 bodyBold dmContainer" style="margin: 0.5ch 0 0.25ch 0">
                                <div class="col-12">
                                    <div class="col-12">
                                        
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td style="max-width: fit-content;">
                                                            <span class="');
                                                            
                                                            if ($content['unread']) {
                                                                print('blueDot" style="margin-left: 1.5ch;"');
                                                            } else {
                                                                print('"');
                                                            }

                                                            print('>
                                                                <a>
                                                                    <img src="'.getProfile($user)["profile_picture"].'" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 1.53ch; width: 1.53ch;  border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <td style="padding-left: 0.35ch">
                                                            <a class="bodyBold">
                                                        ');
                                                            
                                                        if ($content['unread']) {
                                                            print('<span style="color: #56b35e">(NEW)</span> ');
                                                        } else {
                                                            print('');
                                                        }

                                                        if (isBlocked($user)) {
                                                            print('<span style="color: rgb(186, 71, 71)">'.getProfile($user)["fname"].' '.getProfile($user)["lname"].'</span></a>');
                                                        } elseif (isAdmin($user)) {
                                                            print('<span style="color: rgb(175, 107, 72)">'.getProfile($user)["fname"].' '.getProfile($user)["lname"].'</span></a>');
                                                        } else {
                                                            print('<span style="">'.getProfile($user)["fname"].' '.getProfile($user)["lname"].'</span></a>');
                                                        }

                                                        print('
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        
                                    </div>
                                    <div class="col-12 subtitleLightNorm" style="font-size: 18px; margin-top: 0.25ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$content["msg"].'</div>
                                    <div class="col-12 subtitleLight" style="color: #777; font-size: 14px; margin-top: 1ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$content["timestamp"].'</div>
                                </div>
                            </div>
                        </a>
                        ');

                    }

                }

            }
            ?>

        </div>
    </div>
</body>
<script>
    setInterval(function() { refreshChatList("<?php echo $_SESSION['username'] ?>") }, 500);
</script>
</html>