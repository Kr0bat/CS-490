function sendComment(id, post, user, pfp, role){
    var comment = document.getElementsByName(id)[0].value;
    //alert(comment);

    //isset($_REQUEST['username']) && isset($_REQUEST['commentId']) && isset($_REQUEST['postId'])

    var url = "https://web.njit.edu/~kg448/setComment.php?" + 'username=' + user + '&comment=' + comment + "&postId=" +post;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);

    xhr.setRequestHeader("Content-type", "applicaion/x-www-form-urlencoded");

    xhr.send();

    //window.location.reload();

    updateCommentSection(post, pfp, role, user, comment);
}

function openComment(id){
    var div = document.getElementById(id);

    //div.style.display
    
    if (div.style.display == "none"){
        div.style.display = "block";
    }
    else{
        div.style.display = "none";
    }

}

function removeCommentCorners(id) {
    var div = document.getElementById(id);

    div.style.borderRadius = "0";
}

function updateCommentSection(post, pfp, role, user, comment){
    postElementId = "post_container_" + post;
    var postElement = document.getElementById(postElementId);

    removeCommentCorners("comment_input_box_" + post);

    commentHtml_1 = '<div class="col-12"><div class="col-1"><table class="bodyLight" style="width: 100%"><tbody><tr><td style="max-width: fit-content;"><span class="" style="width: 100%"><img src="assets/commentArrow.png" class="" style="border-width: 0px; border-radius: 0; height: 3.5ch; margin-left: 50%; transform: translate(-50%, 0);" /></span></td></tr></tbody></table></div><div class="col-10 bodyLight commentContainer" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; border-radius: 0 0 1ch 1ch; font-style: normal; font-size: 18px;"><table class="bodyLight"><tbody><tr><td style="max-width: fit-content;"><a href="/~kg448/account.php?viewing=' + user + '&redirectFrom=feed" title="View ' + user + '\'s Profile" style="text-decoration: none;" class="bodyLight"><span class=""><img src="' + pfp + '" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" /></span></a></td><td style="padding-left: 0.5ch"><div class="col-12"><a href="/~kg448/account.php?viewing=' + user + '&redirectFrom=feed" title="View ' + user + '\'s Profile" style="text-decoration: none;" class="bodyLight">' + user + ' ';

    if (role == "admin") {
        commentHtml_1.concat('<span class="subtitleLight" style="font-size: 18px; color: rgb(144, 85, 54); padding-left: 5px;">Admin</span>');
    }
    
    commentHtml_2 = '</a></div></td><td style="padding-left: 1ch"><div class="col-12" style="color: #a2a2a2;">' + comment + '</div></td></tr></tbody></table></div></div>';
    
    postElement.innerHTML = postElement.innerHTML + commentHtml_1 + commentHtml_2;
}