<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotifeed</title>
    <link rel="stylesheet" href="./style.css" />
</head>
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
<?php
session_start();
include("posts.php");

// $postList is updated by Middle End
$postList = [ 
    "001" => ["creator" => "Karim", "title" => "Best Song <3", "description" => "I love this song!", "link" => "https://maxedward.com"],
    "002" => ["creator" => "Jose", "title" => "My Jams", "description" => "Best album in the universeeee", "link" => "https://maxedward.com"],
    "003" => ["creator" => "User42069", "title" => "NEW SHIT !!!", "description" => "Listen to this shit!!!", "link" => "https://maxedward.com"],
    "004" => ["creator" => "User12345", "title" => "😍😍😍", "description" => "OMG NO WAYY", "link" => "https://maxedward.com"],
    "005" => ["creator" => "Max", "title" => "Jeeeeeez", "description" => "Im crying rn", "link" => "https://maxedward.com"]];
$postList = [];

$idList = allPostId();

foreach($idList as $id){
    $postList[] = getPost($id);
}
$postList = array_reverse($postList);

?>
<body>
    <div class="col-12" style="font-size: 22.5px; padding-left: 10ch">
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 titleBold" style="">
                Spotifeed
            </div>
        </div>

    <?php
    foreach ($postList as $postID => $info) {
    ?>

        <div class="col-12" style="margin: 2ch 0 1ch 0">
            <div class="col-10 push-1 titleBold" style="">
                <div class="col-12 bodyBold postContainer" style="margin: 0 0.25ch">
                    <div class="col-12">
                        <table style="margin: 0.25ch 0;">
                            <tbody>
                                <tr>
                                    <td style="max-width: fit-content;">
                                        <span class="">
                                            <img src="assets/profPic.jpeg" class="logoImg" style="border-width: 0.05px; border-radius: 0.35ch; height: 15ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                        </span>
                                    </td>
                                    <td style="padding-left: 1.69ch; vertical-align: top;">
                                        <table class="bodyLight">
                                            <tbody>
                                                <tr>
                                                    <td style="max-width: fit-content;">
                                                        <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                            <span class="">
                                                                <img src="assets/profPic.jpeg" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" />
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td style="padding-left: 0.5ch">
                                                        <div class="col-12">
                                                            <a href="/~kg448/account.php?viewing=<?php echo $info['creator']; ?>&redirectFrom=feed" title="View <?php echo $info['creator']; ?>'s Profile" style="text-decoration: none;" class="bodyLight">
                                                                <?php echo $info['creator'];

                                                                if ($info['creator'] == "Max") {
                                                                print('
                                                                    <span class="subtitleLight" style="font-size: 20px; color: rgb(144, 85, 54); padding-left: 5px;">
                                                                        [Admin]
                                                                    </span>');
                                                                } 
                                                                ?>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="col-12" style="margin-top: 2ch;">
                                            <?php echo $info['title']; ?>
                                        </div>
                                        <div class="col-12 subtitleLight" style="font-size: 18px; margin-top: 0.5ch; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                            <?php echo $info['description']; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?php echo $info['link']; ?>">
                            <div class="col-12 subtitleLight" style="font-size: 20px; margin-top: 0.2ch; text-decoration: none;" title="Open song link">
                                Go to song ↗
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <?php 
    }
    ?>

    </div>
</body>
</html>