<!DOCTYPE html>
<html lang="en">
<?php


?>
<style>
.dmContainer {
    width: 65vw;
    border-radius: 1ch;
    padding: 1ch;
    background: #ffffff17;
    border-style: solid;
    border-color: #ffffff17;
}
.postContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #ffffff17;
    border-style: solid;
    border-color: #ffffff17;
    overflow: scroll;
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

table.emptyGrid {
    width: 65vw;
}

td.gridSize {
    border-width: 0.65rem;
    border-radius: 2.25rem;
    border-style: solid;
    height: 5rem;
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
<body>
    <div class="col-12" style="font-size: 22.5px; padding-left: 10ch">
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 titleBold" style="">
                <form method="get">
                    <div class="col-10">
                        <input maxlength="280" type="text" name="search_msg" placeholder="Search for users..." value="" style="width: 65vw; background-color: #212121; border-color: #212121; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; vertical-align: top;" required />
                    </div>
                </form>
            </div>
        </div>

        <?php

        // ----------
        // ====================
        // PRINTS TOP 4 USER RESULTS, 
        // THEN "ALL USERS" LINK,
        // THEN TOP 5 POSTS,
        // FINALLY "ALL POSTS" LINK
        // ====================
        // ----------

        // $userList is updated by Middle End. Only top four (4) results are added to $userList
        $userList = [ 
            "Karim" => ["fname" => "Karim", "lname" => "Karim", "profile_description" => "Karim Karim Karim Karim Karim"],
            "Jose" => ["fname" => "Jose", "lname" => "Jose", "profile_description" => "Jose Jose Jose Jose Jose"],
            "User12345" => ["fname" => "First", "lname" => "Last", "profile_description" => "Here's my description baby!"],
            "User42069" => ["fname" => "Blaze", "lname" => "It", "profile_description" => "Click me uwu"],
            "User32" => ["fname" => "Gang", "lname" => "Goon", "profile_description" => "LfgG AC Goon Voyage"],
            "User33" => ["fname" => "Gang", "lname" => "Goon", "profile_description" => "LfgG AC Goon Voyage"],
            "User34" => ["fname" => "Gang", "lname" => "Goon", "profile_description" => "LfgG AC Goon Voyage"],
            "User35" => ["fname" => "Gang", "lname" => "Goon", "profile_description" => "LfgG AC Goon Voyage"],
            "User36" => ["fname" => "Gang", "lname" => "Goon", "profile_description" => "LfgG AC Goon Voyage"]];

        // $postList is updated by Middle End. Only top five (5) results are added to $postList
        $postList = [ 
            "001" => ["username" => "Karim", "post_title" => "Best Song <3", "post_description" => "I love this song!", "post_link" => "https://maxedward.com"],
            "002" => ["username" => "Jose", "post_title" => "My Jams", "post_description" => "Best album in the universeeee", "post_link" => "https://maxedward.com"],
            "003" => ["username" => "User42069", "post_title" => "NEW SHIT !!!", "post_description" => "Listen to this shit!!!", "post_link" => "https://maxedward.com"],
            "004" => ["username" => "User12345", "post_title" => "😍😍😍", "post_description" => "OMG NO WAYY", "post_link" => "https://maxedward.com"],
            "005" => ["username" => "Max", "post_title" => "Jeeeeeez", "post_description" => "Im crying rn", "post_link" => "https://maxedward.com"]];
        $postList = [];
        $userList = [];

        //
        // \/ \/ \/ \/ \/ KARIM'S CODE STARTS HERE \/ \/ \/ \/ \/

        if (isset($_REQUEST['search_msg'])){
            /*
            $search = $_REQUEST['search_msg'];
            
            if( $user = searchProfiles($search)) {

            $username = $user['username'];
            unset($user[$username]);
            $userList[$username] = $user;
            }
            */
            //echo "<p style='color:white'> SEARCH MADE for: $username </p>";

            $search = $_REQUEST['search_msg'];

            $results = userSearch($search);

            foreach($results as $user){
                $userList[$user] = getProfile($user);
            }
        }
        
            //echo "<p style='color:white'> NO RESULTS FOUND for: $_REQUEST[search_msg] </p>";
        
        // ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
        //
            
        $additionDelay = 0.1;
        $delayTime = 0;
            
        if (count($userList) > 0) { ?>

        <div class="col-12 fadeIn" style="margin-top: 5vh; animation-delay: <?php echo $delayTime; ?>s;">
            <div class="col-10 push-1 subtitleBold" style="font-size: 22.5px">
                User Results
            </div>
        </div>
        <div class="col-12" style="margin-top: 0vh">

            <?php
            $userIndex = 1;
            foreach ($userList as $username => $info) { 
                if (($userIndex < 5) || (isset($_GET['viewAll']) && $_GET['viewAll'] == "users")) {
            ?>

            <div class="col-12 fadeIn" style="margin-top: 1vh; animation-delay: <?php echo $delayTime; ?>s;">
                <a href="/~kg448/account.php?viewing=<?php echo $username; ?>&redirectFrom=search" title="View <?php echo $username; ?>'s Profile">
                    <div class="col-10 push-1 bodyBold dmContainer" style="margin: 0.25ch 0">
                        <div class="col-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="max-width: fit-content;">
                                            <span class="">
                                                <img src="<?php echo getProfile($username)["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                            </span>
                                        </td>
                                        <td style="padding-left: 1.69ch">
                                            <div class="col-12">
                                                <?php echo $info['fname'].' '.$info['lname']; ?> 
                                                <span class="subtitleLight" style="font-size: 20px">(<?php echo $username; ?>)</span>
                                                <?php
                                                if (isAdmin($username)) {
                                                    print('
                                                    <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                        Admin
                                                    </span>');
                                                }
                                                ?>
                                            </div>
                                            <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                                <?php echo $info['profile_description']; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </a>
            </div>

        <?php
                $delayTime += $additionDelay;
                }
            $userIndex += 1;
            }
        }
        if (isset($_GET['viewAll']) && $_GET['viewAll'] == "users") {
        ?>

            <div class="col-12 fadeIn" style="margin: 0.5vh 0 5vh 0; animation-delay: <?php echo $delayTime; ?>s;">
                <a href="?search_msg=<?php echo $_GET['search_msg']; ?>&viewAll=none">
                    <div class="col-10 push-15 subtitleLight" style="margin-top: 1vh; font-size: 20px; text-decoration: none;">
                        View less
                    </div>
                </a>
            </div>

        <?php
        } 
        else if (count($userList) > 4) {
        ?>

            <div class="col-12 fadeIn" style="margin: 0.5vh 0 5vh 0; animation-delay: <?php echo $delayTime; ?>s;">
                <a href="?search_msg=<?php echo $_GET['search_msg']; ?>&viewAll=users">
                    <div class="col-10 push-15 subtitleLight" style="margin-top: 1vh; font-size: 20px; text-decoration: none;">
                        View more
                    </div>
                </a>
            </div>

        <?php 
        }

        if (count($postList) > 0) {
        ?>

            <div class="col-12 fadeIn" style="margin-top: 0vh; animation-delay: <?php echo $delayTime; ?>s;">
                <div class="col-10 push-1 subtitleBold" style="font-size: 22.5px">
                    Post Results
                </div>
            </div>
            <div class="col-12" style="margin-top: 1vh">
                <div class="col-10 push-1">

                <?php
                foreach ($postList as $postID => $info) { 
                ?>

                    <div class="col-4 fadeIn" style="margin: 0 1vw 1vw 0; width: 21vw; animation-delay: <?php echo $delayTime; ?>s;">
                        <div class="col-12 bodyBold postContainer" style="margin: 0 0.25ch">
                            <div class="col-12">
                                <a href="/~kg448/account.php?viewing=<?php echo $info['username']; ?>&redirectFrom=search" title="View <?php echo $info['username']; ?>'s Profile">
                                    <table class="bodyLight">
                                        <tbody>
                                            <tr>
                                                <td style="max-width: fit-content;">
                                                    <span class="">
                                                        <img src="<?php echo getProfile($info['username'])["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                    </span>
                                                </td>
                                                <td style="padding-left: 0.5ch">
                                                    <div class="col-12">
                                                        <?php echo getProfile($info['username'])["fname"].' '.getProfile($info['username'])["lname"]; ?>
                                                    </div>
                                                    <?php
                                                    if (isAdmin($info['username'])) {
                                                        print('
                                                        <span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                            Admin
                                                        </span>');
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </a>
                                <table style="margin: 0.25ch 0;">
                                    <tbody>
                                        <tr>
                                            <td style="max-width: fit-content;">
                                                <span class="">
                                                    <img src="assets/profPic.jpeg" class="logoImg" style="border-width: 0.05px; border-radius: 0.35ch; height: 7.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                </span>
                                            </td>
                                            <td style="padding-left: 1.69ch">
                                                <div class="col-12">
                                                    <?php echo $info['post_title']; ?>
                                                </div>
                                                <a href="<?php echo $info['post_link']; ?>">
                                                    <div class="col-12 subtitleLight" style="font-size: 20px; margin-top: 0.2ch; text-decoration: none;" title="Open song link">
                                                        Go to song ↗
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                    <?php echo $info['post_description']; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                $delayTime += $additionDelay;
                }

                if (count($postList) > 5) {
                ?>

                    <div class="col-4 fadeIn" style="margin: 0 1vw 1vw 0; width: 21vw; animation-delay: <?php echo $delayTime; ?>s;">
                        <a href="">
                            <div class="col-12 bodyBold postContainer" style="margin: 0 0.25ch">
                                <div class="col-12">
                                    <table style="margin: 1.5ch 0;">
                                        <tbody>
                                            <tr>
                                                <td style="padding-left: 1.69ch">
                                                    <div class="col-12">
                                                        View all Posts ↗
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </a>
                    </div>

            <?php
                }
            }
            ?>

                </div>
            </div>

        </div>
    </div>
</body>
</html>