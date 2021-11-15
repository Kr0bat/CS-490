var lastUpdated = null;
var result = [];

function update(timestamp){
    lastUpdated = timestamp;
    //lastUpdated = "2021-11-08 23:27:18";
}


function currentTime(){
    // this will be useful if we want to add trailing 0s to the date
    var d = new Date();
    /*
    var year = d.getFullYear();
    var month = d.getMonth();
    var day = d.getDay();
    var hour = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    */
    
    var timestamp = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    //alert(timestamp);
    return timestamp;
}

//Initially, recently created dms were going to be displayed locally, before they were uploaded to the db
//This feature turned out to be uneeded, but the function header remains the same
//Recently created dms are sourced locally, instead of polling the database
//We were running into an issue where a dm a user created was not visible when they recieved a dm moments earlier
function updateChat(sender, user=null, message=null, timestamp=null){
    var chatBox = document.getElementById("chatTable").getElementsByTagName("tbody")[0];
    //alert(message);
    if (timestamp == null){
        timestamp = currentTime();
        //alert(timestamp);
    }

    if(user == null){
        var user = sender;
    }

    if(message == null){
        var message = document.getElementsByName("newdm_msg")[0].value;
        document.getElementsByName("newdm_msg")[0].value = "";
    }

    //append the message (in html format) to the div
    if (user == sender){  
        chatBox.innerHTML = '<tr style="width: 100%;"><td style="width: 50%"></td><td style="width: 50%"><div class="bubbleSend bodyLight">' + message + '</div><div class="subtitleLight" style="font-size: 14px; padding-left: 1.5ch; padding-top: 0.25ch;">' + timestamp +'</div></td></tr>' + chatBox.innerHTML;
        
    }
    else{
        chatBox.innerHTML = '<tr style="width: 100%;"><td style="width: 50%"><div class="bubbleReceive bodyLight">' + message + '</div><div class="subtitleLight" style="font-size: 14px; padding-left: 3.5ch; padding-top: 0.25ch;">' + timestamp + '</div></td><td style="width: 50%"></td></tr>' + chatBox.innerHTML;
    }
}

function getChats(recipient, sender, user){ 
    if(lastUpdated == null){
        update(currentTime());
    } 
    //alert(lastUpdated);
    var url = "https://web.njit.edu/~kg448/getChat.php";
    var xhr = new XMLHttpRequest();
	var params = "recipient=" + recipient + "&sender=" + sender + "&get_chat=true" + "&timestamp=" + lastUpdated;

    xhr.open("POST", url, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(params);

    

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            result = JSON.parse(xhr.responseText);
            //alert(result[0]['msg']);
            update(currentTime());
        }
    }

    if (result != null){
        for (let i = 0; i < result.length; i++){
            if (result[i]['s'] != user){
                updateChat(result[i]['s'], user, result[i]['msg'], result[i]['t']);
            }
        }
    }
    result = [];

}

function sendChat(sender, recipient){
    var message = document.getElementsByName("newdm_msg")[0].value;

    var url = "https://web.njit.edu/~kg448/getChat.php";
    var xhr = new XMLHttpRequest();
	var params =  "sender=" + sender + "&recipient=" + recipient + "&msg=" + message + "&set_chat=true";

    xhr.open("POST", url, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(params);

    //document.getElementsByName("newdm_msg")[0].value = "";

    updateChat(sender);
}

function checkUnreadChat(recipient){
    var url = "https://web.njit.edu/~kg448/getChat.php";
    var xhr = new XMLHttpRequest();
    var params = "anyUnread=true&recipient=" + recipient;

    xhr.open("POST", url, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(params);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            result = JSON.parse(xhr.responseText);

            var onChat = false;
            var currPage = window.location.href.split('/')[4].split('?')[0]; //grab name of current page
            if (currPage == 'chat.php'){
                if (window.location.href.split('/')[4].split('?').length > 1){
                    onChat = false;
                }
                else {
                    onChat = true;
                }
            }

            if (result['unread'] && !onChat){
                changeChatIcons();
            }
        }
    }
}

function changeChatIcons(){
    var color = "#dac798";
    document.getElementById("chat_name").style['color']=color;

    var path = document.getElementById("chat_path");
    path.setAttribute("fill", color );

    icon = document.getElementById("chat_new");
    icon.style['display'] = "block";
}