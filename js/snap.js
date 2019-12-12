const video = document.getElementById('video');
const snap = document.getElementById('snap');
const canvas = document.getElementById('edit');
const save = document.getElementById('save');
const open = document.getElementById('open');
const apply = document.getElementById('apply');
const friday = document.getElementById('friday');
			
var context = canvas.getContext('2d');


open.addEventListener("click", feed);
snap.addEventListener("click", takeSnap);
friday.addEventListener("click", applySticker);
save.addEventListener("click", saveSnap);

function feed() {
	var constraints = {video: {width: 500, height: 500}};
	navigator.mediaDevices.getUserMedia(constraints)
		.then(stream => {video.srcObject = stream});
}

function takeSnap () {
	context.drawImage(video, 0, 0, 500, 500);
}

function applySticker () {
	context.drawImage(friday, 0, 340, 150, 150);
}

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
