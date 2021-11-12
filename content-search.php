<!DOCTYPE html>
<html lang="en">
<?php


?>
<style>
.dmContainer {
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
    <div class="col-12" style="font-size: 22.5px; <?php if (!$isMobile) { echo "padding-left: 6ch"; } ?>">
        <div class="col-12" style="margin-top: 5vh">
            <div class="<?php if (!$isMobile) { echo "col-10 push-1"; } else { echo "col-12"; } ?> titleBold" style="">
                <form method="get">
                    <div class="col-12">
                        <input maxlength="280" type="search" name="search_msg" placeholder="Search for users..." value="" style="width: 100%; background-color: #212121; border-color: #212121; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; vertical-align: top;" required />
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
            "001" => ["username" => "Karim", "title" => "Best Song <3", "description" => "I love this song!", "link" => "https://maxedward.com"],
            "002" => ["username" => "Jose", "title" => "My Jams", "description" => "Best album in the universeeee", "link" => "https://maxedward.com"],
            "003" => ["username" => "User42069", "title" => "NEW SHIT !!!", "description" => "Listen to this shit!!!", "link" => "https://maxedward.com"],
            "004" => ["username" => "User12345", "title" => "😍😍😍", "description" => "OMG NO WAYY", "link" => "https://maxedward.com"],
            "005" => ["username" => "Max", "title" => "Jeeeeeez", "description" => "Im crying rn", "link" => "https://maxedward.com"]];
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

            $userResults = userSearch($search);
            $postList = searchPostByTorD($search); //replace with new backend function

            

            foreach($userResults as $user){
                $userList[$user] = getProfile($user);
            }

            


        }
        
            //echo "<p style='color:white'> NO RESULTS FOUND for: $_REQUEST[search_msg] </p>";
        
        // ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ KARIM'S CODE ENDS HERE ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
        //
            
        $additionDelay = 0.1;
        $delayTime = 0;

        if (count($userList) == 0 && count($postList) == 0) { 
            if (isset($_GET['search_msg'])) {
        ?>

        <div class="col-12" style="margin-top: 5vh;">
            <div class="col-10 push-1 titleBold" style="">
                <div class="" style="text-align: center;color: #b18080;font-size: 32px;">
                    Could not find results</br>for "<?php echo $_GET['search_msg']; ?>"
                </div>
            </div>
        </div>

        <?php
            }
        ?>

        <div class="col-12" style="margin-top: 10vh;">
            <div class="col-10 push-1 titleBold" style="">
                <div class="" style="text-align: center;color: #a2a2a2;font-size: 32px;">
                    Type keywords above<br>to search for users or posts
                </div>
            </div>
        </div>

        <?php
        }
            
        if (count($userList) > 0) { 
        ?>

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

                    if ($isMobile) {
            ?>

            <div class="col-12 fadeIn" style="margin-top: 1vh; animation-delay: <?php echo $delayTime; ?>s;">
                <a href="/~kg448/account.php?viewing=<?php echo $username; ?>&redirectFrom=search&searchKey=<?php echo $_REQUEST['search_msg'] ?>" title="View <?php echo $username; ?>'s Profile">
                    <div class="col-12 bodyBold dmContainer underlineOnHover" style="margin: 0.25ch 0">
                        <div class="col-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="max-width: fit-content;">
                                            <span class="">
                                                <img src="<?php echo getProfile($username)["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 5ch; width: 5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                            </span>
                                        </td>
                                        <td style="padding-left: 1.69ch; width: 100%;">
                                            <div class="col-12">
                                                <span style="<?php if (isAdmin($username)) { echo " color: rgb(175, 107, 72);"; } ?>">
                                                    <?php echo $info['fname'].' '.$info['lname']; ?> 
                                                </span>
                                                <span class="subtitleLight" style="font-size: 20px;">
                                                    (<?php echo $username; ?>)
                                                </span>
                                            </div>
                                            <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                                <?php echo $info['profile_description']; ?>
                                            </div>
                                        </td>
                                        <td style="max-width: fit-content;">
                                            <a href="/~kg448/chat.php?chatWith=<?php echo $username; ?>&redirectFrom=search" title="Chat with <?php echo $username; ?>">
                                                <span class="">
                                                    <img src="assets/comment.png" class="" style="border-width: 0.05px; border-radius: 0; height: 5ch; width: 5ch; border-style: none; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </a>
            </div>

            <?php
                    } else {
            ?>

            <div class="col-12 fadeIn" style="margin-top: 1vh; animation-delay: <?php echo $delayTime; ?>s;">
                <a href="/~kg448/account.php?viewing=<?php echo $username; ?>&redirectFrom=search&searchKey=<?php echo $_REQUEST['search_msg'] ?>" title="View <?php echo $username; ?>'s Profile">
                    <div class="col-10 push-1 bodyBold dmContainer underlineOnHover" style="margin: 0.25ch 0">
                        <div class="col-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="max-width: fit-content;">
                                            <span class="">
                                                <img src="<?php echo getProfile($username)["profile_picture"]; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 5ch; width: 5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                            </span>
                                        </td>
                                        <td style="padding-left: 1.69ch; width: 100%;">
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
                                        <td style="max-width: fit-content;">
                                            <a href="/~kg448/chat.php?chatWith=<?php echo $username; ?>&redirectFrom=search" title="Chat with <?php echo $username; ?>">
                                                <span class="">
                                                    <img src="assets/comment.png" class="" style="border-width: 0.05px; border-radius: 0; height: 4ch; width: 4ch; border-style: none; border-color: rgba(255, 255, 255, 0.15); margin-top: 0ch;" />
                                                </span>
                                            </a>
                                        </td>

                                        <?php 
                                        if (isFollowing($_SESSION['username'], $username)) {
                                        ?>

                                        <td style="max-width: fit-content; padding-left: 1.75ch;">
                                            <a href="/~kg448/search.php?search_msg=<?php echo $_GET['search_msg']; ?>" title="Unfollow <?php echo $username; ?>">
                                                <span class="" style="">
                                                    <img src="assets/comment.png" class="" style="border-width: 0.05px; border-radius: 0; height: 5.75ch; width: 5.25ch; border-style: none; border-color: rgba(255, 255, 255, 0.15); padding-top: 0.65ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjN2RjMGUyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDg0Ni42NiA4NDYuNjYiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojN2RjMGUyfQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cGF0aCBjbGFzcz0iZmlsMCIgZD0iTTcxMC4xMSA2NzMuMzRjMCwtNy44NyAwLC04MS42MSAwLC0xMzUuODIgMCwtNTQuMTkgLTMyLjQ2LC03Ni4yNiAtMTE3LjU1LC04MC42NyAtNjcuMywtMy40OSAtOTkuODksLTUyLjcxIC0xMTAuNTgsLTczLjE0IDQ1LjQsLTE4LjkzIDgwLjY1LC02MS4xMiA4MC42NSwtMTI2LjY1bDAgLTY2LjgyYzAsLTE4NC4yNiAtMjc4LjU5LC0xODQuMjYgLTI3OC41OSwwbDAgNjYuODJjMCw2NS41MyAzNS4yNSwxMDcuNzQgODAuNjUsMTI2LjY1IC0xMC42OSwyMC40MyAtNDMuMjgsNjkuNjUgLTExMC41OCw3My4xNCAtODUuMDgsNC40MSAtMTE3LjU1LDI2LjQ4IC0xMTcuNTUsODAuNjcgMCw1NC4yMSAwLDEyNy45NSAwLDEzNS44MiAwLDAuOTggNjAuMzYsMS42MyAxNDEuODcsMS45NiAzLjA5LC03Ny4zNiA2Ni43OCwtMTM5LjEzIDE0NC45MSwtMTM5LjEzIDc4LjEyLDAgMTQxLjgxLDYxLjc3IDE0NC45LDEzOS4xMyA4MS41MywtMC4zMyAxNDEuODcsLTAuOTkgMTQxLjg3LC0xLjk2em0tMjg2Ljc3IC0xMDUuNTRjNjIuNjMsMCAxMTMuNDIsNTAuNzggMTEzLjQyLDExMy40MSAwLDYyLjY0IC01MC43OSwxMTMuNDEgLTExMy40MiwxMTMuNDEgLTYyLjY0LDAgLTExMy40MiwtNTAuNzcgLTExMy40MiwtMTEzLjQxIDAsLTYyLjYzIDUwLjc4LC0xMTMuNDEgMTEzLjQyLC0xMTMuNDF6bS02OS4wOCAxMjYuOGMtMTkuNDcsLTE5LjEzIDkuNjMsLTQ4LjcxIDI5LjA4LC0yOS41OWwyMy4zNiAyMi44OSA1Ni40NSAtNTcuMDVjMTkuMjMsLTE5LjM0IDQ4LjY2LDkuOSAyOS40MiwyOS4yNWwtNzAuODUgNzEuNjJjLTguMDMsOC4xNiAtMjEuMTksOC4yOCAtMjkuMzUsMC4yNGwtMzguMTEgLTM3LjM2eiI+PC9wYXRoPjwvZz48L3N2Zz4=')">
                                                </span>
                                            </a>
                                        </td>

                                        <?php 
                                        } else {
                                        ?>

                                        <td style="max-width: fit-content; padding-left: 2ch;">
                                            <a href="/~kg448/search.php?search_msg=<?php echo $_GET['search_msg']; ?>" title="Follow <?php echo $username; ?>">
                                                <span class="" style="">
                                                    <img src="assets/comment.png" class="" style="border-width: 0.05px; border-radius: 0; height: 5ch; width: 5ch; border-style: none; border-color: rgba(255, 255, 255, 0.15); padding-top: 0.25ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjRkZGRkZGIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjQgNjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48cGF0aCBkPSJNNDEuNSwxOC40OWMwLDMuMTA5LTEuMjYsNi4wMi0zLjU2LDguMmMtMC40NiwwLjQzOS0wLjk2LDAuODQtMS40OCwxLjE4OWMtMS45NiwxLjM0LTQuMjksMi4wOS02LjYzLDIuMDkgIGMtMS43NywwLTMuNDgtMC40Mi01LjA3LTEuMjM5Yy0wLjQ1LTAuMjMtMC44Ny0wLjQ5LTEuMjgtMC43NjFjLTAuMDEtMC4wMi0wLjAxLTAuMDItMC4wMi0wLjAyYy0yLjktMi4wMy00Ljc5LTUuNC00Ljk1LTguOTQgIGMtMC4xOC00LjE0OSwxLjg5LTguMDksNS40MS0xMC4yNzlDMjUuNzMsNy42LDI3LjgzLDcuMDEsMzAuMDEsNy4wMWMyLDAsMy45NSwwLjUxLDUuNjYsMS40NzFDMzkuMjYsMTAuNTMsNDEuNSwxNC4zNiw0MS41LDE4LjQ5eiI+PC9wYXRoPjxwYXRoIGQ9Ik0zNy4xOSwyOS43OWMxLjY5LDAuMzcsMy4zNiwwLjg4LDQuOTcsMS41MWMtMS4yNSwwLjI1LTIuNDUsMC42Ny0zLjU3LDEuMjRjLTQuMjUsMi4yLTcuMTQsNi41MS03LjU0LDExLjI2ICBjLTAuNDEsNC44MiwxLjc1LDkuNTksNS42NCwxMi40NmMwLjE1LDAuMTEsMC4zLDAuMjIxLDAuNDUsMC4zMmMtOS40OSwxLjEtMTkuMTctMC4wMjEtMjguMTctMy4yOUM3Ljc5LDUyLjg2LDcsNTEuNzMsNyw1MC40NyAgdi02Ljk2YzAtMy43NywxLjg5LTcuMjI5LDUuMDctOS4yN2MzLjI2LTIuMDksNi44Mi0zLjU4LDEwLjYtNC40MmMwLjM4LDAuMjUsMC43NywwLjQ3OSwxLjE4LDAuNjg5YzEuODgsMC45NzEsMy44OSwxLjQ2LDUuOTgsMS40NiAgYzEuNzMsMCwzLjQ2LTAuMzUsNS4wOC0xQzM1LjcsMzAuNjUsMzYuNDYsMzAuMjUsMzcuMTksMjkuNzl6Ij48L3BhdGg+PHBhdGggZD0iTTUxLjMzLDM0LjhjMy41LDIuMTcsNS42Nyw2LjA4LDUuNjcsMTAuMTljMCw0LjQ1LTIuNTUsOC42NC02LjUxLDEwLjY4Yy0xLjY2LDAuODUtMy41NSwxLjMxMS01LjQ2LDEuMzExICBjLTAuMzksMC0wLjc4LTAuMDIxLTQuMzMtMC44MDFsLTIuODItMS41MjljLTMuMzMtMi40Ni01LjE5LTYuNTUxLTQuODQtMTAuNjgxYzAuMzUtNC4wNjksMi44Mi03Ljc3LDYuNDctOS42NDkgIGMxLjY3LTAuODYsMy41Ni0xLjMxMSw1LjQ4LTEuMzExYzAuMzksMCwwLjc5LDAuMDIxLDEuMTcsMC4wN0M0OC4wMSwzMy4yNCw0OS43OCwzMy44Myw1MS4zMywzNC44eiBNNTMsNDQuOTljMC0wLjU1LTAuNDUtMS0xLTFoLTYgIHYtNmMwLTAuNTUtMC40NS0xLTEtMXMtMSwwLjQ1LTEsMXY2aC02Yy0wLjU1LDAtMSwwLjQ1LTEsMWMwLDAuNTYsMC40NSwxLDEsMWg2djZjMCwwLjU2LDAuNDUsMSwxLDFzMS0wLjQ0LDEtMXYtNmg2ICBDNTIuNTUsNDUuOTksNTMsNDUuNTUsNTMsNDQuOTl6Ij48L3BhdGg+PC9zdmc+')">
                                                </span>
                                            </a>
                                        </td>

                                        <?php 
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </a>
            </div>

        <?php
                    }

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

                    <div class="col-12 fadeIn" id="<?php echo $info['id'] ?>" style="margin: 2ch 0 1ch 0; animation-delay: <?php echo $delayTime; ?>s;">
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
                                                        <a href="<?php echo $info['link']; ?>" title="Go to song">
                                                            <img src="<?php echo $info['album_art']; ?>" class="logoImg" style="border-width: 0.05px; border-radius: 0.35ch; height: 15ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                        </a>
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
                $delayTime += $additionDelay;
                }

                if (count($postList) > 5) {
                ?>

                    <div class="col-12 fadeIn" style="margin: 0.5vh 0 5vh 0; animation-delay: <?php echo $delayTime; ?>s;">
                        <a href="?search_msg=<?php echo $_GET['search_msg']; ?>&viewAll=posts">
                            <div class="col-10 push-15 subtitleLight" style="margin-top: 1vh; font-size: 20px; text-decoration: none;">
                                View more
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

<script>
    setPostsSongInfo()
</script>
</html>