
var spinning = false;
var lightOn = true;

function spin(){
	spinning = !spinning;
	$('#model__RotationTimer').attr('enabled', spinning.toString());
}

function wireframe(){
	var e = document.getElementById('model');
	e.runtime.togglePoints(true);
	e.runtime.togglePoints(true);
}

function lighting(){
	lightOn = !lightOn;
	$('#model__lighting').attr('headlight', lightOn.toString());
}

function cam1(){
	$('#model__Camera1').attr('bind', 'true');
}

function cam2(){
	$('#model__Camera2').attr('bind', 'true');
}