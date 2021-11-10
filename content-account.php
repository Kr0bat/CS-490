
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
    padding: 0ch;
    background: #2a4223;
    border-style: solid;
    border-width: 0.15ch;
    border-color: #436339;
}
.unfollowContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #2a3a52;
    border-style: solid;
    border-color: #45596e;
}
.followContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #39445538;
    border-style: solid;
    border-color: #485059;
}
.blockContainer {
    border-radius: 1ch;
    padding: 1ch;
    background: #3d2222;
    border-style: solid;
    border-color: #654040;
    text-align: center;
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

<?php
if (isBlocked($_GET['viewing'])) {
    print('
    <div class="col-12">
        <div class="headerText" style="width: 100%; margin: 0 0 2vh 0; padding: 2vh 0; text-align: center; font-size: max(1.35vw, 2.5vh); color: #eaeaea; background-color: #9c5151ff">
            '.$_GET['viewing'].' is banned
        </div>
    </div>');
}
?>
<div class="col-12" style="font-size: 22.5px; <?php if (!$isMobile) { echo "padding-left: 6ch"; } ?>; font-family: 'Montserrat', sans-serif;">
    
    <?php
        if (isset($_GET['viewing']) && (strtolower($_GET['viewing']) != strtolower($_SESSION['username']))) {
            // SHOW SOMEONE ELSE'S PROFILE
    ?>

    <div class="col-12" style="margin-top: 5vh">
        <a href="/~kg448/<?php if (isset($_GET['redirectFrom'])) { echo $_GET['redirectFrom']; } else { echo "search"; } ?>.php">
            <div class="col-10 push-1 subtitleBold underlineOnHover" style="font-size: 22.5px">
                Back
            </div>
        </a>
    </div>
    <div class="col-12" style="margin: 10vh 0 5vh 0;">
        <div class="col-10 push-1 bodyLight" style="">
            <div class="col-2">
                <div class="col-12">
                    <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_GET['viewing'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="imgFitMid logoImg" style="border-radius: 100%; height: min(10ch, 10vw); width: min(10ch, 10vw); border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
                </div>
                <?php 
                    if ($_SESSION['role'] == 'admin' && (!isAdmin($_GET['viewing']))) { 
                        if (!isBlocked($_GET['viewing'])) {
                    ?>
                    <form method="POST">
                        <a href="">
                            <input type="text" name="ban_account_username" value="<?php echo $_GET['viewing']; ?>" style="display: none;" readonly/>
                            <button type="submit" name="ban_account_submit" class="col-12 blockContainer" style="font-size: 20px; width: min(10ch, 10vw); margin-top: 1.5ch; color: white; text-deocration: none;">
                                Ban User
                            </button>
                        </a>
                    </form>

                    <?php   
                        } else {
                    ?>

                    <form method="POST">
                        <a href="">
                            <input type="text" name="ban_account_username" value="<?php echo $_GET['viewing']; ?>" style="display: none;" readonly/>
                            <button type="submit" name="ban_account_submit" class="col-12 blockContainer" style="font-size: 20px; width: min(10ch, 10vw); margin-top: 1.5ch; color: white; text-deocration: none;">
                                Unban User
                            </button>
                        </a>
                    </form>

                    <?php
                        }
                    } 
                    ?>
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
    <div class="col-12" style="margin-top: 0vh">
        <div class="col-10 push-1">
            <div class="col-11 bodyBold">
                <table style="width: 100%;">
                    <tbody>
                        <tr style="height: 1.5ch;"></tr>
                        <tr style="width: 100%; text-align: center; ">
                            <td class="chatContainer" style="width: 49%;">
                                <a href="/~kg448/chat.php?chatWith=<?php echo $_GET['viewing']; ?>">
                                    <table class="bodyBold" style="width: 100%">
                                        <tbody>
                                            <tr style="width: 100%">
                                                <td style="text-align: right; width: 46%;">
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
                            <td style="width: 1ch"></td>

                            <?php 

                            $isFollowing = false;

                            // Determine if you're following the viewed user

                            if ($isFollowing) {
                            ?>
                                
                            <td class="" style="width: 49%;">
                                <form method="POST">
                                    <input type="text" name="follow_username" value="<?php echo $_GET['viewing'] ?>" style="display: none;" readonly/>
                                    <button type="submit" name="follow_submit" class="unfollowContainer bodyBold underlineOnHover" style="width: 100%;">
                                        <table class="bodyLight" style="width: 100%">
                                            <tbody>
                                                <tr style="width: 100%">
                                                    <td style="text-align: right; width: 44%;">
                                                        <div style="margin-top: 0.3ch;">
                                                            <img src="assets/comment.png" class="" style="border-width: 0; height: 2.5ch; margin-top: 0; cursor: pointer; padding-right: 0.5ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjRkZGRkZGIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjQgNjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48cGF0aCBkPSJNNTEuMzMsMzQuOGMzLjUsMi4xNyw1LjY3LDYuMDgsNS42NywxMC4xOWMwLDQuNDUtMi41NSw4LjY0LTYuNTEsMTAuNjhjLTEuNjYsMC44NS0zLjU1LDEuMzExLTUuNDYsMS4zMTEgIGMtMS40OSwwLTIuOTYtMC4yOC00LjMzLTAuODAxYy0xLjAxLTAuMzgtMS45Ni0wLjg5LTIuODItMS41MjljLTMuMzMtMi40Ni01LjE4LTYuNTUxLTQuODQtMTAuNjgxYzAuMzUtNC4wNjksMi44Mi03Ljc3LDYuNDctOS42NDkgIGMxLjY3LTAuODYsMy41NjEtMS4zMTEsNS40OC0xLjMxMWMwLjM5LDAsMC43OSwwLjAyMSwxLjE3LDAuMDdDNDguMDEsMzMuMjQsNDkuNzgsMzMuODMsNTEuMzMsMzQuOHogTTUwLjY2LDQwLjc1ICBjMC4zOS0wLjM5LDAuMzktMS4wMiwwLTEuNDFjLTAuMzkxLTAuMzktMS4wMy0wLjM5LTEuNDIsMEw0NSw0My41OGwtNC4yNC00LjI0Yy0wLjM5LTAuMzktMS4wMjktMC4zOS0xLjQyLDAgIGMtMC4zOSwwLjM5MS0wLjM5LDEuMDIxLDAsMS40MUw0My41OSw0NWwtNC4yNSw0LjI0Yy0wLjM5LDAuMzktMC4zOSwxLjAyLDAsMS40MWMwLjIsMC4xOTksMC40NSwwLjI5LDAuNzEsMC4yOSAgczAuNTEtMC4wOTEsMC43MS0wLjI5TDQ1LDQ2LjQxbDQuMjQsNC4yNGMwLjIsMC4xOTksMC40NSwwLjI5LDAuNzEsMC4yOXMwLjUxLTAuMDkxLDAuNzEtMC4yOWMwLjM5LTAuMzkxLDAuMzktMS4wMjEsMC0xLjQxICBMNDYuNDIsNDVMNTAuNjYsNDAuNzV6Ij48L3BhdGg+PHBhdGggZD0iTTQxLjUsMTguNDljMCwzLjEwOS0xLjI2LDYuMDItMy41Niw4LjJjLTAuNDYsMC40MzktMC45NiwwLjg0LTEuNDgsMS4xODljLTEuOTYsMS4zNC00LjI5LDIuMDktNi42MywyLjA5ICBjLTEuNzcsMC0zLjQ4LTAuNDItNS4wNy0xLjIzOWMtMC40NS0wLjIzLTAuODctMC40OS0xLjI4LTAuNzYxYy0wLjAxLTAuMDItMC4wMS0wLjAyLTAuMDItMC4wMmMtMi45LTIuMDMtNC43OS01LjQtNC45NS04Ljk0ICBjLTAuMTgtNC4xNDksMS44OS04LjA5LDUuNDEtMTAuMjc5QzI1LjczLDcuNiwyNy44Myw3LjAxLDMwLjAxLDcuMDFjMiwwLDMuOTUsMC41MSw1LjY2LDEuNDcxQzM5LjI2LDEwLjUzLDQxLjUsMTQuMzYsNDEuNSwxOC40OXoiPjwvcGF0aD48cGF0aCBkPSJNMzcuMTksMjkuNzljMS42ODksMC4zNywzLjM1OSwwLjg4LDQuOTcsMS41MWMtMS4yNSwwLjI1LTIuNDUsMC42Ny0zLjU3LDEuMjRjLTQuMjUsMi4yLTcuMTQsNi41MS03LjU0LDExLjI2ICBjLTAuNDEsNC44MiwxLjc1LDkuNTksNS42NDEsMTIuNDZjMC4xNDksMC4xMSwwLjMsMC4yMjEsMC40NDksMC4zMmMtOS40OSwxLjEtMTkuMTYtMC4wMjEtMjguMTY5LTMuMjlDNy43OSw1Mi44Niw3LDUxLjczLDcsNTAuNDcgIHYtNi45NmMwLTMuNzcsMS44OS03LjIyOSw1LjA3LTkuMjdjMy4yNi0yLjA5LDYuODItMy41OCwxMC42LTQuNDJjMC4zOCwwLjI1LDAuNzcsMC40NzksMS4xOCwwLjY4OWMxLjg4LDAuOTcxLDMuODksMS40Niw1Ljk4LDEuNDYgIEMzMi40MSwzMS45NywzNC45OSwzMS4xOSwzNy4xOSwyOS43OXoiPjwvcGF0aD48L3N2Zz4=');" />
                                                        </div>
                                                    </td>
                                                    <td class="underlineOnHover" style="text-align: left; width: 50%; padding-left: 0ch; font-family: 'Montserrat', sans-serif;">
                                                        Unfollow
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </button>
                                </form>
                            </td>

                            <?php
                            } else {
                            ?>

                            <td class="">
                                <form method="POST">
                                    <input type="text" name="follow_username" value="<?php echo $_GET['viewing'] ?>" style="display: none;" readonly/>
                                    <button type="submit" name="follow_submit" class="followContainer bodyBold underlineOnHover" style="width: 100%;">
                                        <table class="bodyLight" style="width: 100%">
                                            <tbody>
                                                <tr style="width: 100%">
                                                    <td style="text-align: right; width: 44%;">
                                                        <div style="margin-top: 0.3ch;">
                                                            <img src="assets/comment.png" class="" style="border-width: 0; height: 2.5ch; margin-top: 0; cursor: pointer; padding-right: 0.5ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjRkZGRkZGIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNjQgNjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48cGF0aCBkPSJNNDEuNSwxOC40OWMwLDMuMTA5LTEuMjYsNi4wMi0zLjU2LDguMmMtMC40NiwwLjQzOS0wLjk2LDAuODQtMS40OCwxLjE4OWMtMS45NiwxLjM0LTQuMjksMi4wOS02LjYzLDIuMDkgIGMtMS43NywwLTMuNDgtMC40Mi01LjA3LTEuMjM5Yy0wLjQ1LTAuMjMtMC44Ny0wLjQ5LTEuMjgtMC43NjFjLTAuMDEtMC4wMi0wLjAxLTAuMDItMC4wMi0wLjAyYy0yLjktMi4wMy00Ljc5LTUuNC00Ljk1LTguOTQgIGMtMC4xOC00LjE0OSwxLjg5LTguMDksNS40MS0xMC4yNzlDMjUuNzMsNy42LDI3LjgzLDcuMDEsMzAuMDEsNy4wMWMyLDAsMy45NSwwLjUxLDUuNjYsMS40NzFDMzkuMjYsMTAuNTMsNDEuNSwxNC4zNiw0MS41LDE4LjQ5eiI+PC9wYXRoPjxwYXRoIGQ9Ik0zNy4xOSwyOS43OWMxLjY5LDAuMzcsMy4zNiwwLjg4LDQuOTcsMS41MWMtMS4yNSwwLjI1LTIuNDUsMC42Ny0zLjU3LDEuMjRjLTQuMjUsMi4yLTcuMTQsNi41MS03LjU0LDExLjI2ICBjLTAuNDEsNC44MiwxLjc1LDkuNTksNS42NCwxMi40NmMwLjE1LDAuMTEsMC4zLDAuMjIxLDAuNDUsMC4zMmMtOS40OSwxLjEtMTkuMTctMC4wMjEtMjguMTctMy4yOUM3Ljc5LDUyLjg2LDcsNTEuNzMsNyw1MC40NyAgdi02Ljk2YzAtMy43NywxLjg5LTcuMjI5LDUuMDctOS4yN2MzLjI2LTIuMDksNi44Mi0zLjU4LDEwLjYtNC40MmMwLjM4LDAuMjUsMC43NywwLjQ3OSwxLjE4LDAuNjg5YzEuODgsMC45NzEsMy44OSwxLjQ2LDUuOTgsMS40NiAgYzEuNzMsMCwzLjQ2LTAuMzUsNS4wOC0xQzM1LjcsMzAuNjUsMzYuNDYsMzAuMjUsMzcuMTksMjkuNzl6Ij48L3BhdGg+PHBhdGggZD0iTTUxLjMzLDM0LjhjMy41LDIuMTcsNS42Nyw2LjA4LDUuNjcsMTAuMTljMCw0LjQ1LTIuNTUsOC42NC02LjUxLDEwLjY4Yy0xLjY2LDAuODUtMy41NSwxLjMxMS01LjQ2LDEuMzExICBjLTAuMzksMC0wLjc4LTAuMDIxLTQuMzMtMC44MDFsLTIuODItMS41MjljLTMuMzMtMi40Ni01LjE5LTYuNTUxLTQuODQtMTAuNjgxYzAuMzUtNC4wNjksMi44Mi03Ljc3LDYuNDctOS42NDkgIGMxLjY3LTAuODYsMy41Ni0xLjMxMSw1LjQ4LTEuMzExYzAuMzksMCwwLjc5LDAuMDIxLDEuMTcsMC4wN0M0OC4wMSwzMy4yNCw0OS43OCwzMy44Myw1MS4zMywzNC44eiBNNTMsNDQuOTljMC0wLjU1LTAuNDUtMS0xLTFoLTYgIHYtNmMwLTAuNTUtMC40NS0xLTEtMXMtMSwwLjQ1LTEsMXY2aC02Yy0wLjU1LDAtMSwwLjQ1LTEsMWMwLDAuNTYsMC40NSwxLDEsMWg2djZjMCwwLjU2LDAuNDUsMSwxLDFzMS0wLjQ0LDEtMXYtNmg2ICBDNTIuNTUsNDUuOTksNTMsNDUuNTUsNTMsNDQuOTl6Ij48L3BhdGg+PC9zdmc+');" />
                                                        </div>
                                                    </td>
                                                    <td class="underlineOnHover" style="text-align: left; width: 50%; padding-left: 0ch; font-family: 'Montserrat', sans-serif;">
                                                        Follow
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </button>
                                </form>
                            </td>

                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="col-12" style="margin-top: 7vh">
        <div class="col-10 push-1 titleBold" style="font-size: 22.5px">
            Statistics
        </div>
    </div>

    <?php
    $postCount = count(getUserPosts($_GET['viewing']));
    $postL = getUserPosts($_GET['viewing']);

    $likeCount = 0;
    $followerCount = 0;

    foreach ($postL as $index => $content) {
        $likeCount += $content['likeCount'];
    }
    ?>

    <div class="col-12" style="margin-top: 0vh">
        <div class="col-10 push-1">
            <div class="col-12" style="margin: 2ch 0 1ch 0">
                <div class="col-11 bodyBold statContainer">
                    <table style="width: 100%;">
                        <tbody>
                            <tr style="height: 1ch;"></tr>
                            <tr style="width: 100%; text-align: center;">
                                <td class="bodyBold" style="width: 32%; font-size: 30px;">
                                    <?php echo $postCount; ?>
                                </td>
                                <td style="width: 1ch"></td>
                                <td class="bodyBold" style="width: 32%; font-size: 30px;">
                                    <?php echo $likeCount; ?>
                                </td>
                                <td style="width: 1ch"></td>
                                <td class="bodyBold" style="width: 32%; font-size: 30px;">
                                    <?php echo $followerCount; ?>
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
                                <td style="width: 1ch"></td>
                                <td class="bodyLight">
                                    Followers
                                </td>
                            </tr>
                            <tr style="height: 1ch;"></tr>
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
        <div class="col-10 push-1 bodyBold" style="font-size: 20px; margin-bottom: 5ch;">
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

        $postList = getUserPosts($_GET['viewing'], $_SESSION['username']);
        
        foreach ($postList as $postID => $info) {
        ?>

            <div class="col-12" style="margin: 2ch 0 1ch 0">
                <div class="col-11 titleBold" id="post_container_<?php echo $info[id]?>" style="">
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
                                                    <img src="assets/comment.png" id="comment_post_<?php echo $info['id'] ?>" onclick="openComment('comment_input_<?php echo $info['id'] ?>')" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                    <img src=<?php if ($info['liked']) {echo "assets/heart-on.png";} else{echo "assets/heart-off.png";}?> id="like_post_<?php echo $info['id'] ?>" onclick="toggleLike('<?php echo $info['id'] ?>', '<?php echo $_SESSION['username']?>')" class="" style="border-width: 0; height: 3ch; margin-left: 0.75ch; cursor: pointer;" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Hidden Comment Section Until Button Clicked -->
                    <div class="col-12" id="comment_input_<?php echo $info['id'] ?>" style="display: none;" >
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
                        <div class="col-10 bodyLight commentContainer" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if (count($info["comments"]) == 0) { echo "border-radius: 0 0 1ch 1ch"; } else { echo "border-radius: 0;"; } ?>font-style: normal; font-size: 18px;"> 
                            <form method="POST">
                                <table class="bodyLight" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td style="padding-left: 0">
                                                <input maxlength="50" type="text" name="comment_msg_<?php echo $info['id'] ?>" placeholder="Type your comment here" value="" style="width: 100%; background-color: #000; border-color: #28622d; border-style: solid; color: #fff; padding: 0.25ch 1ch; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7vh; vertical-align: top; margin-top: 0.5vh;" required />
                                            </td>
                                            <td style="padding-left: 1ch">
                                                <button type="button" name="comment_submit_<?php echo $info['id'] ?>" onclick='sendComment("comment_msg_<?php echo $info[id] ?>", "<?php echo $info[id] ?>" , "<?php echo $_SESSION[username] ?>", "<?php echo getProfile($_SESSION[username])[profile_picture]?>", "<?php echo $_SESSION[role]?>" )' style="width: 80%; background-color: #28622d; border-color: #1e4e22; border-style: solid; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 1ch 0; margin-top: 0.55vh;">Comment</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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
        <div class="col-10 push-1 bodyLight" style="margin-bottom: 5ch;">
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
                        <input maxlength="100" type="search" name="edit_account_pfp_link" placeholder="URL to picture" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
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
        <div class="col-11 subtitleBold underlineOnHover" style="">
            <a href="/~kg448/index.php?logout=true" class="subtitleBold underlineOnHover" style="font-size: 18px; text-decoration: none;">
                Log Out
            </a>
        </div>
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
                        <span class="">
                            <img src="" class="" title="Edit Profile" style="height: 2.5ch; width: 2.5ch; margin-top: 0.25ch; content: url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjZjRhNjU1IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDQ4OCA1MjIiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojZjRhNjU1O2ZpbGwtcnVsZTpub256ZXJvfQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cG9seWdvbiBjbGFzcz0iZmlsMCIgcG9pbnRzPSIwLDUwNSAyNjUsNTA1IDI2NSw1MjIgMCw1MjIgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yMTAgNDAybC0xMzEgMTdjLTUsMCAtOSwtMyAtMTAsLTcgMCwtMSAwLC0yIDAsLTNsMCAwIDAgMCAxNyAtMTMxIC0yOSAzMCAtNTcgMTgwIDE4MSAtNTcgMjkgLTI5eiI+PC9wYXRoPjxwb2x5Z29uIGNsYXNzPSJmaWwwIiBwb2ludHM9IjMyMSw0MyA0NDUsMTY3IDQ4OCwxMjQgMzY0LDAgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yNDkgMTk1YzQsLTQgMTAsLTQgMTQsMCA0LDQgNCwxMSAwLDE0bC0xNzIgMTcyYzAsMCAtMSwxIC0xLDFsLTIgMTkgMTQxIC0xOCAyMDQgLTIwNCAtMTI0IC0xMjQgLTIwMyAyMDQgLTEyIDkxIDE1NSAtMTU1eiI+PC9wYXRoPjwvZz48L3N2Zz4=');">
                        </span>
                        <span class="subtitleBold" style="font-size: 18px; color: #f4a655;">
                            Edit Profile
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 0.5vh">
        <div class="col-10 push-1 titleBold" style="font-size: 22.5px">
            Statistics
        </div>
    </div>

    <?php
    $postCount = count(getUserPosts($_SESSION['username']));
    $postL = getUserPosts($_SESSION['username']);
    
    $likeCount = 0;
    $followerCount = 0;

    foreach ($postL as $index => $content) {
        $likeCount += $content['likeCount'];
    }
    ?>

    <div class="col-12" style="margin-top: 0vh">
        <div class="col-10 push-1">
            <div class="col-12" style="margin: 2ch 0 1ch 0">
                <div class="col-11 bodyBold statContainer">
                    <table style="width: 100%;">
                        <tbody>
                            <tr style="height: 1ch;"></tr>
                            <tr style="width: 100%; text-align: center;">
                                <td class="bodyBold" style="width: 32%; font-size: 30px;">
                                    <?php echo $postCount; ?>
                                </td>
                                <td style="width: 1ch"></td>
                                <td class="bodyBold" style="width: 32%; font-size: 30px;">
                                    <?php echo $likeCount; ?>
                                </td>
                                <td style="width: 1ch"></td>
                                <td class="bodyBold" style="width: 32%; font-size: 30px;">
                                    <?php echo $followerCount; ?>
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
                                <td style="width: 1ch"></td>
                                <td class="bodyLight">
                                    Followers
                                </td>
                            </tr>
                            <tr style="height: 1ch;"></tr>
                        </tbody>
                    </table>
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
        <div class="col-10 push-1 bodyBold" style="font-size: 20px; margin-bottom: 5ch;">
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
                <div class="col-11 titleBold" id="post_container_<?php echo $info[id]?>" style="">
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
                                                    <img src="assets/comment.png" id="comment_post_<?php echo $info['id'] ?>" onclick="openComment('comment_input_<?php echo $info['id'] ?>')" class="" style="border-width: 0; height: 3ch; margin-top: 0; cursor: pointer;" />
                                                    <img src=<?php if ($info['liked']) {echo "assets/heart-on.png";} else{echo "assets/heart-off.png";}?> id="like_post_<?php echo $info['id'] ?>" onclick="toggleLike('<?php echo $info['id'] ?>', '<?php echo $_SESSION['username']?>')" class="" style="border-width: 0; height: 3ch; margin-left: 0.75ch; cursor: pointer;" />
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
                        <div class="col-10 bodyLight commentContainer" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; <?php if (count($info["comments"]) == 0) { echo "border-radius: 0 0 1ch 1ch"; } else { echo "border-radius: 0;"; } ?>font-style: normal; font-size: 18px;"> 
                            <form method="POST">
                                <table class="bodyLight" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td style="padding-left: 0">
                                                <input maxlength="50" type="text" name="comment_msg_<?php echo $info['id'] ?>" placeholder="Type your comment here" value="" style="width: 100%; background-color: #000; border-color: #28622d; border-style: solid; color: #fff; padding: 0.25ch 1ch; border-radius: 0.75ch; font-size: 20px; word-break: break-word; height: 7vh; vertical-align: top; margin-top: 0.5vh;" required />
                                            </td>
                                            <td style="padding-left: 1ch">
                                                <button type="button" name="comment_submit_<?php echo $info['id'] ?>" onclick='sendComment("comment_msg_<?php echo $info[id] ?>", "<?php echo $info[id] ?>" , "<?php echo $_SESSION[username] ?>", "<?php echo getProfile($_SESSION[username])[profile_picture]?>", "<?php echo $_SESSION[role]?>" )' style="width: 80%; background-color: #28622d; border-color: #1e4e22; border-style: solid; color: #fff; border-radius: 0.75ch; font-size: 20px; margin-left: 50%; transform: translate(-50%, 0); padding: 1ch 0; margin-top: 0.55vh;">Comment</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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