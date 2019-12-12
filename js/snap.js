const video = document.getElementById('video');
const snap = document.getElementById('snap');
const canvas = document.getElementById('edit');
const copy = document.getElementById('copy');
const save = document.getElementById('save');
const open = document.getElementById('open');
const refresh = document.getElementById('refresh');
const friday = document.getElementById('friday');
const insta = document.getElementById('insta');
const twitter = document.getElementById('twitter');
const iphone = document.getElementById('iphone');
const tiktok = document.getElementById('tiktok');
const file = document.getElementById('file');
const purge = document.getElementById('purge');

var context = canvas.getContext('2d');
var concopy = copy.getContext('2d');
var pic = null;

open.addEventListener("click", feed);
purge.addEventListener("click", feed);
//feed();
snap.addEventListener("click", takeSnap);

friday.addEventListener("click", applyfriday);
insta.addEventListener("click", applyinsta);
twitter.addEventListener("click", applytwitter);
iphone.addEventListener("click", applyiphone);
tiktok.addEventListener("click", applytiktok);

save.addEventListener("click", saveSnap);
refresh.addEventListener("click", refreshSnap);
file.addEventListener("click", uploadForm);

function feed() {
	var state = document.getElementById("open").innerHTML;
	var constraints = {video: {width: 500, height: 500}};
	navigator.mediaDevices.getUserMedia(constraints)
		.then(stream => {video.srcObject = stream});
	if (state == "open") {
		document.getElementById("purge").style.display = "none";
		document.getElementById("video").style.display = "block";
		document.getElementById("open").innerHTML = "close";
	} else {
		document.getElementById("open").innerHTML = "open";
		document.getElementById("purge").style.display = "block";
		document.getElementById("video").style.display = "none";
		navigator.mediaDevices.getUserMedia(constraints)
			.then(stream => {video.srcObject = null});
		video.pause();
		video.src = "";
	}
}

function takeSnap () {
	if (document.getElementById("open").innerHTML == "close") {
		context.drawImage(video, 0, 0, 500, 500);
		pic = canvas;
		document.getElementById("edit").style.display = "block";
		document.getElementById("hand").style.display = "none";
		piccache();
	} else {
		alert("open the camera first")
	}
	}

function saveSnap () {
	var data = canvas.toDataURL();
	var xhttp = new XMLHttpRequest();
	var url = "upload.php";

	xhttp.open("POST", url, true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		alert("saved");
    	} 
	};
	xhttp.send('key='+data);
}

function piccache () {
	concopy.drawImage(video, 0, 0, 500, 500);
}

function refreshSnap () {
	cpy = document.getElementById('copy');
	context.drawImage(cpy, 0, 0, 500, 500);
//	document.getElementById("hand").style.display = "block";
//	document.getElementById("purge").style.display = "block";
//	document.getElementById("edit").style.display = "none";
//	document.getElementById("video").style.display = "none";
//	document.getElementById("purge").style.display = "block";
}

function uploadForm () {
	var state = document.getElementById("formkun").style.display;
	if (state == "block")
		document.getElementById("formkun").style.display = "none";
	else
		document.getElementById("formkun").style.display = "block";
}

function applyfriday () {context.drawImage(friday, 0, 340, 150, 150);}
function applyinsta () {context.drawImage(insta, 10, 10, 100, 100);}
function applytwitter () {context.drawImage(twitter, 360, 0, 150, 150);}
function applyiphone () {context.drawImage(iphone, 80, 20, 350, 480);}
function applytiktok () {context.drawImage(tiktok, 360, 350, 150, 150);}


