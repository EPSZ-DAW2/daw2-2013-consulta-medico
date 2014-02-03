	function load_canv_1(){
		var canvas = document.getElementById("_canv_1");

		if (canvas && canvas.getContext){
			var ctx = canvas.getContext("2d");
			ctx.lineWidth = .93333332;
			ctx.lineCap = 'butt';
			ctx.lineJoin = 'miter';
			ctx.miterLimit = 13.3333;
			ctx.strokeStyle = "rgba(0,0,0,1)";
			ctx.beginPath();
			ctx.moveTo(.93333435,.93334961);
			ctx.lineTo(103.2,.93334961);
			ctx.stroke();
		}
	}
	
function DrawPage1(){
	load_canv_1();
}
