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
    <div class="col-12" style="font-size: 22.5px; padding-left: 9ch">
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 titleBold" style="">
                Direct Messages
            </div>
        </div>
        <div class="col-12" style="margin-top: 1vh">
            <div class="col-10 push-1 subtitleLight" style="font-size: 22.5px">
                Your Inbox
            </div>
        </div>
        <div class="col-10 push-1" style="margin: 5vh 0">
        
            <?php
            $chatlist = [
                "Karim" => ["last_msg" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "new" => "true"], 
                "Jose" => ["last_msg" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "new" => "true"],
                "Mom" => ["last_msg" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "new" => "false"], 
            ];
            foreach($chatlist as $user => $content) {
                print('
                <a href="?chatWith='.$user.'">
                    <div class="col-12 bodyBold dmContainer" style="margin: 0.5ch 0">
                        <div class="col-12">
                            <div class="col-12">
                                
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="max-width: fit-content;">
                                                    <span class="');
                                                    
                                                    if ($content['new'] == "true") {
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
                                                    
                                                if ($content['new'] == "true") {
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
                            <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 1.5ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$content["last_msg"].'</div>
                        </div>
                    </div>
                </a>
                ');
            }
            ?>

        </div>
    </div>
</body>
</html>