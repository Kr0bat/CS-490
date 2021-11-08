
<style>

.sidebar-style {
    --sidebarHeight: 100vh;
    background-color: #000; 
    position: fixed; 
    left: 0; 
    margin-top: 20px; 
    border-radius: 0 2.5ch 0 0; 
    height: var(--sidebarHeight); 
    z-index: 50; 
    font-size: 22.5px;
    width: 6ch;
}

.sidebar-style-mobile {
    background-color: #000; 
    position: fixed; 
    bottom: 0; 
    top: auto; 
    border-radius: 0 1.75ch 0 0; 
    z-index: 50; 
    font-size: 22.5px;
    width: 100vw;
    height: 4ch
}

.lightTable {
    color: #fff;
    line-height: 3ch;
    width: 100%;
}

.lightTableMobile {
    color: #fff;
    line-height: 1ch;
    width: 100%;
}

.lightTableTr {
    width: 100%;
    text-align: left;
}

.lightTableTd {
    width: 16.666666%;
    text-align: center;
}

.lightTableTrSpacerMini {
    width: 100%;
    text-align: center;
    height: min(15px, 1vh);
}

.lightTableTrSpacerSmall {
    width: 100%;
    text-align: center;
    height: min(50px, 5vh);
}

.lightTableTrSpacerLarge {
    width: 100%;
    text-align: center;
    height: min(100px, 10vh);
}

.linkLight {
    color: #fff;
    text-decoration: none;
}

.linkLightPost {
    color: #bfb46b;
    text-decoration: none;
}

/* Fade in */
.trSelected {
  overflow: hidden;
  animation: fadeColor 0.3s ease forwards;
  color: #56b35e;
}

.trSelected::after {
  content: '';
  position: absolute;
  margin-top: 2.5ch;
  left: 1ch;
  height: 0.1em;
  width: 50%;
  background-color: #56b35e;
  opacity: 0;
  transition: opacity 300ms, transform 300ms;
  opacity 1;
  animation: fadeSlideIn 0.3s ease forwards;
}

@keyframes fadeSlideIn {
    from {
        opacity: 0;
        transform: translate3d(-100%, 0, 0);
        width: 0%;
    }

    to {
        opacity: 1;
        transform: translate3d(0, 0.2em, 0);
        transform: translate3d(0, 0, 0);
        width: 50%;
    }
}

@keyframes fadeColor {
    from {
        color: fff;
    }

    to {
        color: #56b35e;
    }
}

</style>

<?php

//
// -----
// LOG OUT
// -----
//
if (isset($_GET['logout'])) {
    $_SESSION['role'] = 'logged out';
    $_SESSION['username'] = '';
    $_SESSION['password'] = '';
    header("Location: /~kg448/index.php");
}


$url = strtok($_SERVER[REQUEST_URI],'?');

$precursor = '/~kg448';
$currPage = "feed";

if ($url == $precursor.'/account' || $url == $precursor.'/account.php') {
    if (isset($_GET['viewing']) && strtolower($_GET['viewing']) != strtolower($_SESSION['username'])) {
        $currPage = "none";
    } else {
        $currPage = 'account';
    }
} else if ($url == $precursor.'/feed' || $url == $precursor.'/feed.php') {
    $currPage = 'feed';
} else if ($url == $precursor.'/chat' || $url == $precursor.'/chat.php') {
    $currPage = 'chat';
} else if ($url == $precursor.'/search' || $url == $precursor.'/search.php') {
    $currPage = 'search';
} else if ($url == $precursor.'/settings' || $url == $precursor.'/settings.php') {
    $currPage = 'settings';
} else if ($url == $precursor.'/newPost' || $url == $precursor.'/newPost.php') {
    $currPage = 'newPost';
} else if ($url == $precursor.'/newUser' || $url == $precursor.'/newUser.php') {
    $currPage = 'newUser';
}

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$isMobile = false;

if( $detect->isMobile() && !$detect->isTablet() ){
    $isMobile = true;
}

if ($isMobile) {

?>

<div class="sidebar-style-mobile" style="font-family: 'Montserrat', sans-serif;">
    <div class="col-12" style="padding: 0; margin-top: -0.5ch;">
        <table class="lightTableMobile" style="border-spacing: 25px">
            <tbody>
                <tr style="width: 100%">
                    <td class="lightTableTd">
                        <div style="width: 2ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/feed.php" class="linkLight underlineOnHover">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'feed') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M21.66,10.25l-9-8a1,1,0,0,0-1.32,0l-9,8a1,1,0,0,0-.27,1.11A1,1,0,0,0,3,12H4v9a1,1,0,0,0,1,1H19a1,1,0,0,0,1-1V12h1a1,1,0,0,0,.93-.64A1,1,0,0,0,21.66,10.25ZM13,20H11V17a1,1,0,0,1,2,0Zm5,0H15V17a3,3,0,0,0-6,0v3H6V12H18ZM5.63,10,12,4.34,18.37,10Z"/></svg>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td class="lightTableTd">
                        <div style="width: 2ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/chat.php" class="linkLight underlineOnHover">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'chat') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M19,8H18V5a3,3,0,0,0-3-3H5A3,3,0,0,0,2,5V17a1,1,0,0,0,.62.92A.84.84,0,0,0,3,18a1,1,0,0,0,.71-.29l2.81-2.82H8v1.44a3,3,0,0,0,3,3h6.92l2.37,2.38A1,1,0,0,0,21,22a.84.84,0,0,0,.38-.08A1,1,0,0,0,22,21V11A3,3,0,0,0,19,8ZM8,11v1.89H6.11a1,1,0,0,0-.71.29L4,14.59V5A1,1,0,0,1,5,4H15a1,1,0,0,1,1,1V8H11A3,3,0,0,0,8,11Zm12,7.59-1-1a1,1,0,0,0-.71-.3H11a1,1,0,0,1-1-1V11a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Z"/></svg>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td class="lightTableTd">
                        <div style="width: 2ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/newPost.php" class="linkLight underlineOnHover" style="border: 0ch solid white; border-radius: 0ch; padding: 4px; margin-left: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'newPost') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Zm4-9H13V8a1,1,0,0,0-2,0v3H8a1,1,0,0,0,0,2h3v3a1,1,0,0,0,2,0V13h3a1,1,0,0,0,0-2Z"/></svg>
                            </a>
                        </div>
                    </td>
                    <td class="lightTableTd">
                        <div style="width: 2ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/newUser.php" class="linkLight underlineOnHover" style="border: 0ch solid white; border-radius: 0ch; padding: 4px; margin-left: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'newUser') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M9,11a1,1,0,1,0-1-1A1,1,0,0,0,9,11Zm3-9A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Zm3-7H9a1,1,0,0,0-1,1,4,4,0,0,0,8,0A1,1,0,0,0,15,13Zm-3,3a2,2,0,0,1-1.73-1h3.46A2,2,0,0,1,12,16Zm3-7a1,1,0,1,0,1,1A1,1,0,0,0,15,9Z"/></svg>
                            </a>
                        </div>
                    </td>
                    <td class="lightTableTd">
                        <div style="width: 2ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/search.php" class="linkLight underlineOnHover">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'search') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M21.07,16.83,19,14.71a3.08,3.08,0,0,0-3.4-.57l-.9-.9a7,7,0,1,0-1.41,1.41l.89.89A3,3,0,0,0,14.71,19l2.12,2.12a3,3,0,0,0,4.24,0A3,3,0,0,0,21.07,16.83Zm-8.48-4.24a5,5,0,1,1,0-7.08A5,5,0,0,1,12.59,12.59Zm7.07,7.07a1,1,0,0,1-1.42,0l-2.12-2.12a1,1,0,0,1,0-1.42,1,1,0,0,1,1.42,0l2.12,2.12A1,1,0,0,1,19.66,19.66Z"/></svg>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td class="lightTableTd">
                        <a href="/~kg448/account.php" class="linkLight">
                            <div style="margin-left: 0">
                                <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="imgFitMid logoImg" style="margin-top: 0ch; border-radius: 100%; height: 2ch; width: 2ch; border-style: solid; border-color: <?php if ($currPage == 'account') { print("#56b35e; border-width: 0.35ch;"); } else { print("rgba(255, 255, 255, 0.15)"); } ?>; margin-left: 0;" />
                            </div>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php

} else {

?>

<div class="sidebar-style" style="font-family: 'Montserrat', sans-serif;">
    <div class="col-12" style="padding: 1.25ch 0;">
        <table class="lightTable">
            <tbody>
                <tr class="lightTableTr">
                    <td style="text-align: center">
                        <div style="width: 3ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/account.php" class="linkLight underlineOnHover" style="">
                                <img src="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_picture"]; } else { echo "https://web.njit.edu/~kg448/assets/default-profile.png"; } ?>" class="imgFitMid logoImg" style="border-radius: 100%; height: 3ch; width: 3ch; border-style: solid; border-color: <?php if ($currPage == 'account') { print("#56b35e; border-width: 0.2ch;"); } else { print("rgba(255, 255, 255, 0.15)"); } ?>;" />
                            </a>
                        </div>
                        <div style="margin-top: 0px; font-size: 18px; padding-left: 4px; width: 7.5ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <a href="/~kg448/account.php" class="linkLight underlineOnHover" style="">
                                <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["fname"]; } else { echo "Max"; } ?>
                            </a>
                        </div>
                        <div style="margin-top: -1.5ch; font-size: 18px;">
                            <a href="/~kg448/account.php" class="linkLight underlineOnHover" style="<?php if ($currPage == 'account') { print("color: #56b35e;"); } else { print("color: rgb(144, 85, 54)"); } ?>">
                                Admin
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerSmall"></tr>
                <tr class="lightTableTr">
                    <td style="text-align: center">
                        <div style="width: 3ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/feed.php" class="linkLight underlineOnHover" style="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'feed') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M21.66,10.25l-9-8a1,1,0,0,0-1.32,0l-9,8a1,1,0,0,0-.27,1.11A1,1,0,0,0,3,12H4v9a1,1,0,0,0,1,1H19a1,1,0,0,0,1-1V12h1a1,1,0,0,0,.93-.64A1,1,0,0,0,21.66,10.25ZM13,20H11V17a1,1,0,0,1,2,0Zm5,0H15V17a3,3,0,0,0-6,0v3H6V12H18ZM5.63,10,12,4.34,18.37,10Z"/></svg>
                            </a>
                        </div>
                        <div style="margin-top: -20px; font-size: 18px;">
                            <a href="/~kg448/feed.php" class="linkLight underlineOnHover" style="<?php if ($currPage == 'feed') { print("color: #56b35e;"); } ?>">
                                Feed
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerMini"></tr>
                <tr class="lightTableTr">
                    <td style="text-align: center">
                        <div style="width: 3ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/chat.php" class="linkLight underlineOnHover" style="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'chat') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M19,8H18V5a3,3,0,0,0-3-3H5A3,3,0,0,0,2,5V17a1,1,0,0,0,.62.92A.84.84,0,0,0,3,18a1,1,0,0,0,.71-.29l2.81-2.82H8v1.44a3,3,0,0,0,3,3h6.92l2.37,2.38A1,1,0,0,0,21,22a.84.84,0,0,0,.38-.08A1,1,0,0,0,22,21V11A3,3,0,0,0,19,8ZM8,11v1.89H6.11a1,1,0,0,0-.71.29L4,14.59V5A1,1,0,0,1,5,4H15a1,1,0,0,1,1,1V8H11A3,3,0,0,0,8,11Zm12,7.59-1-1a1,1,0,0,0-.71-.3H11a1,1,0,0,1-1-1V11a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Z"/></svg>
                            </a>
                        </div>
                        <div style="margin-top: -20px; font-size: 18px;">
                            <a href="/~kg448/chat.php" class="linkLight underlineOnHover" style="<?php if ($currPage == 'chat') { print("color: #56b35e;"); } ?>">
                                Chat
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerMini"></tr>
                <tr class="lightTableTr">
                    <td style="text-align: center">
                        <div style="width: 3ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/search.php" class="linkLight underlineOnHover" style="">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'search') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M21.07,16.83,19,14.71a3.08,3.08,0,0,0-3.4-.57l-.9-.9a7,7,0,1,0-1.41,1.41l.89.89A3,3,0,0,0,14.71,19l2.12,2.12a3,3,0,0,0,4.24,0A3,3,0,0,0,21.07,16.83Zm-8.48-4.24a5,5,0,1,1,0-7.08A5,5,0,0,1,12.59,12.59Zm7.07,7.07a1,1,0,0,1-1.42,0l-2.12-2.12a1,1,0,0,1,0-1.42,1,1,0,0,1,1.42,0l2.12,2.12A1,1,0,0,1,19.66,19.66Z"/></svg>
                            </a>
                        </div>
                        <div style="margin-top: -20px; font-size: 18px;">
                            <a href="/~kg448/search.php" class="linkLight underlineOnHover" style="<?php if ($currPage == 'search') { print("color: #56b35e;"); } ?>">
                                Search
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerMini"></tr>
                <tr class="lightTableTr">
                    <td style="text-align: center">
                        <div style="width: 3ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/newPost.php" class="linkLight underlineOnHover" style="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'newPost') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Zm4-9H13V8a1,1,0,0,0-2,0v3H8a1,1,0,0,0,0,2h3v3a1,1,0,0,0,2,0V13h3a1,1,0,0,0,0-2Z"/></svg>
                            </a>
                        </div>
                        <div style="margin-top: -20px; font-size: 15px;">
                            <a href="/~kg448/newPost.php" class="linkLight underlineOnHover" style="<?php if ($currPage == 'newPost') { print("color: #56b35e;"); } ?>">
                                New Post
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerMini"></tr>
                <tr class="lightTableTr">
                    <td style="text-align: center">
                        <div style="width: 3ch; margin-left: 50%; transform: translate(-50%, 0);">
                            <a href="/~kg448/newUser.php" class="linkLight underlineOnHover" style="">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path fill="<?php if ($currPage == 'newUser') { print("#56b35e"); } else { print('#FFFFFF'); } ?>" d="M9,11a1,1,0,1,0-1-1A1,1,0,0,0,9,11Zm3-9A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Zm3-7H9a1,1,0,0,0-1,1,4,4,0,0,0,8,0A1,1,0,0,0,15,13Zm-3,3a2,2,0,0,1-1.73-1h3.46A2,2,0,0,1,12,16Zm3-7a1,1,0,1,0,1,1A1,1,0,0,0,15,9Z"/></svg>
                            </a>
                        </div>
                        <div style="margin-top: -20px; font-size: 15px;">
                            <a href="/~kg448/newUser.php" class="linkLight underlineOnHover" style="<?php if ($currPage == 'newUser') { print("color: #56b35e;"); } ?>">
                                New User
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php

}

?>