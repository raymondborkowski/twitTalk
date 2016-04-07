//Split the JS var into sepreate arrays MEDIA||TEXT
function splitObjMedia(object, length, isProfile){
	var mediaArr = [], textArr = [];
	for(var i = 0; i < length; i++){
		//Need to check if using twitter search or twitter profile
		if(isProfile){
			if(object[i].entities.hasOwnProperty('media'))
				mediaArr.push([object[i].user.screen_name,object[i].text,object[i].entities.media[0].media_url_https]);
			else
				textArr.push([object[i].user.screen_name,object[i].text]);
		}
		else{
			if(object.statuses[i].entities.hasOwnProperty('media'))
				mediaArr.push([object.statuses[i].user.screen_name,object.statuses[i].text,object.statuses[i].entities.media[0].media_url_https]);
			else
				textArr.push([object.statuses[i].user.screen_name,object.statuses[i].text]);
		}
	}
	return {
		mediaArr: mediaArr,
		textArr: textArr
	};
};

//Split the array for each div
function splitArray(arr, length){
	var newArr = [];
	for(var i = 0; i < length; i++){
		newArr.push(arr[i]);
		arr.shift();
	}
	return newArr;
};

//Display the items in the divs of choice
function displayMedia(length, bottomTextImage, classID, arr, isMedia, time1, time2){
	var limit = (length - 1);
	document.getElementById(bottomTextImage).innerHTML = "@" + arr[0][0] + ":</br>" + arr[0][1];
	if(isMedia)
		document.getElementById(classID).style.backgroundImage =  "url('" + arr[0][2] +"')";
	for (var i=	1;i< arr.length;i++) {
	   (function(ind) {
	       setTimeout(function(){
	           document.getElementById(bottomTextImage).innerHTML = "@" + arr[ind][0] + ":</br>" + arr[ind][1];
	           	if(isMedia)
	           		document.getElementById(classID).style.backgroundImage =  "url('" + arr[ind][2] +"')";
	           	if(ind == limit){
	               displayMedia(length, bottomTextImage, classID, arr, isMedia, time1, time2 );
	           	}
	       }, time1 + (time2 * ind));
	   })(i);
	}
};
//Grab PHP string as JS variable
function  getData(endFile) {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'data/twitter_result' + endFile + '.json',
        'dataType': "json",
        'success': function (data) {
            json = data.twitter_result;
        }
    });
    return json;
}; 

var obj = getData('K');
var objKate = getData('Kate');
var objJ = getData('J');
var objJack = getData('Jack');

var onlyMedia = splitObjMedia(obj, obj.statuses.length, false).mediaArr;
var onlyText = splitObjMedia(obj, obj.statuses.length, false).textArr;
var onlyMediaKate = splitObjMedia(objKate, objKate.statuses.length, false).mediaArr;
var onlyTextKate = splitObjMedia(objKate, objKate.statuses.length, false).textArr;
var onlyMediaJ = splitObjMedia(objJ, objJ.statuses.length, false).mediaArr;
var onlyTextJ = splitObjMedia(objJ, objJ.statuses.length, false).textArr;
var onlyMediaJack = splitObjMedia(objJack, objJack.length, true).mediaArr;
var onlyTextJack = splitObjMedia(objJack, objJack.length, true).textArr;

//split them to display them in seperate divs
var otherMediaLength = Math.floor(onlyMedia.length/3);
var ksTextLength = Math.floor(onlyTextKate.length/6);
var jsTextLength = Math.floor(onlyTextJack.length/3);
var jsMediaLength = Math.floor(onlyMediaJack.length/2);
var otherText1 = splitArray(onlyText,Math.floor(onlyText.length/2));//used
var otherText2 = onlyText;//used
var otherMedia1 = splitArray(onlyMedia,otherMediaLength); //used
var otherMedia2 = splitArray(onlyMedia,otherMediaLength);//used
var otherMedia3 = onlyMedia;//used
var ksText1 = splitArray(onlyTextKate,ksTextLength);//Used
var ksText2 = splitArray(onlyTextKate,ksTextLength);//used
var ksText3 = splitArray(onlyTextKate,ksTextLength);//used
var ksText4 = splitArray(onlyTextKate,ksTextLength);//used
var ksText5 = splitArray(onlyTextKate,ksTextLength);//used
var ksText6 = onlyTextKate;//used
var ksMedia = onlyMediaKate; //used
var jsText1 = splitArray(onlyTextJack,jsTextLength);//used
var jsText2 = splitArray(onlyTextJack,jsTextLength);//used
var jsText3 = onlyTextJack;//used
var jsMedia = splitArray(onlyMediaJack,jsMediaLength);//used
var jsMedia1 = onlyMediaJack; //used