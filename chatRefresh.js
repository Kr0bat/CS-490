function updateChat(sender, user=null, message=null, timestamp=null){
    chatBox = document.getElementById("chatTable").getElementsByTagName("tbody")[0];
    //alert(message);
    if (timestamp == null){
        var d = new Date();
        timestamp = d.getFullYear() + "-" + d.getMonth() + "-" + d.getDay() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        alert(timestamp);
    }

    if(user == null){
        user = sender;
    }

    if(message == null){
        message = document.getElementsByName("newdm_msg")[0].value;
        
    }

    //append the message (in html format) to the div
    if (user == sender){
        
        chatBox.innerHTML = '<tr style="width: 100%;"><td style="width: 50%"></td><td style="width: 50%"><div class="bubbleSend bodyLight">' + message + '</div><div class="subtitleLight" style="font-size: 14px; padding-left: 1.5ch; padding-top: 0.25ch;">' + timestamp +'</div></td></tr>' + chatBox.innerHTML;
        
    }
    else{
        
        chatBox.innerHTML = '<tr style="width: 100%;"><td style="width: 50%"><div class="bubbleReceive bodyLight">' + message + '</div><div class="subtitleLight" style="font-size: 14px; padding-left: 3.5ch; padding-top: 0.25ch;">'. timestamp + '</div></td><td style="width: 50%"></td></tr>' + chatBox.innerHTML;
        
    }
}