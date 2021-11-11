<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotifeed</title>
    <link rel="stylesheet" href="./style.css" />
</head>
<style>
.dmContainer {
    width: 65vw;
    border-radius: 1ch;
    padding: 1ch;
    background: #313131;
    border-style: solid;
    border-color: #4a4a4a;
}
.postContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #313131;
    border-style: solid;
    border-color: #4a4a4a;
}
.commentContainer {
    border-radius: 0 0 1ch 1ch;
    padding: 1ch;
    background: #313131;
    border-style: solid;
    border-color: #4a4a4a;
    border-top: none;
}

@keyframes pulse {
    from {
        opacity: 1;
    }

    50% {
        opacity: 0.65;
    }

    to {
        opacity: 1;
    }
}

.fadeIn {
    opacity: 0;
    animation: fadeInDiv 0.32s ease forwards;
    animation-iteration-count: 1;
}

@keyframes fadeInDiv {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}
</style>
<?php

// $postList is updated by Middle End
$postList = [
    0 => [
        "creator" => "Max", 
        "title" => "Title Here", 
        "description" => "Description here with a lot more words than that of the title", 
        "link" => "https://maxedward.com",
        "album_art" => "https://maxedward.com",
        "comments" => [
            0 => ["creator" => "Karim", "description" => "Oldest Comment"],
            1 => ["creator" => "Jose", "description" => "Middle Comment"],
            2 => ["creator" => "Max", "description" => "Newest Comment"]
            ]
        ],
    1 => [
        "creator" => "Max", 
        "title" => "Title Here", 
        "description" => "Description here with a lot more words than that of the title", 
        "link" => "https://maxedward.com",
        "comments" => []
        ],
    2 => [
        "creator" => "Max", 
        "title" => "Title Here", 
        "description" => "Description here with a lot more words than that of the title", 
        "link" => "https://maxedward.com",
        "comments" => []
        ]
    ];

//
// \/ \/ \/ \/ \/ KARIM'S CODE STARTS HERE \/ \/ \/ \/ \/


if ($_SERVER[HTTP_HOST] != "maxedward.com") {

    $idList = allPostId();

    $likeList = searchPostIdbyLiker($_SESSION['username']);

    foreach($idList as $index => $id){
        $postList[$index] = getPost($id);
        $postList[$index]['id'] = $id;

        $likeCount = count(getLikes($id));
        $postList[$index]['likeCount'] = $likeCount;

        if ( in_array($id, $likeList) ){
            $postList[$index]['liked'] = true;
            
        }
        else{
            $postList[$index]['liked'] = false;
        }

        $rawComments = SearchCommentByP($id);
        $comments = [];

        foreach($rawComments as $comNum => $rawComment){
            $comments[$comNum]["description"] = $rawComment["description"];
            $comments[$comNum]["timestamp"] = $rawComment["timestamp"];
            //$comments[$index]["commenter"] = $rawComment["creator"];
            $comments[$comNum]["creator"] = $rawComment["commenter"];
            //$comments[$index]["creator"]["profile_picture"] = 
        }

        $postList[$index]["comments"] = $comments;

        
        
    }
    $postList = array_reverse($postList);
    //print_r($postList[2]);

}

// ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
//

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$isMobile = false;

if( $detect->isMobile() && !$detect->isTablet() ){
    $isMobile = true;
}

if (isset($_GET['successMsgUser'])) {
    $user = $_GET['successMsgUser'];
    print('
    <header>
        <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: max(1.35vw, 2.5vh); color: #eaeaea; background-color: #599c51ff">
            New User: '.$user.' successfully created
        </div>
    </header>');
}

if (isset($_GET['successMsgPost'])) {
    print('
    <header>
        <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: max(1.35vw, 2.5vh); color: #eaeaea; background-color: #599c51ff">
            New post successfully created
        </div>
    </header>');
}

if (isset($_GET['deleteMsgPost'])) {
    $postDeleteID = $_GET['deleteMsgPost'];
    print('
    <header>
        <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: max(1.35vw, 2.5vh); color: #eaeaea; background-color: #9c5151ff">
            Post (ID #'.$postDeleteID.') successfully deleted
        </div>
    </header>');
}

?>
<body>
    <div class="col-12" style="font-size: 22.5px; margin-bottom: 5ch; <?php if (!$isMobile) { echo "padding-left: 6ch"; } ?>">
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 titleBold" style="">
                Spotifeed
            </div>
        </div>

    <?php

    if ($_SERVER[HTTP_HOST] != "maxedward.com") {
    foreach ($postList as $postID => $info) {

        if ($isMobile) {

    ?>

        <div class="col-12" id="<?php echo $info['id'] ?>" style="margin: 2ch 0 1ch 0">
            <div class="col-12 titleBold" id="post_container_<?php echo $info[id]?>" style="">
                <div class="col-12 bodyBold postContainer" style="margin: 0">
                    <div class="col-12">
                        <table style="margin: 0;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="bodyLight">
                                            <tbody>
                                                <tr>
                                                    <td style="max-width: fit-content;">
                                                        <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                            <span class="">
                                                                <img src="<?php echo getProfile($info['creator'])["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td style="padding-left: 0.5ch; overflow: hidden; white-space: nowrap; max-width: 75vw;">
                                                        <div class="col-12" style="overflow: hidden; white-space: nowrap; max-width: 75vw;">
                                                            <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" class="bodyLight underlineOnHover" style="text-decoration: none; <?php if (isAdmin($info["creator"])) { echo "color: rgb(175, 107, 72)"; } ?>">
                                                                <?php echo getProfile($info['creator'])["fname"].' '.getProfile($info['creator'])["lname"]; ?>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="margin: 0; width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <a href="<?php echo $info['link']; ?>">
                                            <span class="">
                                                <img src="<?php echo $info['album_art']; ?>" class="logoImg" style="background: rgb(19, 19, 19); font-size: 16px; border-width: 0px; border-radius: 1ch 1ch 0 0; width: clamp(100%, 100%, 25ch); border-style: solid; border-color: rgba(255, 255, 255, 0); margin-top: 0.5ch;" />
                                                <div class="col-12 subtitleLight logoImg" style="font-size: 16px; background: rgb(19, 19, 19); border-radius: 0 0 1ch 1ch; padding: 0.5ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word; margin-top: -0.5ch;">
                                                    Song Title Here ↗
                                                </div>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 0ch; vertical-align: top; width: 100%;">
                                        <div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word;">
                                            <div class="col-12" style="margin-top: 1.5ch;">
                                                <?php echo $info['title']; ?>
                                            </div>
                                            <div class="col-12 subtitleLight" style="font-size: 16px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden;">
                                                <?php echo $info['description']; ?>
                                            </div>
                                        </div>
                                        <!--div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 1ch;">
                                            <div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word; margin-top: 0ch; vertical-align: bottom; font-weight: normal;">
                                                Song Title Here
                                                <span class="subtitleLight" style="font-size: 16px; text-overflow: ellipsis; overflow: hidden; padding-left: 1.5ch;">
                                                    (Artist)
                                                </span>
                                            </div>
                                        </div-->
                                        <div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 1ch; text-align: center;">
                                            <table style="margin: 0; width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%">
                                                            <img src="assets/comment.png" onclick="openComment('comment_input_<?php echo $info['id'] ?>')" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                        </td>
                                                        <td style="width: 50%">
                                                            <img src=<?php if ($info['liked']) {echo "assets/heart-on.png";} else{echo "assets/heart-off.png";}?> onclick="toggleLike('<?php echo $info['id'] ?>', '<?php echo $_SESSION['username']?>')" class="" style="border-width: 0; height: 3ch; margin-left: 0; cursor: pointer;" />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Hidden Comment Section Until Button Clicked -->
                <div class="col-12" id="comment_input_<?php echo $info['id'] ?>" style="display: none;">
                    <div class="col-1">
                        <table class="bodyLight" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <span class="" style="width: 100%">
                                            <img src="assets/commentArrow.png" class="" style="border-width: 0px; border-radius: 0; height: 3.5ch; margin-left: 50%; transform: translate(-50%, 0);" />
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 bodyLight commentContainer" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if (count($info["comments"]) == 0) { echo "border-radius: 0;"; } else { echo "border-radius: 0;"; } ?>font-style: normal; font-size: 18px;"> 
                        <table class="bodyLight" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="padding-left: 0">
                                        <input maxlength="50" type="text" name="comment_msg_<?php echo $info['id'] ?>" placeholder="Type your comment here" value="" style="width: 100%; background-color: #000; border-color: #28622d; border-style: solid; color: #fff; padding: 0.25ch 1ch; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7vh; vertical-align: top; margin-top: 0.5vh;" required />
                                    </td>
                                    <td style="padding-left: 1ch">
                                        <button type="button" onclick='sendComment("comment_msg_<?php echo $info[id] ?>", "<?php echo $info[id] ?>" , "<?php echo $_SESSION[username] ?>", "<?php echo getProfile($_SESSION[username])[profile_picture]?>", "<?php echo $_SESSION[role]?>", "<?php echo getProfile($_SESSION[username])[fname]?>"  )' name="comment_submit_<?php echo $info['id'] ?>" style="width: 80%; background-color: #28622d; border-color: #1e4e22; border-style: solid; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 1ch 0; margin-top: 0.55vh;">Comment</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                if (count($info["comments"]) > 0) {
                    foreach ($info["comments"] as $commentIndex => $commentInfo) {
                ?>

                <div class="col-12">
                    <div class="col-1">
                        <table class="bodyLight" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <span class="" style="width: 100%">
                                            <img src="assets/commentArrow.png" class="" style="border-width: 0px; border-radius: 0; height: 3.5ch; margin-left: 50%; transform: translate(-50%, 0);" />
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 bodyLight commentContainer comment_input_box_<?php echo $info['id'] ?>" id="" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if ($commentIndex == count($info["comments"])-1) { echo "border-radius: 0 0;"; } else { echo "border-radius: 0;"; } ?> font-style: normal; font-size: 18px;"> 
                        <table class="bodyLight">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                            <span class="">
                                                <img src="<?php echo getProfile($commentInfo['creator'])["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                            </span>
                                        </a>
                                    </td>
                                    <td style="padding-left: 0.5ch; max-width: 10ch;">
                                        <div class="col-12" style="max-width: 10ch;">
                                            <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">  
                                                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; <?php if (isAdmin($commentInfo["creator"])) { echo "color: rgb(175, 107, 72)"; } ?>">
                                                    <?php echo getProfile($commentInfo['creator'])["fname"]; ?>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td style="padding-left: 1ch; width: 100%;">
                                        <div class="col-12" style="color: #a2a2a2; word-break: break-word;">
                                            <?php echo $commentInfo["description"]; ?>
                                        </div>
                                    </td>

                                    <?php 
                                    if (strtolower($_SESSION['username']) == strtolower($commentInfo["creator"])) {
                                    ?>

                                    <!--td style="max-width: fit-content; width: 2.5ch;">
                                        <span class="">
                                            <img src="" class="" title="Edit Comment" style="cursor: pointer; height: 2.5ch; width: 2.5ch; margin-top: 0.25ch; margin-right: 0.75ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjZjRhNjU1IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDQ4OCA1MjIiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojZjRhNjU1O2ZpbGwtcnVsZTpub256ZXJvfQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cG9seWdvbiBjbGFzcz0iZmlsMCIgcG9pbnRzPSIwLDUwNSAyNjUsNTA1IDI2NSw1MjIgMCw1MjIgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yMTAgNDAybC0xMzEgMTdjLTUsMCAtOSwtMyAtMTAsLTcgMCwtMSAwLC0yIDAsLTNsMCAwIDAgMCAxNyAtMTMxIC0yOSAzMCAtNTcgMTgwIDE4MSAtNTcgMjkgLTI5eiI+PC9wYXRoPjxwb2x5Z29uIGNsYXNzPSJmaWwwIiBwb2ludHM9IjMyMSw0MyA0NDUsMTY3IDQ4OCwxMjQgMzY0LDAgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yNDkgMTk1YzQsLTQgMTAsLTQgMTQsMCA0LDQgNCwxMSAwLDE0bC0xNzIgMTcyYzAsMCAtMSwxIC0xLDFsLTIgMTkgMTQxIC0xOCAyMDQgLTIwNCAtMTI0IC0xMjQgLTIwMyAyMDQgLTEyIDkxIDE1NSAtMTU1eiI+PC9wYXRoPjwvZz48L3N2Zz4=');">
                                        </span>
                                    </td-->
                                
                                    <?php 
                                    }
                                    ?>

                                    <td style="max-width: fit-content; width: 2.5ch;">

                                        <?php 
                                        if (isAdmin($_SESSION['username']) || (strtolower($_SESSION['username']) == strtolower($commentInfo["creator"]))) {
                                        ?>

                                        <!--span class="">
                                            <img src="" class="" title="Delete Comment" style="cursor: pointer; height: 2.5ch; width: 2.5ch; margin-top: 0.25ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjRUM1RDU3IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDIwNCAyNTgiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojRUM1RDU3fQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cGF0aCBjbGFzcz0iZmlsMCIgZD0iTTE5MSA3MGwwIDEzOWMwLDI3IC0yMiw0OSAtNDksNDlsLTc1IDBjLTI3LDAgLTQ5LC0yMiAtNDksLTQ5bDAgLTEzOSAxNzMgMHptLTI0IDQybDAgOTNjMCwxOSAtMjUsMTkgLTI1LDBsMCAtOTNjMCwtMjAgMjUsLTIwIDI1LDB6bS01MCAwYzAsMzEgMCw2MiAwLDkzIDAsMTkgLTI1LDE5IC0yNSwwIDAsLTMxIDAsLTYyIDAsLTkzIDAsLTIwIDI1LC0yMCAyNSwwem0tNTAgMGwwIDkzYzAsMTkgLTI1LDE5IC0yNSwwbDAgLTkzYzAsLTIwIDI1LC0yMCAyNSwweiI+PC9wYXRoPjxwYXRoIGNsYXNzPSJmaWwwIiBkPSJNMTMgMzNsNDYgMGMtMSwtOSAyLC0xNyA4LC0yM2wwIC0xYzEzLC0xMiA2NCwtMTIgNzYsMCA2LDcgMTAsMTUgOSwyNGw0MCAwYzE3LDAgMTcsMjYgMCwyNmwtMTc5IDBjLTE3LDAgLTE3LC0yNiAwLC0yNnptNjYgMGw1MyAwYzEsLTMgMCwtNyAtMywtMTAgLTQsLTQgLTQzLC00IC00OCwwbDAgMGMtMywzIC0zLDcgLTIsMTB6Ij48L3BhdGg+PC9nPjwvc3ZnPg==');">
                                        </span-->

                                        <?php 
                                        }
                                        ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>

    <?php

        } else {

            // DESKTOP VERSION !
            // DESKTOP VERSION !? < !
            // DESKTOP VERSION !? <+> !?
            // DESKTOP VERSION !? < !
            // DESKTOP VERSION !

    ?>

        <div class="col-12" id="<?php echo $info['id'] ?>" style="margin: 2ch 0 1ch 0">
            <div class="col-10 push-1 titleBold" id="post_container_<?php echo $info[id]?>" style="">
                <div class="col-12 bodyBold postContainer" style="margin: 0">
                    <div class="col-12">
                        <table style="margin: 0;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="bodyLight">
                                            <tbody>
                                                <tr>
                                                    <td style="max-width: fit-content;">
                                                        <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                            <span class="">
                                                                <img src="<?php echo getProfile($info['creator'])["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td style="padding-left: 0.5ch; overflow: hidden; white-space: nowrap; max-width: 25vw;">
                                                        <div class="col-12" style="overflow: hidden; white-space: nowrap; max-width: 25vw;">
                                                            <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" class="bodyLight underlineOnHover" style="text-decoration: none; <?php if (isAdmin($info["creator"])) { echo "color: rgb(175, 107, 72)"; } ?>">
                                                                <?php echo getProfile($info['creator'])["fname"].' '.getProfile($info['creator'])["lname"]; ?>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="text-align: right; width: 100%;">
                                        <div class="subtitleLight" style="position: relative; font-size: 20px; margin-top: 0.2ch; text-decoration: none; padding-right: 1.15ch;">
                                            <a href="<?php echo $info['link']; ?>" class="subtitleLight" name="songLink" style="font-size: 20px; text-decoration: none;" title="Open song link">
                                                Go to song ↗
                                            </a>    
                                        </div>
                                    </td>

                                    <?php 
                                    if (isAdmin($_SESSION['username']) || (strtolower($_SESSION['username']) == strtolower($info["creator"]))) {
                                    ?>

                                    <td style="max-width: fit-content; width: 2.5ch;">
                                        <form method="POST" style="font-size: 20px;">
                                            <input type="text" name="delete_post_id" value="<?php echo $info['id']; ?>" style="display: none;" readonly/>
                                            <input type="text" name="delete_post_creator" value="<?php echo $info['creator']; ?>" style="display: none;" readonly/>
                                            <button type="submit" class="" name="delete_post_submit" style="background: #ffffff00; border: none;font-size: 20px;width: 3ch;height: 3ch;">
                                                <img src="" class="" title="Delete Post" style="cursor: pointer;font-size: 20px; height: 2.75ch; width: 2.75ch; margin-top: 0.25ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjRUM1RDU3IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDIwNCAyNTgiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojRUM1RDU3fQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cGF0aCBjbGFzcz0iZmlsMCIgZD0iTTE5MSA3MGwwIDEzOWMwLDI3IC0yMiw0OSAtNDksNDlsLTc1IDBjLTI3LDAgLTQ5LC0yMiAtNDksLTQ5bDAgLTEzOSAxNzMgMHptLTI0IDQybDAgOTNjMCwxOSAtMjUsMTkgLTI1LDBsMCAtOTNjMCwtMjAgMjUsLTIwIDI1LDB6bS01MCAwYzAsMzEgMCw2MiAwLDkzIDAsMTkgLTI1LDE5IC0yNSwwIDAsLTMxIDAsLTYyIDAsLTkzIDAsLTIwIDI1LC0yMCAyNSwwem0tNTAgMGwwIDkzYzAsMTkgLTI1LDE5IC0yNSwwbDAgLTkzYzAsLTIwIDI1LC0yMCAyNSwweiI+PC9wYXRoPjxwYXRoIGNsYXNzPSJmaWwwIiBkPSJNMTMgMzNsNDYgMGMtMSwtOSAyLC0xNyA4LC0yM2wwIC0xYzEzLC0xMiA2NCwtMTIgNzYsMCA2LDcgMTAsMTUgOSwyNGw0MCAwYzE3LDAgMTcsMjYgMCwyNmwtMTc5IDBjLTE3LDAgLTE3LC0yNiAwLC0yNnptNjYgMGw1MyAwYzEsLTMgMCwtNyAtMywtMTAgLTQsLTQgLTQzLC00IC00OCwwbDAgMGMtMywzIC0zLDcgLTIsMTB6Ij48L3BhdGg+PC9nPjwvc3ZnPg==');">
                                            </button>
                                        </form>
                                    </td>

                                    <?php
                                    }
                                    ?>

                                </tr>
                            </tbody>
                        </table>
                        <table style="margin: 0; width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <span class="">
                                            <img src="<?php echo $info['album_art']; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 0.35ch; height: 15ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                        </span>
                                    </td>
                                    <td style="padding-left: 1.69ch; vertical-align: top; height: 15ch; width: 100%;">
                                        <div class="col-12" style="height: 7.5ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word;">
                                            <div class="col-12" style="margin-top: 0.5ch;">
                                                <?php echo $info['title']; ?>
                                            </div>
                                            <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden;">
                                                <?php echo $info['description']; ?>
                                            </div>
                                        </div>
                                        <div class="col-6" style="height: 8ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 2.65ch;">
                                            <div class="col-12" style="margin-top: 0ch; vertical-align: bottom; font-weight: normal;">
                                                Song Title Here
                                            </div>
                                            <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden; font-style: normal;">
                                                Album - Year
                                            </div>
                                            <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden;">
                                                Artist
                                            </div>
                                        </div>
                                        <div class="col-6" style="height: 8ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 2ch; text-align: right;">
                                            <div class="col-12" style="">
                                                <table style="width: 100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 100%;"></td>
                                                            <td style="width: 3ch;"></td>
                                                            <td style="text-align: center; width: 3ch; padding-left: 0.75ch;">
                                                                <span id="like_counter_<?php echo $info['id']; ?>" style="color: <?php if ($info['liked']) { echo '#D75A4A;'; } else { echo '#a2a2a2;'; }?> font-size: 30px; font-weight: bolder;"><?php echo $info['likeCount'] ?></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 100%;"></td>
                                                            <td style="width: 3ch;">
                                                                <img src="assets/comment.png" title="Add Comment" id="comment_post_<?php echo $info['id'] ?>" onclick="openComment('comment_input_<?php echo $info['id'] ?>')" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                            </td>
                                                            <td style="width: 3ch;">
                                                                <img <?php if ($info['liked']) {echo 'src="assets/heart-on.png"  title="Unlike Post"';} else { echo 'src="assets/heart-off.png"  title="Like Post"'; }?> id="like_post_<?php echo $info['id'] ?>" onclick="toggleLike('<?php echo $info['id'] ?>', '<?php echo $_SESSION['username']?>')" class="" style="border-width: 0; height: 3ch; margin-left: 0.75ch; cursor: pointer;" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Hidden Comment Section Until Button Clicked -->
                <div class="col-12" id="comment_input_<?php echo $info['id'] ?>" style="display: none;">
                    <div class="col-1">
                        <table class="bodyLight" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <span class="" style="width: 100%">
                                            <img src="assets/commentArrow.png" class="" style="border-width: 0px; border-radius: 0; height: 3.5ch; margin-left: 50%; transform: translate(-50%, 0);" />
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 bodyLight commentContainer" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if (count($info["comments"]) == 0) { echo "border-radius: 0;"; } else { echo "border-radius: 0;"; } ?>font-style: normal; font-size: 18px;"> 
                        <table class="bodyLight" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="padding-left: 0">
                                        <input maxlength="50" type="text" name="comment_msg_<?php echo $info['id'] ?>" placeholder="Type your comment here" value="" style="width: 100%; background-color: #000; border-color: #28622d; border-style: solid; color: #fff; padding: 0.25ch 1ch; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7vh; vertical-align: top; margin-top: 0.5vh;" required />
                                    </td>
                                    <td style="padding-left: 1ch">
                                        <button type="button" onclick='sendComment("comment_msg_<?php echo $info[id] ?>", "<?php echo $info[id] ?>" , "<?php echo $_SESSION[username] ?>", "<?php echo getProfile($_SESSION[username])[profile_picture]?>", "<?php echo $_SESSION[role]?>", "<?php echo getProfile($_SESSION[username])[fname]?>" )' name="comment_submit_<?php echo $info['id'] ?>" style="width: 80%; background-color: #28622d; border-color: #1e4e22; border-style: solid; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 1ch 0; margin-top: 0.55vh;">Comment</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <?php
                if (count($info["comments"]) > 0) {
                    foreach ($info["comments"] as $commentIndex => $commentInfo) {
                ?>

                <div class="col-12">
                    <div class="col-1">
                        <table class="bodyLight" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <span class="" style="width: 100%">
                                            <img src="assets/commentArrow.png" class="" style="border-width: 0px; border-radius: 0; height: 3.5ch; margin-left: 50%; transform: translate(-50%, 0);" />
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 bodyLight commentContainer comment_input_box_<?php echo $info['id'] ?>" id="" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if ($commentIndex == count($info["comments"])-1) { echo "border-radius: 0 0;"; } else { echo "border-radius: 0;"; } ?> font-style: normal; font-size: 18px;"> 
                        <table class="bodyLight">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                            <span class="">
                                                <img src="<?php echo getProfile($commentInfo['creator'])["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                            </span>
                                        </a>
                                    </td>
                                    <td style="padding-left: 0.5ch; max-width: 10ch;">
                                        <div class="col-12" style="max-width: 10ch;">
                                            <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">  
                                                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; <?php if (isAdmin($commentInfo["creator"])) { echo "color: rgb(175, 107, 72)"; } ?>">
                                                    <?php echo getProfile($commentInfo['creator'])["fname"]; ?>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td style="padding-left: 1ch; width: 100%;">
                                        <div class="col-12" style="color: #a2a2a2; word-break: break-word;">
                                            <?php echo $commentInfo["description"]; ?>
                                        </div>
                                    </td>

                                    <?php 
                                    if (strtolower($_SESSION['username']) == strtolower($commentInfo["creator"])) {
                                    ?>

                                    <!--td style="max-width: fit-content; width: 2.5ch;">
                                        <span class="">
                                            <img src="" class="" title="Edit Comment" style="cursor: pointer; height: 2.5ch; width: 2.5ch; margin-top: 0.25ch; margin-right: 0.75ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjZjRhNjU1IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDQ4OCA1MjIiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojZjRhNjU1O2ZpbGwtcnVsZTpub256ZXJvfQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cG9seWdvbiBjbGFzcz0iZmlsMCIgcG9pbnRzPSIwLDUwNSAyNjUsNTA1IDI2NSw1MjIgMCw1MjIgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yMTAgNDAybC0xMzEgMTdjLTUsMCAtOSwtMyAtMTAsLTcgMCwtMSAwLC0yIDAsLTNsMCAwIDAgMCAxNyAtMTMxIC0yOSAzMCAtNTcgMTgwIDE4MSAtNTcgMjkgLTI5eiI+PC9wYXRoPjxwb2x5Z29uIGNsYXNzPSJmaWwwIiBwb2ludHM9IjMyMSw0MyA0NDUsMTY3IDQ4OCwxMjQgMzY0LDAgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yNDkgMTk1YzQsLTQgMTAsLTQgMTQsMCA0LDQgNCwxMSAwLDE0bC0xNzIgMTcyYzAsMCAtMSwxIC0xLDFsLTIgMTkgMTQxIC0xOCAyMDQgLTIwNCAtMTI0IC0xMjQgLTIwMyAyMDQgLTEyIDkxIDE1NSAtMTU1eiI+PC9wYXRoPjwvZz48L3N2Zz4=');">
                                        </span>
                                    </td-->
                                
                                    <?php 
                                    }
                                    ?>

                                    <td style="max-width: fit-content; width: 2.5ch;">

                                        <?php 
                                        if (isAdmin($_SESSION['username']) || (strtolower($_SESSION['username']) == strtolower($commentInfo["creator"]))) {
                                        ?>

                                        <!--span class="">
                                            <img src="" class="" title="Delete Comment" style="cursor: pointer; height: 2.5ch; width: 2.5ch; margin-top: 0.25ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjRUM1RDU3IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDIwNCAyNTgiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojRUM1RDU3fQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cGF0aCBjbGFzcz0iZmlsMCIgZD0iTTE5MSA3MGwwIDEzOWMwLDI3IC0yMiw0OSAtNDksNDlsLTc1IDBjLTI3LDAgLTQ5LC0yMiAtNDksLTQ5bDAgLTEzOSAxNzMgMHptLTI0IDQybDAgOTNjMCwxOSAtMjUsMTkgLTI1LDBsMCAtOTNjMCwtMjAgMjUsLTIwIDI1LDB6bS01MCAwYzAsMzEgMCw2MiAwLDkzIDAsMTkgLTI1LDE5IC0yNSwwIDAsLTMxIDAsLTYyIDAsLTkzIDAsLTIwIDI1LC0yMCAyNSwwem0tNTAgMGwwIDkzYzAsMTkgLTI1LDE5IC0yNSwwbDAgLTkzYzAsLTIwIDI1LC0yMCAyNSwweiI+PC9wYXRoPjxwYXRoIGNsYXNzPSJmaWwwIiBkPSJNMTMgMzNsNDYgMGMtMSwtOSAyLC0xNyA4LC0yM2wwIC0xYzEzLC0xMiA2NCwtMTIgNzYsMCA2LDcgMTAsMTUgOSwyNGw0MCAwYzE3LDAgMTcsMjYgMCwyNmwtMTc5IDBjLTE3LDAgLTE3LC0yNiAwLC0yNnptNjYgMGw1MyAwYzEsLTMgMCwtNyAtMywtMTAgLTQsLTQgLTQzLC00IC00OCwwbDAgMGMtMywzIC0zLDcgLTIsMTB6Ij48L3BhdGg+PC9nPjwvc3ZnPg==');">
                                        </span-->

                                        <?php 
                                        }
                                        ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>

    <?php 
        }
    }
    }
    ?>

    </div>
</body>
<script>
    setPostsSongInfo()
    </script>

</html>