const video = document.getElementById('video');
const snap = document.getElementById('snap');
const canvas = document.getElementById('edit');
const save = document.getElementById('save');
const open = document.getElementById('open');

const friday = document.getElementById('friday');
const insta = document.getElementById('insta');
const twitter = document.getElementById('twitter');
const iphone = document.getElementById('iphone');
const tiktok = document.getElementById('tiktok');
const pic = null;

var context = canvas.getContext('2d');

open.addEventListener("click", feed);
//feed();
snap.addEventListener("click", takeSnap);

friday.addEventListener("click", applyfriday);
insta.addEventListener("click", applyinsta);
twitter.addEventListener("click", applytwitter);
iphone.addEventListener("click", applyiphone);
tiktok.addEventListener("click", applytiktok);

save.addEventListener("click", saveSnap);
refresh.addEventListener("click", refreshSnap);
function feed() {
	var constraints = {video: {width: 500, height: 500}};
	navigator.mediaDevices.getUserMedia(constraints)
		.then(stream => {video.srcObject = stream});
}

function takeSnap () {
	pic = context.drawImage(video, 0, 0, 500, 500);
}

function applyfriday () {context.drawImage(friday, 0, 340, 150, 150);}
function applyinsta () {context.drawImage(insta, 10, 10, 100, 100);}
function applytwitter () {context.drawImage(twitter, 0, 340, 150, 150);}
function applyiphone () {context.drawImage(iphone, 80, 20, 350, 480);}
function applytiktok () {context.drawImage(tiktok, 0, 340, 150, 150);}

function saveSnap () {
	var data = canvas.toDataURL();
	var xhttp = new XMLHttpRequest();
	var url = "upload.php";

	xhttp.open("POST", url, true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		alert(xhttp.responseText);
    	}
	};
	xhttp.send('key='+data);
}

function refreshSnap () {
	context.drawImage(pic, 0, 0, 500, 500);
}
