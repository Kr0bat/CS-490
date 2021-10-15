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
            <div class="col-10 push-1 subtitleLight" style="font-size: 22.5px">
                Results
            </div>
        </div>
        <div class="col-12" style="margin-top: 0vh">

            <?php

            $userList = [
                "Karim" => ["fname" => "Karim", "lname" => "Karim", "profile_description" => "Karim Karim Karim Karim Karim"],
                "Jose" => ["fname" => "Jose", "lname" => "Jose", "profile_description" => "Jose Jose Jose Jose Jose"],
                "user12345" => ["fname" => "First", "lname" => "Last", "profile_description" => "Here's my description baby!"],
                "user420" => ["fname" => "Blaze", "lname" => "It", "profile_description" => "baby"],
                "user69" => ["fname" => "Sexy", "lname" => "Sexy", "profile_description" => "uwu"],];
            foreach ($userList as $username => $info) { ?>

            <div class="col-12" style="margin-top: 1vh">
                <a href="/~kg448/account.php?viewing=<?php echo $username; ?>">
                    <div class="col-10 push-1 bodyBold dmContainer" style="margin: 0.5ch 0">
                        <div class="col-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="max-width: fit-content;">
                                            <span class="">
                                                <img src="assets/profPic.jpeg" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 3ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                            </span>
                                        </td>
                                        <td style="padding-left: 1.69ch">
                                            <?php echo $info['fname'].' '.$info['lname']; ?> <span class="subtitleLight" style="font-size: 20px">(<?php echo $username; ?>)</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 1.5ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?php echo $info['profile_description']; ?></div>
                    </div>
                </a>
            </div>

            <?php
            }

            ?>

        </div>
    </div>
</body>
</html>