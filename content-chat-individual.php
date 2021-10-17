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
    padding: 1ch 5ch 0 5ch;
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

}
.bubbleSend {
    padding: 1ch 2.5ch 1ch 1ch;
    background-color: #56b35e;
    color: #fff;
    border-radius: 0.5ch 0.5ch 0 0.5ch;
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
</style>
<?php
session_start();

$msgList = [
    0 => ["msg_content" => "most recent message", "sender" => $_SESSION['chatWith'], "timestamp" => "1 min ago"],
    1 => ["msg_content" => "second most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "2 min ago"],
    2 => ["msg_content" => "third most recent", "sender" => $_SESSION['username'], "timestamp" => "5 min ago"],
    3 => ["msg_content" => "fourth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "10 min ago"],
    4 => ["msg_content" => "fifth most recent", "sender" => $_SESSION['username'], "timestamp" => "13 min ago"],
    5 => ["msg_content" => "sixth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "19 min ago"],
    6 => ["msg_content" => "seventh most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "27 min ago"],
    7 => ["msg_content" => "eighth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "28 min ago"],
    8 => ["msg_content" => "ninth most recent", "sender" => $_SESSION['username'], "timestamp" => "32 min ago"],
    9 => ["msg_content" => "tenth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "35 min ago"],
    10 => ["msg_content" => "eleventh most recent", "sender" => $_SESSION['username'], "timestamp" => "44 min ago"],
    11 => ["msg_content" => "twelvth recent message", "sender" => $_SESSION['chatWith'], "timestamp" => "1 hr ago"],
    12 => ["msg_content" => "thirteenth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "1 hr ago"],
    13 => ["msg_content" => "fourteenth most recent", "sender" => $_SESSION['username'], "timestamp" => "1 hr ago"],
    14 => ["msg_content" => "fifteenth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "2 hrs ago"],
    15 => ["msg_content" => "sixteenth most recent", "sender" => $_SESSION['username'], "timestamp" => "2 hr ago"],
    16 => ["msg_content" => "seventeenth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "3 hrs ago"],
    17 => ["msg_content" => "eighteenth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "4 hrs ago"],
    18 => ["msg_content" => "nineteenth most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "4 hrs ago"],
    19 => ["msg_content" => "twentieth most recent", "sender" => $_SESSION['username'], "timestamp" => "5 hrs ago"],
    20 => ["msg_content" => "twentyfirst most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "6 hrs ago"],
    21 => ["msg_content" => "twentysecond most recent", "sender" => $_SESSION['username'], "timestamp" => "9 hrs ago"],
    22 => ["msg_content" => "twentythird most recent", "sender" => $_SESSION['chatWith'], "timestamp" => "Friday at 9:36pm"],
];

?>
<body>
    <div class="col-12" style="font-size: 22.5px; padding-left: 10ch">
        <div class="col-12" style="margin-top: 5vh; height: 10vh;">
            <div class="col-10 push-1 titleBold" style="font-size: min(40px, 5vh); z-index: 10;">
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 3ch">
                                <a href="/~kg448/chat.php" class="subtitleBold" style="text-decoration: none; font-size: 18px">Back</a>
                            </td>
                            <td style="max-width: fit-content;">
                                <img src="assets/profPic.jpeg" class="logoImg" style="border-radius: 100%; height: 1.53ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                            </td>
                            <td style="padding-left: 0.35ch">
                                <?php echo $_SESSION['chatWith']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-10 push-1" style="height: 85vh">
            <div class="col-12 chatBoxBack">
                
                <div class="col-12 chatTextEntry">
                    <div class="col-10 push-1">
                        <form method="post">
                            <div class="col-9">
                                <input maxlength="240" type="text" name="newdm_msg" placeholder="Type something to <?php echo $_SESSION['chatWith']; ?>" value="" style="width: 100%; background-color: #000; border-color: #1e4e22; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7vh; vertical-align: top; margin-top: 0.5vh;" required />
                            </div>
                            <div class="col-3">
                                <button type="submit" name="newdm_submit" style="width: 80%; background-color: #1e4e22; border-color: #1e4e22; border-style: outset; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 0.5ch 0; margin-top: 0.5vh;">Send</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 chatBoxTop" style="overflow: auto; width: 100%; flex-direction: column-reverse;">
                    <table id="chatTable" style="height: 73vh; width: 100%; border-spacing: 1ch;">
                        <tbody style="height: 73vh; overflow-y: scroll; width: 100%; display: table-footer-group;">

                        <?php
                        foreach ($msgList as $index => $info) {
                            print('
                            <tr style="width: 100%;">
                                <td style="width: 50%">');
                                
                            if ($info['sender'] == $_SESSION['chatWith']) {
                                print('<div class="bubbleReceive bodyLight">'.$info['msg_content'].'</div>');
                                print('<div class="subtitleLight" style="font-size: 14px; padding-left: 3.5ch; padding-top: 0.25ch;">'.$info['timestamp'].'</div>');
                            }
                                
                            print('
                                </td>
                                <td style="width: 50%">');
                                
                            if ($info['sender'] == $_SESSION['username']) {
                                print('<div class="bubbleSend bodyLight">'.$info['msg_content'].'</div>');
                                print('<div class="subtitleLight" style="font-size: 14px; padding-left: 1.5ch; padding-top: 0.25ch;">'.$info['timestamp'].'</div>');
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
    </div>
</body>
</html>