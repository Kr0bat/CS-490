<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | Spotifeed</title>
    <link rel="stylesheet" href="./style.css" />
</head>
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
    margin-top: 0.25ch;
}
</style>
<body>
    <div class="col-12" style="font-size: 22.5px; padding-left: 11ch">
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
            "Karim" => ["last_msg" => "ur gay bro <3"], 
            "Jose" => ["last_msg" => "damn yo the fuck?"],
            "Mom" => ["last_msg" => "y r u a dissapointment ????"], 
        ];
        foreach($chatlist as $user => $content) {
            print('
            <a href="?chatWith='.$user.'">
                <div class="col-12 bodyBold dmContainer" style="margin: 0.5ch 0">
                    <div class="col-12">
                        <div class="col-12">
                            <span class="blueDot" style="margin-left: 1.5ch;">From '.$user.'</span>
                        </div>
                        <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 1.5ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$content["last_msg"].'</div>
                    </div>
                </div>
            </a>
            ');
        }
        ?>

    </div>
</body>
</html>