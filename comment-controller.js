function sendComment(id, post, user, pfp, role, fname){
    var comment = document.getElementsByName(id)[0].value;
    //alert(comment);

    //isset($_REQUEST['username']) && isset($_REQUEST['commentId']) && isset($_REQUEST['postId'])

    var url = "https://web.njit.edu/~kg448/setComment.php?" + 'username=' + user + '&comment=' + comment + "&postId=" +post;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);

    xhr.setRequestHeader("Content-type", "applicaion/x-www-form-urlencoded");

    xhr.send();

    //window.location.reload();

    updateCommentSection(post, pfp, role, user, comment, fname);
    openComment("comment_input_" + post);
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

function updateCommentSection(post, pfp, role, user, comment, fname){
    postElementId = "post_container_" + post;
    var postElement = document.getElementById(postElementId);

    commentHtml_1 = '<div class="col-12"><div class="col-1"><table class="bodyLight" style="width: 100%"><tbody><tr><td style="max-width: fit-content;"><span class="" style="width: 100%"><img src="assets/commentArrow.png" class="" style="border-width: 0px; border-radius: 0; height: 3.5ch; margin-left: 50%; transform: translate(-50%, 0);" /></span></td></tr></tbody></table></div><div class="col-10 bodyLight commentContainer" id="" style="margin: 0; padding: 0.5ch 1ch 0.5ch 1ch; border-radius: 0; font-style: normal; font-size: 18px;"><table class="bodyLight"><tbody><tr><td style="max-width: fit-content;"><a href="/~kg448/account.php?viewing=' + user + '&redirectFrom=feed" title="View ' + user + '\'s Profile" style="text-decoration: none;" class="bodyLight"><span class=""><img src="' + pfp + '" class="logoImg" style="border-width: 0.05px; border-radius: 100%; height: 2.5ch; width: 2.5ch; border-style: solid; border-color: rgba(255, 255, 255, 0.15); margin-top: 0.4ch;" /></span></a></td><td style="padding-left: 0.5ch; max-width: 10ch;"><div class="col-12" style="max-width: 10ch;"><a href="/~kg448/account.php?viewing=' + user + '&redirectFrom=feed" title="View ' + user + '\'s Profile" style="text-decoration: none;" class="bodyLight"><div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;';

    if (role == "admin") {
        commentHtml_1 = commentHtml_1 + 'color: rgb(175, 107, 72)';
    }

    commentHtml_1 = commentHtml_1 + '">' + fname + '</div></a></div></td><td style="padding-left: 1ch; width: 100%;"><div class="col-12" style="color: #a2a2a2; word-break: break-word;">' + comment + '</div></td>';

    showEditButton = false;
    showDeleteButton = false;

    if (showEditButton) {
        commentHtml_1 = commentHtml_1 + '<td style="max-width: fit-content; width: 2.5ch;"><span class=""><img src="" class="" title="Edit Comment" style="cursor: pointer; height: 2.5ch; width: 2.5ch; margin-top: 0.25ch; margin-right: 0.75ch; content: url("data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjZjRhNjU1IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDQ4OCA1MjIiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojZjRhNjU1O2ZpbGwtcnVsZTpub256ZXJvfQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cG9seWdvbiBjbGFzcz0iZmlsMCIgcG9pbnRzPSIwLDUwNSAyNjUsNTA1IDI2NSw1MjIgMCw1MjIgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yMTAgNDAybC0xMzEgMTdjLTUsMCAtOSwtMyAtMTAsLTcgMCwtMSAwLC0yIDAsLTNsMCAwIDAgMCAxNyAtMTMxIC0yOSAzMCAtNTcgMTgwIDE4MSAtNTcgMjkgLTI5eiI+PC9wYXRoPjxwb2x5Z29uIGNsYXNzPSJmaWwwIiBwb2ludHM9IjMyMSw0MyA0NDUsMTY3IDQ4OCwxMjQgMzY0LDAgIj48L3BvbHlnb24+PHBhdGggY2xhc3M9ImZpbDAiIGQ9Ik0yNDkgMTk1YzQsLTQgMTAsLTQgMTQsMCA0LDQgNCwxMSAwLDE0bC0xNzIgMTcyYzAsMCAtMSwxIC0xLDFsLTIgMTkgMTQxIC0xOCAyMDQgLTIwNCAtMTI0IC0xMjQgLTIwMyAyMDQgLTEyIDkxIDE1NSAtMTU1eiI+PC9wYXRoPjwvZz48L3N2Zz4=");"></span></td>';
    }

    commentHtml_1 = commentHtml_1 + '<td style="max-width: fit-content; width: 2.5ch;">';

    if (showDeleteButton) {
        commentHtml_1 = commentHtml_1 + '<span class=""><img src="" class="" title="Delete Comment" style="cursor: pointer; height: 2.5ch; width: 2.5ch; margin-top: 0.25ch; content: url("data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjRUM1RDU3IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSJzaGFwZS1yZW5kZXJpbmc6Z2VvbWV0cmljUHJlY2lzaW9uO3RleHQtcmVuZGVyaW5nOmdlb21ldHJpY1ByZWNpc2lvbjtpbWFnZS1yZW5kZXJpbmc6b3B0aW1pemVRdWFsaXR5OyIgdmlld0JveD0iMCAwIDIwNCAyNTgiIHg9IjBweCIgeT0iMHB4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4KICAgCiAgICAuZmlsMCB7ZmlsbDojRUM1RDU3fQogICAKICA8L3N0eWxlPjwvZGVmcz48Zz48cGF0aCBjbGFzcz0iZmlsMCIgZD0iTTE5MSA3MGwwIDEzOWMwLDI3IC0yMiw0OSAtNDksNDlsLTc1IDBjLTI3LDAgLTQ5LC0yMiAtNDksLTQ5bDAgLTEzOSAxNzMgMHptLTI0IDQybDAgOTNjMCwxOSAtMjUsMTkgLTI1LDBsMCAtOTNjMCwtMjAgMjUsLTIwIDI1LDB6bS01MCAwYzAsMzEgMCw2MiAwLDkzIDAsMTkgLTI1LDE5IC0yNSwwIDAsLTMxIDAsLTYyIDAsLTkzIDAsLTIwIDI1LC0yMCAyNSwwem0tNTAgMGwwIDkzYzAsMTkgLTI1LDE5IC0yNSwwbDAgLTkzYzAsLTIwIDI1LC0yMCAyNSwweiI+PC9wYXRoPjxwYXRoIGNsYXNzPSJmaWwwIiBkPSJNMTMgMzNsNDYgMGMtMSwtOSAyLC0xNyA4LC0yM2wwIC0xYzEzLC0xMiA2NCwtMTIgNzYsMCA2LDcgMTAsMTUgOSwyNGw0MCAwYzE3LDAgMTcsMjYgMCwyNmwtMTc5IDBjLTE3LDAgLTE3LC0yNiAwLC0yNnptNjYgMGw1MyAwYzEsLTMgMCwtNyAtMywtMTAgLTQsLTQgLTQzLC00IC00OCwwbDAgMGMtMywzIC0zLDcgLTIsMTB6Ij48L3BhdGg+PC9nPjwvc3ZnPg==");"></span>';
    }

    commentHtml_1 = commentHtml_1 + '</td></tr></tbody></table></div></div>';

    postElement.innerHTML = postElement.innerHTML + commentHtml_1;
}