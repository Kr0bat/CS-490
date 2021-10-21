
<style>

.sidebar-style {
    --sidebarHeight: 100vh;
    background-color: #000; 
    position: fixed; 
    left: 0; 
    margin-top: 20px; 
    border-radius: 0 3.75ch 0 0; 
    height: var(--sidebarHeight); 
    z-index: 50; 
    font-size: 22.5px;
    width: 10.1ch;
}

.lightTable {
    color: #fff;
    line-height: 3ch;
    width: 100%;
}

.lightTableTr {
    width: 100%;
    text-align: left;
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
    if (isset($_GET['viewing'])) {
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
}

?>

<div class="sidebar-style" style="font-family: 'Montserrat', sans-serif;">
    <div class="col-12" style="padding: 1.7ch 0;">
        <table class="lightTable">
            <tbody>
                <tr class="lightTableTr">
                    <td>
                        <a href="/~kg448/account.php" class="linkLight">
                            <div>
                                <img src="<?php echo getProfile($_SESSION['username'])["profile_picture"]; ?>" class="imgFitMid logoImg" style="border-radius: 100%; height: 5ch; border-style: solid; border-color: <?php if ($currPage == 'account') { print("#56b35e; border-width: 0.2ch;"); } else { print("rgba(255, 255, 255, 0.15)"); } ?>; margin-left: 50%; transform: translate(-50%, 0);" />
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="lightTableTr">
                    <td>
                        <div style="margin-left: 1ch;">
                            <div style="">
                                <?php echo getProfile($_SESSION['username'])["fname"].' '.getProfile($_SESSION['username'])["lname"]; ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerSmall"></tr>
                <tr class="lightTableTr">
                    <td style="text-align: center">
                        <div style="">
                            <a href="/~kg448/newPost.php" class="linkLight" style="border: 0.15ch solid white; border-radius: 0.5ch; padding: 4px; margin-left: -4px;">
                                New Post
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerSmall"></tr>
                <tr class="lightTableTr">
                    <td>
                        <div style="margin-left: 1ch;">
                            <a href="/~kg448/feed.php" class="linkLight">
                                <div class=<?php if ($currPage == 'feed') { print("trSelected"); } ?>>
                                    Feed
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTr">
                    <td>
                        <div style="margin-left: 1ch;">
                            <a href="/~kg448/chat.php" class="linkLight">
                                <div class=<?php if ($currPage == 'chat') { print("trSelected"); } ?>>
                                    Chat
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTr">
                    <td>
                        <div style="margin-left: 1ch;">
                            <a href="/~kg448/search.php" class="linkLight">
                                <div class=<?php if ($currPage == 'search') { print("trSelected"); } ?>>
                                    Search
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="lightTableTrSpacerLarge">
                </tr>
                <tr class="lightTableTr">
                    <td>
                        <div style="margin-left: 1ch;">
                            <a href="?logout=true" class="linkLight">
                                <div class=<?php if ($currPage == 'settings') { print("trSelected"); } ?>>
                                    Log Out
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>