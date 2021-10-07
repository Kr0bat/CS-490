
<?php


?>
<div class="col-12" style="font-size: 22.5px; padding-left: 11ch">
    <div class="col-12" style="margin-top: 5vh">
        <div class="col-10 push-1 titleBold" style="">
            Account
        </div>
    </div>
    <div class="col-12" style="margin-top: 1vh">
        <div class="col-10 push-1 subtitleLight" style="">
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
</div>