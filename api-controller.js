var expiration=null;
var refreshToken=null;
var accessToken=null;
var auth="Basic Y2I4YzNmN2JiOWQzNGM0ODkxNGQwZmVjYWVhMjM0NTg6Mjc4YWViMjAwZjVjNGZlZDk2YWFlNDQ1MjljYjBiOGE=";
var result = null;
var freshTokens = null;

function updateGlobals(result){
    expiration = result['expires_in']; //this needs to be processed if not null

    if(refreshToken == null){
        refreshToken = result['refresh_token'];
    }
    accessToken = result['access_token'];
}

function tokenExpired(){
    return expiration <= (Date.now() / 1000) ;
}

function getTokens(){
    return new Promise(function(resolve, reject){
        var url = "https://web.njit.edu/~kg448/getApi.php";
        var xhr = new XMLHttpRequest();
        var params = "get_api_info";

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                result = JSON.parse(xhr.responseText);
                
                resolve();
            }
            
        }

        //return xhr.status;
    })
}

function refreshTokens(){
    //request new tokens from spotify
    return new Promise(function(resolve, reject){
        var url = "https://accounts.spotify.com/api/token";
        var xhr = new XMLHttpRequest();
        var params = "grant_type=refresh_token&refresh_token=" + refreshToken;
        //alert("I'm within refreshTokens(), here is the refreshToken I just attached: " + refreshToken);
        
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.setRequestHeader("Authorization", auth);

        xhr.send(params);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                freshTokens = JSON.parse(xhr.responseText);
                //alert("200 status!");
                freshTokens['expires_in'] += (Date.now() / 1000);

                resolve();
            }
        }
        
    })
    
}

async function setPostsSongInfo(){
    //getTokens()
/*
    let getTokensPromise = new Promise(function(myResolve, myReject){
        var url = "https://web.njit.edu/~kg448/getApi.php";
        var xhr = new XMLHttpRequest();
        var params = "get_api_info";

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                result = JSON.parse(xhr.responseText);
                updateGlobals(result);
                //myResolve(true);
            }
            //else{ myReject("Couldn't connect"); }
            myResolve(true);
            
        }
    });*/
/*
    getTokensPromise.then(
        function(value) { 
            if ( tokenExpired() ){
                alert("I'm calling refreshTokens(), here's my refreshToken: " + refreshToken);
                //refreshTokens();
            }
        }//,function(error){alert("Sorry, try refreshing!");}
    );
    
    */

    //console.log("enter promise");
    await getTokens();
    updateGlobals(result);
    //alert(refreshToken);
    //console.log(refreshToken);

    if (tokenExpired() || true){
        await refreshTokens();
        updateGlobals(freshTokens);

        var url2 = "https://web.njit.edu/~kg448/getApi.php";
        var xhr2 = new XMLHttpRequest();
        var params2 = "set_api_info=true&access_token=" + accessToken + "&expires_in=" + expiration;
    
        xhr2.open("POST", url2, true);
        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr2.send(params2);
    }
}