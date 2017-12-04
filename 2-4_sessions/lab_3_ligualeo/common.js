document.addEventListener('DOMContentLoaded', function(){
	console.log("common.js");
	var left = document.getElementById('leftButton'),
	right = document.getElementById('rightButton');

	left.addEventListener("click", submitleft, false);
	right.addEventListener("click", submitright, false);
	document.addEventListener("keydown", keydown, false);

	function keydown(e){
		var keycode = e.keyCode;
		if(keycode==37) {
        	submitleft();
    	}
    	else if(keycode==39) {
        	submitright();
    	}
	}

	function submitleft(){
		document.getElementById("right").checked = false;
		document.getElementById("left").checked = true;
		document.getElementById("form").submit();
		console.log("left");
	}

	function submitright(){
		document.getElementById("left").checked = false;
		document.getElementById("right").checked = true;
		document.getElementById("form").submit();
		console.log("right");
	}
});