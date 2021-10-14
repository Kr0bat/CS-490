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
}
.chatTextEntry {
    background-color: #070707;
    height: 10vh;
    border-radius: 1ch 1ch 0 0;
    padding: 1vh
}
</style>
<?php
session_start();

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
                <div class="col-12 chatBoxTop">
                </div>
                <div class="col-12 chatTextEntry">
                    <div class="col-10 push-1">
                        <form method="post">
                            <div class="col-9">
                                <input maxlength="280" type="text" name="newdm_msg" placeholder="Type something to <?php echo $_SESSION['chatWith']; ?>" value="" style="width: 100%; background-color: #000; border-color: #1e4e22; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7vh; vertical-align: top; margin-top: 0.5vh;" required />
                            </div>
                            <div class="col-3">
                                <button type="submit" name="newdm_submit" style="width: 80%; background-color: #1e4e22; border-color: #1e4e22; border-style: outset; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 0.5ch 0; margin-top: 0.5vh;">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>