function toggleLike(id, username){
    // send request to post-controller.php
    //Toggle the post's like button depending on the action taken

    var url = "https://web.njit.edu/~kg448/post-controller.php?" + 'id=' + id + '&username=' + username;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);

    xhr.setRequestHeader("Content-type", "applicaion/x-www-form-urlencoded");

    xhr.send();

    var imageId = "like_post_" + id;
    var counterId = "like_counter_" + id;

    var imageOff = "assets/heart-off.png";
    var imageOn = "assets/heart-on.png"

    var image = document.getElementById(imageId);
    var counter = document.getElementById(counterId);
    var currCount = Number.parseInt(counter.innerHTML);

    if (image.src == "https://web.njit.edu/~kg448/assets/heart-on.png"){
        image.src = imageOff;
        counter.innerHTML = currCount - 1;
    }
    else{
        image.src = imageOn;
        counter.innerHTML = currCount + 1;
    }
}

function loadLikes(id, username){
    var imageId = "like_post_" + id;

    var imageOff = "assets/heart-off.png";
    var imageOn = "assets/heart-on.png"

    var image = document.getElementById(imageId);

    image.src = imageOn;
}