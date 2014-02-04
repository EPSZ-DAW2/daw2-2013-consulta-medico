	function load_canv_1(){
		var canvas = document.getElementById("_canv_1");

		if (canvas && canvas.getContext){
			var ctx = canvas.getContext("2d");
			ctx.lineWidth = .66666667;
			ctx.lineCap = 'butt';
			ctx.lineJoin = 'miter';
			ctx.miterLimit = 13.3333;
			ctx.strokeStyle = "rgba(0,0,0,1)";
			ctx.beginPath();
			ctx.moveTo(.66666667,.66660563);
			ctx.lineTo(107.33,.66660563);
			ctx.stroke();
		}
	}
	
	function load_canv_2(){
		var canvas = document.getElementById("_canv_2");

		if (canvas && canvas.getContext){
			var ctx = canvas.getContext("2d");
			ctx.lineWidth = .66666667;
			ctx.lineCap = 'butt';
			ctx.lineJoin = 'miter';
			ctx.miterLimit = 13.3333;
			ctx.strokeStyle = "rgba(0,0,0,1)";
			ctx.beginPath();
			ctx.moveTo(.66666667,.66666667);
			ctx.lineTo(88.6667,.66666667);
			ctx.stroke();
		}
	}
	
function DrawPage1(){
	load_canv_1();
	load_canv_2();
}
