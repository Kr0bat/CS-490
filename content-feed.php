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

    foreach($idList as $index => $id){
        $postList[$index] = getPost($id);
        $postList[$index]['id'] = $id;
    }
    $postList = array_reverse($postList);

}

// ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
//

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$isMobile = false;

if( $detect->isMobile() && !$detect->isTablet() ){
    $isMobile = true;
}

if (isset($_GET['successMsg'])) {
    $user = $_GET['successMsg'];
    print('
    <header>
        <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: max(1.35vw, 2.5vh); color: #eaeaea; background-color: #599c51ff">
            New User: '.$user.' successfully created
        </div>
    </header>');
}

?>
<body>
    <div class="col-12" style="font-size: 22.5px; <?php if (!$isMobile) { echo "padding-left: 10ch"; } ?>">
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
            <div class="col-10 push-1 titleBold" style="">
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
                                                    <td style="padding-left: 0.5ch; overflow: visible; white-space: nowrap;">
                                                        <div class="col-12">
                                                            <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight underlineOnHover">
                                                                <?php echo getProfile($info['creator'])["fname"].' '.getProfile($info['creator'])["lname"];

                                                                if (isAdmin($info['creator'])) {
                                                                print('
                                                                    <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                                        Admin
                                                                    </span>');
                                                                } 
                                                                ?>
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
                                                <div class="col-12 bodyLight" style="background: black; border-radius: 0.35ch 0.35ch 0 0; overflow: hidden; text-overflow: ellipsis; word-break: break-word;">
                                                    Song Title Here
                                                </div>
                                                <img src="assets/logo_spotify.png" class="logoImg" style="border-width: 0.05px; border-radius: 0.35ch; width: clamp(100%, 100%, 25ch); border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0ch;" />
                                                <div class="col-12 subtitleLight" style="font-size: 16px; background: black; border-radius: 0 0 1ch 1ch; padding: 0.5ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word;">
                                                    Song Title Here ↗
                                                </div>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 1ch; vertical-align: top; width: 100%;">
                                        <div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word;">
                                            <div class="col-12" style="margin-top: 0.5ch;">
                                                <?php echo $info['title']; ?>
                                            </div>
                                            <div class="col-12 subtitleLight" style="font-size: 16px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden;">
                                                <?php echo $info['description']; ?>
                                            </div>
                                        </div>
                                        <div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 1ch;">
                                            <div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word; margin-top: 0ch; vertical-align: bottom; font-weight: normal;">
                                                Song Title Here
                                                <span class="subtitleLight" style="font-size: 16px; text-overflow: ellipsis; overflow: hidden; padding-left: 1.5ch;">
                                                    (Artist)
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12" style="overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 1ch; text-align: center;">
                                            <table style="margin: 0; width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%">
                                                            <img src="assets/comment.png" onclick="openComment(<?php echo $info['id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                        </td>
                                                        <td style="width: 50%">
                                                            <img src="assets/heart-off.png" onclick="toggleLike(<?php echo $info['id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-left: 0; cursor: pointer;" />
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
                    <div class="col-10 bodyLight commentContainer" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if ($commentIndex == count($info["comments"])-1) { echo "border-radius: 0 0 1ch 1ch"; } else { echo "border-radius: 0;"; } ?>font-style: normal; font-size: 18px;"> 
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
                                    <td style="padding-left: 0.5ch">
                                        <div class="col-12">
                                            <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                <?php echo getProfile($commentInfo['creator'])["fname"];

                                                if (isAdmin($commentInfo["creator"])) {
                                                print('
                                                    <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                        Admin
                                                    </span>');
                                                } 
                                                ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td style="padding-left: 1ch">
                                        <div class="col-12" style="color: #a2a2a2;">
                                            <?php echo $commentInfo["description"]; ?>
                                        </div>
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

    ?>

        <div class="col-12" id="<?php echo $info['id'] ?>" style="margin: 2ch 0 1ch 0">
            <div class="col-10 push-1 titleBold" style="">
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
                                                    <td style="padding-left: 0.5ch; overflow: visible; white-space: nowrap;">
                                                        <div class="col-12">
                                                            <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight underlineOnHover">
                                                                <?php echo getProfile($info['creator'])["fname"].' '.getProfile($info['creator'])["lname"];

                                                                if (isAdmin($info['creator'])) {
                                                                print('
                                                                    <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                                        Admin
                                                                    </span>');
                                                                } 
                                                                ?>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="text-align: right; width: 100%;">
                                        <div class="subtitleLight" style="position: relative; font-size: 20px; margin-top: 0.2ch; text-decoration: none;">
                                            <a href="<?php echo $info['link']; ?>" class="subtitleLight" style="font-size: 20px; text-decoration: none;" title="Open song link">
                                                Go to song ↗
                                            </a>    
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="margin: 0; width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <span class="">
                                            <img src="assets/logo_spotify.png" class="logoImg" style="border-width: 0.05px; border-radius: 0.35ch; height: 15ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
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
                                        <div class="col-6" style="height: 8ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 5ch; text-align: right;">
                                            <div class="col-12" style="">
                                                <img src="assets/comment.png" onclick="openComment(<?php echo $info['id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                <img src="assets/heart-off.png" onclick="toggleLike(<?php echo $info['id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-left: 0.75ch; cursor: pointer;" />
                                            </div>
                                        </div>
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
                    <div class="col-10 bodyLight commentContainer" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if ($commentIndex == count($info["comments"])-1) { echo "border-radius: 0 0 1ch 1ch"; } else { echo "border-radius: 0;"; } ?>font-style: normal; font-size: 18px;"> 
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
                                    <td style="padding-left: 0.5ch">
                                        <div class="col-12">
                                            <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                <?php echo getProfile($commentInfo['creator'])["fname"];

                                                if (isAdmin($commentInfo["creator"])) {
                                                print('
                                                    <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                        Admin
                                                    </span>');
                                                } 
                                                ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td style="padding-left: 1ch">
                                        <div class="col-12" style="color: #a2a2a2;">
                                            <?php echo $commentInfo["description"]; ?>
                                        </div>
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
</html>