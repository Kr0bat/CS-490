var lastUpdated = null;
var chatResult = [];
var needUpdate = false;
var msg = "";

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

function processChatInfo(xhr, params){
    return new Promise(function(resolve, reject){
        var chatStuff = [];
        xhr.send(params);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                chatStuff = JSON.parse(xhr.responseText);
                //alert(chatStuff[0]['msg']); //It works when this is uncommented

    
                //alert(chatResult);
                resolve(chatStuff);
            }
            
        }

        //resolve("Failed resolve");

    });
}

async function getChats(recipient, sender, user){ 
    if(lastUpdated == null){
        update(currentTime());
    } 
    //alert(lastUpdated);
    var url = "https://web.njit.edu/~kg448/getChat.php";
    var xhr = new XMLHttpRequest();
	var params = "recipient=" + recipient + "&sender=" + sender + "&get_chat=true" + "&timestamp=" + lastUpdated;

    xhr.open("POST", url, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //alert("An alert before");

    /*
    processChatInfo(xhr, params).then(function(response){
        alert(response[0]['msg']);
        if(response == undefined){
            return;
        }
        alert(response[0]['msg']);
        for (let i = 0; i < response.length; i++){
            if (response[i]['s'] != user){
                updateChat(response[i]['s'], user, response[i]['msg'], response[i]['t']);
            }
        }
    }) */

    response = await processChatInfo(xhr, params);
    //alert(response[0]['msg']);

    var needsUpdate = false;

    for (let i = 0; i < response.length; i++){
        if (response[i]['s'] != user){
            updateChat(response[i]['s'], user, response[i]['msg'], response[i]['t']);
            needsUpdate = true;
        }
    }

    if(needsUpdate){
        update(currentTime());
        needsUpdate = false;
    }
    

    

    //chatResult = [];

    

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
            var result = JSON.parse(xhr.responseText);

            var onChat = false;
            var onIndividualChat = false;
            var currPage = window.location.href.split('/')[4].split('?')[0]; //grab name of current page
            if (currPage == 'chat.php'){
                onChat = true;
                if (window.location.href.split('/')[4].split('?').length > 1){
                    onIndividualChat = true;
                }

            }

            //If you are not on the main chat page, change the sidebar chat icon color
            if (onChat == onIndividualChat){
                if(result['unread']){
                    changeChatIcons("#dac798");
                }
                //Change the icon color to white or green depending on the current page
                else if(onIndividualChat){
                    unChangeChatIcons("#56b35e");
                }
                else{
                    unChangeChatIcons("#FFFFFF")
                }
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

function unChangeChatIcons(color){
    //var color = "#FFFFFF";
    document.getElementById("chat_name").style['color']=color;

    var path = document.getElementById("chat_path");
    path.setAttribute("fill", color );

    icon = document.getElementById("chat_new");
    icon.style['display'] = "none";
}

function checkRefresh(chat, recipient){
    return new Promise(function(resolve, reject){
        var url = "https://web.njit.edu/~kg448/getChat.php";
        var xhr = new XMLHttpRequest();
        var sender = chat.id.substring(15)
        var params = "recentChat=true&recipient=" + recipient + "&sender=" + sender;

        xhr.open("POST", url, true);

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = JSON.parse(xhr.responseText);
                //alert("STARTING TO SET STUFF FOR: " + sender);
                if(chat.getElementsByTagName("div")[3].innerText != result['msg']){
                    msg = result['msg'];
                    needUpdate = true;

                    resolve();
                }
                else{resolve();}
            }
        }
    })
}

async function refreshChatList(recipient){
    var chatList = document.getElementById("chat_list").getElementsByTagName("a");
    
    for(let i = 0; i<chatList.length; i++){
        needUpdate = false;
        if (chatList[i].id == ""){
            continue;
        }
        else{
            await checkRefresh(chatList[i], recipient);
        }

        if (needUpdate){
            if (chatList[i].getElementsByTagName("span")[0].classList.length == 0){
                chatList[i].getElementsByTagName("span")[0].setAttribute("class", "blueDot");
                chatList[i].getElementsByTagName("span")[0].style = "margin-left: 1.5ch;";
                chatList[i].getElementsByTagName('div')[2].getElementsByTagName('span')[1].innerHTML = '<span style="color: #56b35e">(NEW)</span> ' + chatList[i].getElementsByTagName('div')[2].getElementsByTagName('span')[1].innerHTML;
            }
            chatList[i].getElementsByTagName("div")[3].innerText = msg;
            
        }
            
            
    }
        
}