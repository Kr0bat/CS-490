var expiration=null;
var refreshToken=null;
var accessToken=null;
var auth="Basic Y2I4YzNmN2JiOWQzNGM0ODkxNGQwZmVjYWVhMjM0NTg6Mjc4YWViMjAwZjVjNGZlZDk2YWFlNDQ1MjljYjBiOGE=";
var result = null;
var freshTokens = null;
var songInfo = null;

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

function getSongInfo(songId){ //this should return a promise so I can await for the result before trying to add the song information
    return new Promise(function(resolve, reject){
        var url = "https://api.spotify.com/v1/tracks/";
        //var songId = "11dFghVXANMlKmJXsNCbNl";
        url = url + songId;

        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.setRequestHeader("Authorization", "Bearer "+accessToken);

        xhr.send();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    songInfo = JSON.parse(xhr.responseText);
                    //alert("200 status!");
                    //freshTokens['expires_in'] += (Date.now() / 1000);

                    resolve();
                }
            }
        })
}

async function setPostsSongInfo(){

    await getTokens();
    updateGlobals(result);

    if (tokenExpired()){
        await refreshTokens();
        updateGlobals(freshTokens);

        var url2 = "https://web.njit.edu/~kg448/getApi.php";
        var xhr2 = new XMLHttpRequest();
        var params2 = "set_api_info=true&access_token=" + accessToken + "&expires_in=" + expiration;
    
        xhr2.open("POST", url2, true);
        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr2.send(params2);
    }

    var postList = document.getElementsByClassName("col-12 bodyBold postContainer");

    //await getSongInfo("11dFghVXANMlKmJXsNCbNl");
    //alert(postList.length);
    for (let i = 0; i < postList.length; i++){
        var art = postList[i].getElementsByTagName("div")[0].getElementsByTagName('img')[1] //returns html element containing art. Change the value of .src

        if (art.title == "Delete Post"){  //this makes sure we don't catch the delete post icon by mistake
            art = postList[i].getElementsByTagName("div")[0].getElementsByTagName('img')[2]
        }
		var title = postList[i].getElementsByTagName("div")[7] //change value of .innerText
		var album_year = postList[i].getElementsByTagName("div")[8] // "album - year"
		var artist = postList[i].getElementsByTagName("div")[9]
		var link = postList[i].getElementsByTagName("div")[2].getElementsByTagName('a')[0].href //returns the full link
        var audio = postList[i].getElementsByTagName("audio")[0]

        var id = link.split('/')[4].split('?')[0]
        await getSongInfo(id);

        if (art.getAttribute("src") == ""){
            art.src = songInfo['album']['images'][0]['url'];
        }
        title.innerText = songInfo['name'];
        album_year.innerText = songInfo['album']['name'] + " - " + songInfo['album']['release_date'].split('-')[0];
        artist.innerText = songInfo['artists'][0]['name'];
        audio.src = songInfo['preview_url'];

        //alert(songInfo['name']);
    }
}