
<?php


?>
<style>
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
<div class="col-12" style="font-size: 22.5px; padding-left: 10ch">
    
    <?php
        include("factory.php");
        include("users.php");

        if (isset($_GET['viewing'])) {
            // SHOW SOMEONE ELSE'S PROFILE
    ?>

    <div class="col-12" style="margin-top: 5vh">
        <a href="/~kg448/<?php if (isset($_GET['redirectFrom'])) { echo $_GET['redirectFrom']; } else { echo "search"; } ?>.php">
            <div class="col-10 push-1 subtitleBold" style="font-size: 22.5px">
                Back
            </div>
        </a>
    </div>
    <div class="col-12" style="margin: 10vh 0">
        <div class="col-10 push-1 bodyLight" style="">
            <div class="col-2">
                <img src="<?php echo getProfile($_GET['viewing'])["profile_picture"]; ?>" class="imgFitMid logoImg" style="border-radius: 100%; height: min(10ch, 10vw); border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
            </div>
            <div class="col-8 push-05">
                <div class="col-12 titleLight">
                    <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_GET['viewing'])["fname"].' '.getProfile($_GET['viewing'])["lname"]; } ?> 
                    <span class="subtitleLight" style="font-size: 20px">(<?php echo $_GET['viewing']; ?>)</span>
                    <?php
                    if ($_GET['viewing'] == "Max") {
                        print('
                        <span class="subtitleLight" style="font-size: 20px; color: rgb(144, 85, 54); padding-left: 5px;">
                            [Admin]
                        </span>');
                    }
                    ?>
                </div>
                <div class="col-12 bodyLight" style="margin-top: 2ch">
                    <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_GET['viewing'])["profile_description"]; } ?>
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
        <table class="col-10 push-1 emptyGrid" cellspacing="15" cellpadding="0">
            <tbody style="width: 100%">
                <tr style="width: 100%">
                    <td class="gridSize emptyGrid1"></td>
                    <td class="gridSize emptyGrid12"></td>
                    <td class="gridSize emptyGrid13"></td>
                </tr>
                <tr class="emptyGrid2">
                    <td class="gridSize emptyGrid2"></td>
                    <td class="gridSize emptyGrid22"></td>
                    <td class="gridSize emptyGrid23"></td>
                </tr>
                <tr class="emptyGrid3">
                    <td class="gridSize emptyGrid3"></td>
                    <td class="gridSize emptyGrid32"></td>
                    <td class="gridSize emptyGrid33"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php
        } else if (isset($_GET['editProfile'])) {
            // DISPLAY EDIT PROFILE FORM
    ?>

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
            <form method="POST">
                <div class="col-2">
                    <img src="assets/profPic.jpeg" class="imgFitMid logoImg" style="border-radius: 100%; height: min(10ch, 10vw); border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
                </div>
                <div class="col-8 push-05">
                    <div class="col-5 titleLight">
                        <input maxlength="100" type="text" name="edit_account_name_first" placeholder="First" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["fname"]; } ?>" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-5 push-1 titleLight">
                        <input maxlength="100" type="text" name="edit_account_name_last" placeholder="Last" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["lname"]; } ?>" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-11 bodyLight" style="margin-top: 1ch">
                        <input maxlength="240" type="text" name="edit_account_description" placeholder="Describe yourself and your music taste!" value="<?php if ($_SERVER[HTTP_HOST] != "maxedward.com") { echo getProfile($_SESSION['username'])["profile_description"]; } ?>" style="font-size: 20px; width: 100%; min-height: 3ch; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-12 bodyLight" style="margin-top: 2ch">
                        <button type="submit" name="edit_account_submit" class="subtitleBold" style="font-size: 17.5px; background-color: #ffffff00; border-color: #ffffff00;">save profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
        } else {
            // DISPLAY REGULAR PROFILE
    ?>

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
                <img src="assets/profPic.jpeg" class="imgFitMid logoImg" style="border-radius: 100%; height: min(10ch, 10vw); border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
            </div>
            <div class="col-8 push-05">
                <div class="col-12 titleLight">
                    <?php if ($_SERVER[HTTP_HOST] != "maxedward.com") {  echo getProfile($_SESSION['username'])["fname"].' '.getProfile($_SESSION['username'])["lname"]; } ?> 
                    <span class="subtitleLight" style="font-size: 20px">(<?php echo $_SESSION['username']; ?>)</span>
                    <?php
                    if ($_SESSION['username'] == "Max") {
                        print('
                        <span class="subtitleLight" style="font-size: 20px; color: rgb(144, 85, 54); padding-left: 5px;">
                            Admin
                        </span>');
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
        <table class="col-10 push-1 emptyGrid" cellspacing="15" cellpadding="0">
            <tbody style="width: 100%">
                <tr style="width: 100%">
                    <td class="gridSize emptyGrid1"></td>
                    <td class="gridSize emptyGrid12"></td>
                    <td class="gridSize emptyGrid13"></td>
                </tr>
                <tr class="emptyGrid2">
                    <td class="gridSize emptyGrid2"></td>
                    <td class="gridSize emptyGrid22"></td>
                    <td class="gridSize emptyGrid23"></td>
                </tr>
                <tr class="emptyGrid3">
                    <td class="gridSize emptyGrid3"></td>
                    <td class="gridSize emptyGrid32"></td>
                    <td class="gridSize emptyGrid33"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <?php
        }
    ?>

</div>