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

    updateCommentSection(post, pfp, role, user);
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

function updateCommentSection(post, pfp, role, user){
    postElementId = "post_container_" + post;
    alert(postElementId);
    var postElement = document.getElementById(postElementId);
    
    //postElement.innerHTML = postElement.innerHTML + "<p> HERE ARE SOME WORDS</p>";
}