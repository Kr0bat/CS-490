<!DOCTYPE html>
<html lang="en">
<?php
session_start();

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
    <div class="col-12" style="font-size: 22.5px; padding-left: 10ch">
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
                            <a href="" style="text-decoration: none;">
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
        <div class="col-10 push-1" style="margin: 5vh 0">
        
            <?php


            // $chatlist is updated by Middle End. Has three parameters: "msg", "new", and "timestamp".
            $chatlist = [
                "Karim" => ["msg" => "Lorem ipsum dolor sit amet", "new" => "true", "timestamp" => "32 min ago"], 
                "Jose" => ["msg" => "Lorem ipsum dolor sit amet", "new" => "true", "timestamp" => "1 hr ago"],
                "Mom" => ["msg" => "Lorem ipsum dolor sit amet", "new" => "false", "timestamp" => "Fiday at 9:28am"]];

            //$chatlist = [];

                        
            include("chats.php");

            $chatlist = [];
            $recipient = $_SESSION['username'];
            $senders = allChats($recipient);
            
            foreach ($senders as $sender){
                $latestChat = getChat($recipient, $sender)[0];
                unset($latestChat[$sender]);
                $chatlist[$sender] = $latestChat;

            }
            //print_r($chatlist);
            
            //echo "<p style='color:white'> WORDS </p>";
            if (count($chatlist) == 0) {

                print('
                    <a href="">
                        <div class="col-12 bodyBold dmContainer" style="margin: 0.5ch 0">
                            <div class="col-12">
                                <div class="col-12">
                                    
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="padding-left: 0.35ch">
                                                        + New Chat
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
                    print('
                    <a href="?chatWith='.$user.'">
                        <div class="col-12 bodyBold dmContainer" style="margin: 0.5ch 0 0.25ch 0">
                            <div class="col-12">
                                <div class="col-12">
                                    
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="max-width: fit-content;">
                                                        <span class="');
                                                        
                                                        if ($content['read'] == 0) {
                                                            print('blueDot" style="margin-left: 1.5ch;"');
                                                        } else {
                                                            print('"');
                                                        }

                                                        print('>
                                                            <img src="assets/profPic.jpeg" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 1.53ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                        </span>
                                                    </td>
                                                    <td style="padding-left: 0.35ch">
                                                    ');
                                                        
                                                    if ($content['read'] == 0) {
                                                        print('From ');
                                                    } else {
                                                        print('');
                                                    }

                                                    print(''.$user.'
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                                </div>
                                <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.25ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$content["msg"].'</div>
                                <div class="col-12 subtitleLight" style="color: #777; font-size: 14px; margin-top: 1ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$content["timestamp"].'</div>
                            </div>
                        </div>
                    </a>
                    ');
                }

            }
            ?>

        </div>
    </div>
</body>
</html>