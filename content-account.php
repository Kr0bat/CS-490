
<?php


?>
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
.chatContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #2a4223;
    border-style: solid;
    border-color: #436339;
}
.blockContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #3d2222;
    border-style: solid;
    border-color: #654040;
}
.statContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #31313132;
    border-style: solid;
    border-color: #4a4a4a32;
}
.commentContainer {
    border-radius: 0 0 1ch 1ch;
    padding: 1ch;
    background: #313131;
    border-style: solid;
    border-color: #4a4a4a;
    border-top: none;
}

table.emptyGrid {
    width: 65vw;
}

td.gridSize {
    border-width: 0.65rem;
    border-radius: 2.25rem;
    border-style: solid;
    height: 20vw;
    opacity 1;
    animation: pulse 1s ease forwards;
}

td.emptyGrid1 {
    border-color: #ffffff45;
    background: #ffffff15;
    animation-delay: 0s;
    animation-iteration-count: infinite;
}
td.emptyGrid12 {
    border-color: #ffffff37;
    background: #ffffff13;
    animation-delay: 0.2s;
    animation-iteration-count: infinite;
}
td.emptyGrid13 {
    border-color: #ffffff30;
    background: #ffffff11;
    animation-delay: 0.4s;
    animation-iteration-count: infinite;
}
td.emptyGrid2 {
    border-color: #ffffff18;
    background: #ffffff09;
    animation-delay: 0.2s;
    animation-iteration-count: infinite;
}
td.emptyGrid22 {
    border-color: #ffffff15;
    background: #ffffff08;
    animation-delay: 0.4s;
    animation-iteration-count: infinite;
}
td.emptyGrid23 {
    border-color: #ffffff12;
    background: #ffffff07;
    animation-delay: 0.6s;
    animation-iteration-count: infinite;
}
td.emptyGrid3 {
    border-color: #ffffff08;
    background: #ffffff07;
    animation-delay: 0.4s;
    animation-iteration-count: infinite;
}
td.emptyGrid32 {
    border-color: #ffffff06;
    background: #ffffff05;
    animation-delay: 0.6s;
    animation-iteration-count: infinite;
}
td.emptyGrid33 {
    border-color: #ffffff03;
    background: #ffffff03;
    animation-delay: 0.8s;
    animation-iteration-count: infinite;
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
</style>
<div class="col-12" style="font-size: 22.5px; <?php if (!$isMobile) { echo "padding-left: 10ch"; } ?>">
    
    <?php

        if (isset($_GET['viewing'])) {
            // SHOW SOMEONE ELSE'S PROFILE
    ?>

    <div class="col-12" style="margin-top: 5vh">
        <a href="/~kg448/<?php if (isset($_GET['redirectFrom'])) { echo $_GET['redirectFrom']; } else { echo "search"; } ?>.php">
            <div class="col-10 push-1 subtitleBold underlineOnHover" style="font-size: 22.5px">
                Back
            </div>
        </a>
    </div>
    <div class="col-12" style="margin: 10vh 0">
        <div class="col-10 push-1 bodyLight" style="">
            <div class="col-2">
                <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_GET['viewing'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="imgFitMid logoImg" style="border-radius: 100%; height: min(10ch, 10vw); width: min(10ch, 10vw); border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
            </div>
            <div class="col-8 push-05">
                <div class="col-12 titleLight">
                    <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_GET['viewing'])["fname"].' '.getProfile($_GET['viewing'])["lname"]; } ?> 
                    <span class="subtitleLight" style="font-size: 20px">(<?php echo $_GET['viewing']; ?>)</span>
                    <?php
                    if ($_SERVER[HTTP_HOST] != "maxedward.com") {
                        if (isAdmin($_GET['viewing'])) {
                            print('
                            <span class="subtitleLight" style="font-size: 20px; color: rgb(144, 85, 54); padding-left: 5px;">
                                Admin
                            </span>');
                        }
                    }
                    ?>
                </div>
                <div class="col-12 bodyLight" style="margin-top: 2ch">
                    <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_GET['viewing'])["profile_description"]; } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 0.5vh">
        <div class="col-10 push-1 titleBold" style="font-size: 22.5px">
            Statistics
        </div>
    </div>
    <div class="col-12" style="margin-top: 0vh">
        <div class="col-10 push-1">
            <div class="col-12" style="margin: 2ch 0 1ch 0">
                <div class="col-11 bodyBold statContainer">
                    <table style="width: 100%;">
                        <tbody>
                            <tr style="height: 1ch;"></tr>
                            <tr style="width: 100%; text-align: center;">
                                <td class="bodyBold" style="width: 49%; font-size: 30px;">
                                    69
                                </td>
                                <td style="width: 1ch"></td>
                                <td class="bodyBold" style="width: 49%; font-size: 30px;">
                                    420
                                </td>
                            </tr>
                            <tr style="width: 100%; text-align: center;">
                                <td class="bodyLight">
                                    Posts
                                </td>
                                <td style="width: 1ch"></td>
                                <td class="bodyLight">
                                    Likes
                                </td>
                            </tr>
                            <tr style="height: 2ch;"></tr>
                            <tr style="width: 100%; text-align: center; ">
                                <td class="chatContainer">
                                    <a href="/~kg448/chat.php?chatWith=<?php echo $_GET['viewing']; ?>">
                                        <table class="bodyBold" style="width: 100%">
                                            <tbody>
                                                <tr style="width: 100%">
                                                    <td style="text-align: right; width: 50%;">
                                                        <img src="assets/comment.png" class="" style="border-width: 0; height: 2ch; margin-top: 0; cursor: pointer; padding-right: 0.5ch;" />
                                                    </td>
                                                    <td class="underlineOnHover" style="text-align: left; width: 50%; padding-left: 0ch;">
                                                        Chat
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </a>
                                    </td>

                                    <?php if ($_SESSION['role'] == "admin") { ?>

                                    <td style="width: 1ch"></td>
                                    <td class="blockContainer bodyBold underlineOnHover">
                                        Block User
                                    </td>

                                    <?php } ?>

                                </a>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 7vh">
        <div class="col-10 push-1 titleBold" style="font-size: 22.5px">
            Post History
        </div>
    </div>
    <div class="col-12" style="margin-top: 1vh">
    <div class="col-10 push-1 bodyBold" style="font-size: 20px">
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
            "comments" => [
                0 => ["creator" => "Karim", "description" => "Oldest Comment"],
                1 => ["creator" => "Jose", "description" => "Middle Comment"]
                ]
        ],
        3 => [
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
        4 => [
            "creator" => "Max", 
            "title" => "Title Here", 
            "description" => "Description here with a lot more words than that of the title", 
            "link" => "https://maxedward.com",
            "comments" => []
            ],
        5 => [
            "creator" => "Max", 
            "title" => "Title Here", 
            "description" => "Description here with a lot more words than that of the title", 
            "link" => "https://maxedward.com",
            "comments" => []
            ]
        ];

        $postList = [];

        $postList = getUserPosts($_GET['viewing']);
        
        foreach ($postList as $postID => $info) {
        ?>

            <div class="col-12" style="margin: 2ch 0 1ch 0">
                <div class="col-11 titleBold" style="">
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
                                                                    <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($info['creator'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td style="padding-left: 0.5ch; overflow: visible; white-space: nowrap;">
                                                            <div class="col-12">
                                                                <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                                    <?php 
                                                                    if ($_SERVER[HTTP_HOST] != "maxedward.com") { 
                                                                        echo getProfile($info['creator'])["fname"].' '.getProfile($info['creator'])["lname"]; 
                                                                        if (isAdmin($info['creator'])) {
                                                                            print('
                                                                                <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                                                    Admin
                                                                                </span>');
                                                                        } 
                                                                    } else { 
                                                                        echo "Max Cohen"; 
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
                                                    <img src="assets/comment.png" onclick="openComment(<?php echo $info['post_id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                    <img src="assets/heart-off.png" onclick="toggleLike(<?php echo $info['post_id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-left: 0.75ch; cursor: pointer;" />
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
                                                    <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($commentInfo['creator'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                </span>
                                            </a>
                                        </td>
                                        <td style="padding-left: 0.5ch">
                                            <div class="col-12">
                                                <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                    <?php 
                                                    if ($_SERVER[HTTP_HOST] != "maxedward.com") { 
                                                        echo getProfile($commentInfo['creator'])["fname"];
                                                        if (isAdmin($commentInfo["creator"])) {
                                                        print('
                                                            <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                                Admin
                                                            </span>');
                                                        } 
                                                    } else {
                                                        echo $commentInfo['creator'];
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
        ?>
        </div>
    </div>

    <?php
        } else if (isset($_GET['editProfile'])) {
            // DISPLAY EDIT PROFILE FORM
    ?>

    <div class="col-12" style="margin-top: 5vh">
        <div class="col-10 push-1 titleBold" style="">
            Edit Account
        </div>
    </div>
    <div class="col-12" style="margin-top: 1vh">
        <div class="col-10 push-1 subtitleLight" style="font-size: 22.5px">
            This information is public to all users
        </div>
    </div>
    <div class="col-12" style="margin: 10vh 0">
        <div class="col-10 push-1 bodyLight" style="">
            <form method="POST">
                <div class="col-2">
                    <div class="col-12 bodyLight">
                        <a href="/~kg448/account.php" class="linkLight">
                            <span class="subtitleBold" style="font-size: 17.5px;">
                                cancel
                            </span>
                        </a>
                    </div>
                    <div class="col-12" style="margin-top: 2ch">
                        <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="imgFitMid logoImg" style="border-radius: 100%; height: min(10ch, 10vw); width: min(10ch, 10vw); border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
                    </div>
                </div>
                <div class="col-8 push-05">
                    <div class="col-11 bodyLight" style="margin-top: 0ch;">
                        First & Last Name:
                    </div>
                    <div class="col-5 bodyLight" style="margin-top: 0.25ch;">
                        <input maxlength="100" type="text" name="edit_account_name_first" placeholder="First Name" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["fname"]; } ?>" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-5 push-1 bodyLight" style="margin-top: 0.25ch;">
                        <input maxlength="100" type="text" name="edit_account_name_last" placeholder="Last Name" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["lname"]; } ?>" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-11 bodyLight" style="margin-top: 1.5ch;">
                        Paste link to new profile picture:
                    </div>
                    <div class="col-11 bodyLight" style="margin-top: 0.25ch;">
                        <input maxlength="100" type="text" name="edit_account_pfp_link" placeholder="URL to picture" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-11 bodyLight" style="margin-top: 1.5ch;">
                        Description:
                    </div>
                    <div class="col-11 bodyLight" style="margin-top: 0.25ch;">
                        <input maxlength="240" type="text" name="edit_account_description" placeholder="Describe yourself and your music taste!" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_description"]; } ?>" style="font-size: 20px; width: 100%; min-height: 9ch; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-12 bodyLight" style="margin-top: 2ch">
                        <button type="submit" name="edit_account_submit" class="subtitleBold" style="font-size: 17.5px; background-color: #ffffff00; border-color: #ffffff00; cursor: pointer;">save profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
        } else {
            // DISPLAY REGULAR PROFILE
    ?>

    <div class="col-12" style="margin-top: 5vh; text-align: right;">
        <a href="/~kg448/index.php?logout=true">
            <div class="col-10 push-1 subtitleBold underlineOnHover" style="font-size: 22.5px">
                Log Out
            </div>
        </a>
    </div>
    <div class="col-12" style="margin-top: 5vh">
        <div class="col-10 push-1 titleBold" style="">
            Account
        </div>
    </div>
    <div class="col-12" style="margin-top: 1vh">
        <div class="col-10 push-1 subtitleLight" style="font-size: 22.5px">
            This information is public to all users
        </div>
    </div>
    <div class="col-12" style="margin: 10vh 0">
        <div class="col-10 push-1 bodyLight" style="">
            <div class="col-2">
                <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="imgFitMid logoImg" style="border-radius: 100%; height: min(10ch, 10vw); width: min(10ch, 10vw); border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
            </div>
            <div class="col-8 push-05">
                <div class="col-12 titleLight">
                    <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["fname"].' '.getProfile($_SESSION['username'])["lname"]; } ?> 
                    <span class="subtitleLight" style="font-size: 20px">(<?php echo $_SESSION['username']; ?>)</span>
                    <?php
                    if ($_SERVER[HTTP_HOST] != "maxedward.com") {
                        if (isAdmin($_SESSION['username'])) {
                            print('
                            <span class="subtitleLight" style="font-size: 20px; color: rgb(144, 85, 54); padding-left: 5px;">
                                Admin
                            </span>');
                        }
                    }
                    ?>
                </div>
                <div class="col-12 bodyLight" style="margin-top: 2ch">
                    <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_description"]; } ?>
                </div>
                <div class="col-12 bodyLight" style="margin-top: 2ch">
                    <a href="?editProfile=true" style="text-decoration: none;">
                        <span class="subtitleBold" style="font-size: 17.5px;">
                            edit profile
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 1vh">
        <div class="col-10 push-1 titleBold" style="font-size: 22.5px">
            Post History
        </div>
    </div>
    <div class="col-12" style="margin-top: 1vh">
        <div class="col-10 push-1 bodyBold" style="font-size: 20px">
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
            "comments" => [
                0 => ["creator" => "Karim", "description" => "Oldest Comment"],
                1 => ["creator" => "Jose", "description" => "Middle Comment"]
                ]
        ],
        3 => [
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
        4 => [
            "creator" => "Max", 
            "title" => "Title Here", 
            "description" => "Description here with a lot more words than that of the title", 
            "link" => "https://maxedward.com",
            "comments" => []
            ],
        5 => [
            "creator" => "Max", 
            "title" => "Title Here", 
            "description" => "Description here with a lot more words than that of the title", 
            "link" => "https://maxedward.com",
            "comments" => []
            ]
        ];

        $postList = [];

        $postList = getUserPosts($_SESSION['username']);
        
        foreach ($postList as $postID => $info) {
        ?>

            <div class="col-12" style="margin: 2ch 0 1ch 0">
                <div class="col-11 titleBold" style="">
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
                                                                    <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($info['creator'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td style="padding-left: 0.5ch; overflow: visible; white-space: nowrap;">
                                                            <div class="col-12">
                                                                <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                                    <?php 
                                                                    if ($_SERVER[HTTP_HOST] != "maxedward.com") { 
                                                                        echo getProfile($info['creator'])["fname"].' '.getProfile($info['creator'])["lname"]; 
                                                                        if (isAdmin($info['creator'])) {
                                                                            print('
                                                                                <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                                                    Admin
                                                                                </span>');
                                                                        } 
                                                                    } else { 
                                                                        echo "Max Cohen"; 
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
                                            <div class="col-8" style="height: 8ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 2.65ch;">
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
                                            <div class="col-4" style="height: 8ch; overflow: hidden; text-overflow: ellipsis; word-break: break-word; padding-top: 5ch; text-align: right;">
                                                <div class="col-12" style="">
                                                    <img src="assets/comment.png" onclick="openComment(<?php echo $info['post_id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                    <img src="assets/heart-off.png" onclick="toggleLike(<?php echo $info['post_id'] ?>)" class="" style="border-width: 0; height: 3ch; margin-left: 0.75ch; cursor: pointer;" />
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
                                                    <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($commentInfo['creator'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                </span>
                                            </a>
                                        </td>
                                        <td style="padding-left: 0.5ch">
                                            <div class="col-12">
                                                <a href="/~kg448/account.php?viewing=<?php echo $commentInfo["creator"]; ?>&redirectFrom=feed" title="View <?php echo $commentInfo["creator"]; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                    <?php 
                                                    if ($_SERVER[HTTP_HOST] != "maxedward.com") { 
                                                        echo getProfile($commentInfo['creator'])["fname"];
                                                        if (isAdmin($commentInfo["creator"])) {
                                                        print('
                                                            <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                                Admin
                                                            </span>');
                                                        } 
                                                    } else {
                                                        echo $commentInfo['creator'];
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
        ?>
        </div>
    </div>
    
    <?php
        }
    ?>

</div>