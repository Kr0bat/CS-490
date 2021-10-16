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
</style>
<body>
    <div class="col-12" style="font-size: 22.5px; padding-left: 10ch">
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 titleBold" style="">
                <form method="post">
                    <div class="col-10">
                        <input maxlength="280" type="text" name="search_msg" placeholder="Search for Users..." value="" style="width: 65vw; background-color: #212121; border-color: #212121; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; vertical-align: top;" required />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 subtitleBold" style="font-size: 22.5px">
                Results
            </div>
        </div>
        <div class="col-12" style="margin-top: 0vh">

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
            "User42069" => ["fname" => "Blaze", "lname" => "It", "profile_description" => "Click me uwu"]];

        // $postList is updated by Middle End. Only top five (5) results are added to $postList
        $postList = [ 
            "001" => ["username" => "Karim", "post_title" => "Best Song <3", "post_description" => "I love this song!", "post_link" => "https://maxedward.com"],
            "002" => ["username" => "Jose", "post_title" => "My Jams", "post_description" => "Best album in the universeeee", "post_link" => "https://maxedward.com"],
            "003" => ["username" => "User42069", "post_title" => "NEW SHIT !!!", "post_description" => "Listen to this shit!!!", "post_link" => "https://maxedward.com"],
            "004" => ["username" => "User12345", "post_title" => "😍😍😍", "post_description" => "OMG NO WAYY", "post_link" => "https://maxedward.com"],
            "005" => ["username" => "Max", "post_title" => "Jeeeeeez", "post_description" => "Im crying rn", "post_link" => "https://maxedward.com"]];
        
            
        foreach ($userList as $username => $info) { ?>

            <div class="col-12" style="margin-top: 1vh">
                <a href="/~kg448/account.php?viewing=<?php echo $username; ?>&redirectFrom=search" title="View <?php echo $username; ?>'s Profile">
                    <div class="col-10 push-1 bodyBold dmContainer" style="margin: 0.25ch 0">
                        <div class="col-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="max-width: fit-content;">
                                            <span class="">
                                                <img src="assets/profPic.jpeg" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                            </span>
                                        </td>
                                        <td style="padding-left: 1.69ch">
                                            <div class="col-12">
                                                <?php echo $info['fname'].' '.$info['lname']; ?> <span class="subtitleLight" style="font-size: 20px">(<?php echo $username; ?>)</span>
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
        }
        ?>

            <div class="col-12" style="margin-top: 0.5vh">
                <a href="">
                    <div class="col-10 push-15 subtitleLight" style="margin-top: 1vh; font-size: 20px; text-decoration: none;">
                        View all Users ↗
                    </div>
                </a>
            </div>
            <div class="col-12" style="margin-top: 3.5vh">
                <div class="col-10 push-1">

                <?php
                foreach ($postList as $postID => $info) { 
                ?>

                    <div class="col-4" style="margin: 0 1vw 1vw 0; width: 21vw;">
                        <div class="col-12 bodyBold postContainer" style="margin: 0 0.25ch">
                            <div class="col-12">
                                <a href="/~kg448/account.php?viewing=<?php echo $info['username']; ?>&redirectFrom=search" title="View <?php echo $info['username']; ?>'s Profile">
                                    <table class="bodyLight">
                                        <tbody>
                                            <tr>
                                                <td style="max-width: fit-content;">
                                                    <span class="">
                                                        <img src="assets/profPic.jpeg" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                    </span>
                                                </td>
                                                <td style="padding-left: 0.5ch">
                                                    <div class="col-12">
                                                        <?php echo $info['username']; ?>
                                                    </div>
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
                }
                ?>

                    <div class="col-4" style="margin: 0 1vw 1vw 0; width: 21vw;">
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
                </div>
            </div>

        </div>
    </div>
</body>
</html>