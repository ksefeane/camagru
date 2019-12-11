const video = document.getElementById('video');
const snap = document.getElementById('snap');
const canvas = document.getElementById('edit');
const save = document.getElementById('save');

feed();
			
var context = canvas.getContext('2d');
snap.addEventListener("click", function () 
	{context.drawImage(video, 0, 0, 600, 600);});


function feed() {
var constraints = {video: {width: 600, height: 600 }};
navigator.mediaDevices.getUserMedia(constraints)
	.then(stream => {video.srcObject = stream});
}

save.addEventListener("click", function () {
	var pic = document.getElementById("edit");
	var img = pic.toDataURL("image/png");
	document.getElementById("video").innerHTML = "img";
});

