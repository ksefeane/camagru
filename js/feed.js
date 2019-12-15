const comment = document.getElementById('commentbutton');

comment.addEventListener("click", openComment);

function openComment () {
	var state = document.getElementById('commentbox').style.display;
	if (state == "block")
		document.getElementById('commentbox').style.display = "none";
	else
		document.getElementById('commentbox').style.display = "block";
}
