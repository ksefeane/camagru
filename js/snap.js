const video = document.getElementById('video');
const snap = document.getElementById('snap');
const canvas = document.getElementById('edit');
const save = document.getElementById('save');
const open = document.getElementById('open');
			
var context = canvas.getContext('2d');

snap.addEventListener("click", takeSnap);

//open.addEventListener("click", feed);
feed();
save.addEventListener("click", saveSnap);

function feed() {
	var constraints = {video: {width: 600, height: 600 }};
	navigator.mediaDevices.getUserMedia(constraints)
		.then(stream => {video.srcObject = stream});
}

function Canvas2Image (canvas) {
	var image = new Image();
	image.src = canvas.toDataURL("image/png");
	return image;
}

function takeSnap () {
	context.drawImage(video, 0, 0, 500, 500);
}

function saveSnap () {
	var data = canvas.toDataURL();
//	data = data.replace(' ', '+');
//	var text = "hello";
	var xhttp = new XMLHttpRequest();
	var url = "upload.php";

	xhttp.open("POST", url, true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
      console.log(xhttp.responseText);
    }
};
	xhttp.send('key='+data);
}
