function sendComment(id, post, user){
    //alert(id +" " + post + " " + user);

    var comment = document.getElementsByName(id)[0].value;
    //alert(comment);

    //isset($_REQUEST['username']) && isset($_REQUEST['commentId']) && isset($_REQUEST['postId'])

    var url = "https://web.njit.edu/~kg448/setComment.php?" + 'username=' + user + '&comment=' + comment + "&postId=" +post;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);

    xhr.setRequestHeader("Content-type", "applicaion/x-www-form-urlencoded");

    xhr.send();

    //window.location.reload();
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