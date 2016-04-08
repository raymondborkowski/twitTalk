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


//NEED TO GRAB ONLY THE JSON FILE I WANT BY BRINGING OVER DIV NAME???????????????????????????????????
//Display the items in the divs of choice
function displayMedia(length, bottomTextImage, classID, arr, isMedia, time1, time2, nameArray){
	arr = callbackGetData()[nameArray];
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
	           		var tempObj = callbackGetData();
	                displayMedia(length, bottomTextImage, classID, arr, isMedia, time1, time2, nameArray );
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

function callbackGetData() {
	var obj = getData('K');
	var objKate = getData('Kate');
	var objJ = getData('J');
	var objJack = getData('Jack');
	var onlyMedia = splitObjMedia(obj, obj.statuses.length, false).mediaArr;
	var onlyText = splitObjMedia(obj, obj.statuses.length, false).textArr;
	var onlyMediaKate = splitObjMedia(objKate, objKate.statuses.length, false).mediaArr;
	var onlyTextKate = splitObjMedia(objKate, objKate.statuses.length, false).textArr;
	var onlyMediaJack = splitObjMedia(objJack, objJack.length, true).mediaArr;
	var onlyTextJack = splitObjMedia(objJack, objJack.length, true).textArr;

	//split them to display them in seperate divs
	var otherMediaLength = Math.floor(onlyMedia.length/3);
	var ksTextLength = Math.floor(onlyTextKate.length/6);
	var jsTextLength = Math.floor(onlyTextJack.length/3);
	var jsMediaLength = Math.floor(onlyMediaJack.length/2);
	var object = {
		otherText1 : splitArray(onlyText,Math.floor(onlyText.length/2)),//used
		otherText2 : onlyText,//used           
		otherMedia1 : splitArray(onlyMedia,otherMediaLength), //used
		otherMedia2 : splitArray(onlyMedia,otherMediaLength),//used
		otherMedia3 : onlyMedia,//used           
		ksText1 : splitArray(onlyTextKate,ksTextLength),//Used
		ksText2 : splitArray(onlyTextKate,ksTextLength),//used
		ksText3 : splitArray(onlyTextKate,ksTextLength),//used
		ksText4 : splitArray(onlyTextKate,ksTextLength),//used
		ksText5 : splitArray(onlyTextKate,ksTextLength),//used
		ksText6 : onlyTextKate,//used           
		ksMedia : onlyMediaKate, //used           
		jsText1 : splitArray(onlyTextJack,jsTextLength),//used
		jsText2 : splitArray(onlyTextJack,jsTextLength),//used
		jsText3 : onlyTextJack,//used           
		jsMedia : splitArray(onlyMediaJack,jsMediaLength),//used
		jsMedia1 : onlyMediaJack, //used     
		onlyMediaJ : splitObjMedia(objJ, objJ.statuses.length, false).mediaArr,
	    onlyTextJ : splitObjMedia(objJ, objJ.statuses.length, false).textArr
	};
	return object;	
};