
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
}

td.emptyGrid1 {
    border-color: #ffffff45;
    background: #ffffff15;
    transition: opacity 700ms, transform 700ms;
    animation: pulse 1.4s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid12 {
    border-color: #ffffff30;
    background: #ffffff09;
    transition: opacity 500ms, transform 500ms;
    animation: pulse 1.3s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid13 {
    border-color: #ffffff37;
    background: #ffffff12;
    transition: opacity 400ms, transform 600ms;
    animation: pulse 1.6s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid2 {
    border-color: #ffffff10;
    background: #ffffff02;
    transition: opacity 800ms, transform 700ms;
    animation: pulse 1.25s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid22 {
    border-color: #ffffff20;
    background: #ffffff07;
    transition: opacity 600ms, transform 600ms;
    animation: pulse 1.1s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid23 {
    border-color: #ffffff15;
    background: #ffffff06;
    transition: opacity 700ms, transform 700ms;
    animation: pulse 1.35s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid3 {
    border-color: #ffffff07;
    background: #ffffff02;
    transition: opacity 400ms, transform 700ms;
    animation: pulse 0.9s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid32 {
    border-color: #ffffff03;
    background: #ffffff01;
    transition: opacity 900ms, transform 700ms;
    animation: pulse 1.4s ease forwards;
    animation-iteration-count: infinite;
}
td.emptyGrid33 {
    border-color: #ffffff01;
    background: #ffffff01;
    transition: opacity 700ms, transform 700ms;
    animation: pulse 1.2s ease forwards;
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
<div class="col-12" style="font-size: 22.5px; padding-left: 11ch">
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
    <?php
        if (isset($_GET['editProfile'])) {
            // DISPLAY EDIT PROFILE FORM
    ?>

        <div class="col-10 push-1 bodyLight" style="">
            <form method="POST">
                <div class="col-2">
                    <img src="assets/profPic.jpeg" class="imgFitMid logoImg" style="border-radius: 100%; height: 10vw; border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
                </div>
                <div class="col-8 push-05">
                    <div class="col-6 titleLight">
                        <input type="text" name="edit_account_name_first" placeholder="First" value="" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-6 titleLight">
                        <input type="text" name="edit_account_name_last" placeholder="Last" value="" style="font-size: 20px; width: 100%; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-12 bodyLight" style="margin-top: 0">
                        <input type="text" name="edit_account_description" placeholder="Describe yourself and your music taste!" value="" style="font-size: 20px; width: 100%; min-height: 3ch; margin: 2px 0; background-color: #00000000; border-color: #56b35e32; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 10px; text-align: left;" required />
                    </div>
                    <div class="col-12 bodyLight" style="margin-top: 2ch">
                        <a href="/~kg448/account.php" style="text-decoration: none;">
                            <span class="subtitleBold" style="font-size: 17.5px;">
                                save profile
                            </span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    
    <?php
        } else {
            // DISPLAY REGULAR PROFILE
    ?>

        <div class="col-10 push-1 bodyLight" style="">
            <div class="col-2">
                <img src="assets/profPic.jpeg" class="imgFitMid logoImg" style="border-radius: 100%; height: 10vw; border-style: solid; border-color: rgba(255, 255, 255, 0.15);" />
            </div>
            <div class="col-8 push-05">
                <div class="col-12 titleLight">
                    First Last
                </div>
                <div class="col-12 bodyLight" style="margin-top: 2ch">
                    Your personal description. Who you are, any info you would like to get out there. Tell the world. Yell into the void. Maybe it will yell back :)
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
    
    <?php
        }
    ?>

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
                    <td class="gridSize emptyGrid23"></td>
                    <td class="gridSize emptyGrid22"></td>
                    <td class="gridSize emptyGrid2"></td>
                </tr>
                <tr class="emptyGrid3">
                    <td class="gridSize emptyGrid3"></td>
                    <td class="gridSize emptyGrid32"></td>
                    <td class="gridSize emptyGrid33"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>