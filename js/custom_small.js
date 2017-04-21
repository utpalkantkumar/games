// JavaScript Document

window.addEventListener('resize', resizeGame, false);
window.addEventListener('orientationchange', resizeGame, false);


$(document).ready(function(e) {
    resizeGame();
});

window.addEventListener('load', resizeGame, false);
 var gameArea;
var gameWidth;
var gameHeight;
function resizeGame() {
	
	
    var wrapperHt = $('#gameArea').height();
	var bud_redHt = $(bud_red).height();
	
	$('#bud_red').css('top',wrapperHt);
	//console.log(wrapperHt + "-------------------");
	
	
	
    gameArea = document.getElementById('gameArea');
	gameWidth = gameArea.offsetWidth;
	gameHeight = gameArea.offsetHeight;
	//console.log(gameWidth);
    var widthToHeight = 4 / 3;
    var newWidth = wrapper.offsetWidth;
    var newHeight = wrapper.offsetHeight;
    var newWidthToHeight = newWidth / newHeight;
    
    if (newWidthToHeight > widthToHeight) {
        newWidth = newHeight * widthToHeight;
        gameArea.style.height = newHeight + 'px';
        gameArea.style.width = newWidth + 'px';
    } else {
        newHeight = newWidth / widthToHeight;
        gameArea.style.width = newWidth + 'px';
        gameArea.style.height = newHeight + 'px';
    }
    
    /*gameArea.style.marginTop = (-newHeight / 2) + 'px';
    gameArea.style.marginLeft = (-newWidth / 2) + 'px';*/
	
	
	theCanvas = document.getElementById('canvasOne');
	theCanvas.width = newWidth;
    theCanvas.height = newHeight;
	context = theCanvas.getContext('2d');
	
/*	theCanvas = document.getElementById('canvasOne');
	theCanvas.width = gameWidth ;
	theCanvas.height = gameHeight;*/
}

window.addEventListener('load', eventWindowLoaded, false);	
function eventWindowLoaded() {
	canvasApp();
	
	
}


function canvasSupport () {
  	return Modernizr.canvas;
}


function canvasApp() {
		
	theCanvas = document.getElementById('canvasOne');
	//theCanvasBg = document.getElementById('canvasBg');
	context = theCanvas.getContext('2d');
	//contextBg = theCanvasBg.getContext('2d');
    if (!canvasSupport()) {
			 return;
	}
 	var pointImage = new Image();
	pointImage.src="images/other_bud.png";
	
	var bullsEye = new Image();
	
	bullsEye.src="images/bassbud.png";
	
	
	var bgPattern = new Image();
	
	bgPattern.src="images/transparent_black.jpg";
	
	//context.drawImage(bullsEye, (bullsEyeX - bullsEye.width/2), (bullsEyeY-bullsEye.height/2), 30, 30);
	
	
	document.getElementById('canvasOne').addEventListener("mousemove", doMouseMove, false);
	document.getElementById('canvasOne').addEventListener("mousedown", mouseDown, false);
	document.getElementById('canvasOne').addEventListener("touchstart", touchDown, false);
    document.getElementById('canvasOne').addEventListener("touchmove", touchXY, true);
    document.getElementById('canvasOne').addEventListener("touchend", touchUp, false);
	 document.getElementById('canvasOne').addEventListener("touchcancel", touchUp, false);
	
	
	var speed = document.getElementById("speed");
	var time = document.getElementById("time");
	//debug.innerHTML = gameArea.offsetLeft;
	//console.log(bullsEye);
	var bullsEyeX = 0;
	var bullsEyeY= 0;
	var speedTest = 1;
	var timeInterval = 0;
	var mouseIsDown = 0;
	var ball;
	 var gameInterval;
	//for mobile start
	 tempRadius = 9;
	 var numBalls =5 ;
//for mobile end
	function  drawScreen () {

		context.save;
		//context.fillStyle = '#EEEEEE';
		//context.globalCompositionOperation="lighter";
		context.fillRect(0, 0, theCanvas.width, theCanvas.height);
		//Box
		context.drawImage(bgPattern, 0, 0, 1285, 821);
		//context.strokeStyle = '#000000'; 
		//context.strokeRect(1,  1, theCanvas.width-2, theCanvas.height-2);
		
		update();
		testWalls();
		
		//doMouseMove();
		//collide();
		render();
		//context.drawImage(bgPattern, 0, 0, 200, 200);
		context.drawImage(bullsEye, (bullsEyeX -10), (bullsEyeY-11), 20, 21);
		
		//context.globalAlpha = 1;
		
		//context.globalCompositionOperation="destination-atop";
		//context.drawImage(pointImage,(ball.x)-10,(ball.y)-10,20,20);
		//bgGame();
		context.restore();
		//bgGame()
		
		
		//context.drawImage(bullsEye,10,10,50,50);
	}
	
	
	   function touchUp() {

            mouseIsDown = 0;

            // no touch to track, so just show state

            //showPos();

        }

 

        function mouseDown() {

            mouseIsDown = 1;

           // mouseXY();

        }

 

        function touchDown() {

            mouseIsDown = 1;

            touchXY();

        }
	
	 function touchXY(e) {

            e.preventDefault();

            bullsEyeX = e.targetTouches[0].pageX - wrapper.offsetLeft;

             bullsEyeY = e.targetTouches[0].pageY - wrapper.offsetTop;

            //showPos();

        }
	
	function doMouseMove(e){
		
			/*bullsEyeX = e.pageX - gameArea.offsetLeft;

            bullsEyeY = e.pageY - gameArea.offsetTop;*/
			
			bullsEyeX = e.pageX - wrapper.offsetLeft ; // bullsEye.width/2;

            bullsEyeY = e.pageY - wrapper.offsetTop  ; //bullsEye.height/2;
			
	        /*for (var i =0; i <balls.length; i++) {
				ball = balls[i];
				
				if(e.pageX >= ball.nextx -75 && e.pageX <= ball.nextx  + 75 
					&& e.pageY >= ball.nexty - 75 && e.pageY <= ball.nexty + 75){
					alert("");	
				}
				
			}*/
			//console.log(e.pageX +"---------------------mouse");
			//console.log(bullsEyeX +"---------------------object");
			//xpos.innerHTML = "xpos " + e.pageX;
			//ypos.innerHTML = "ypos " + e.pageY;
        }
		
		
		
	function update() {
		for (var i =0; i <balls.length; i++) {
			ball = balls[i];
			ball.nextx = (ball.x += ball.velocityx);
			ball.nexty = (ball.y += ball.velocityy);
		}
		
		
	}
	
	
	
	
	
	
	
	function testWalls() {
		
		var testBall;
		var currAng=new Array();
		
		for (var i =0; i <balls.length; i++) {
			ball = balls[i];
			
			if (balls[i].nextx+balls[i].radius > theCanvas.width) {
						balls[i].velocityx = balls[i].velocityx*-1;
						balls[i].nextx = theCanvas.width - balls[i].radius;
						
						 currAng[i] = tempRadians[i] * 180/Math.PI;
						
						if(currAng[i] > 270 && currAng[i] < 360)
						{
							currAng[i]=180+(360-currAng[i]);
						}
						else if(currAng[i]>0 && currAng[i] < 90)
						{
							currAng[i]=180-currAng[i];
						}
						tempRadians[i] = currAng[i] * Math.PI/ 180;
						
						//console.log("right=sss=="+currAng);
					}
					else if (balls[i].nextx-balls[i].radius < 0 ) {
						balls[i].velocityx = balls[i].velocityx*-1;
						balls[i].nextx =  balls[i].radius;
						
						currAng[i] = tempRadians[i] * 180/Math.PI;
						if(currAng[i] >90 && currAng[i] < 180)
						{
							currAng[i]=180-currAng[i];
						}
						else if(currAng[i]>180 && currAng[i]<270)
						{
							currAng[i]=270+(270-currAng[i]);
						}
						tempRadians[i] = currAng[i] * Math.PI/ 180;
						//console.log("left");
					}
					else if (balls[i].nexty+balls[i].radius > theCanvas.height ) {
						balls[i].velocityy = balls[i].velocityy*-1;
						balls[i].nexty = theCanvas.height - balls[i].radius;
						currAng[i] = tempRadians[i] * 180/Math.PI;
						if(currAng[i]<90)
						{
							currAng[i]=270+(90-currAng[i]);
						}
						else if(currAng[i]>90)
						{
							currAng[i]=180+(180-currAng[i]);
						}
						tempRadians[i] = currAng[i] * Math.PI/ 180;
						//console.log("bottom");
					} else if(balls[i].nexty-balls[i].radius < 0) {
						balls[i].velocityy = balls[i].velocityy*-1;
						balls[i].nexty =  balls[i].radius;
		
						currAng[i] = tempRadians[i] * 180/Math.PI;
						if(currAng[i] > 180 && currAng[i] < 270)
						{
							currAng[i]=90+(270-currAng[i]);
						}
						else if(currAng[i] > 270 && currAng[i] < 360)
						{
							currAng[i]=360-currAng[i];
						}
						tempRadians[i] = currAng[i] * Math.PI/ 180;
		
						//console.log("top===="+currAng);
		
						
					}
			
			
			if(bullsEyeX >= balls[i].nextx -20 && bullsEyeX <= balls[i].nextx  + 20 && bullsEyeY >= balls[i].nexty - 19 && bullsEyeY <= balls[i].nexty + 19){
						document.getElementById('canvasOne').removeEventListener("mousemove", doMouseMove);
						clearInterval(gameInterval);
						clearInterval(timeIntervalCounter);
						balls = [];
						//alert('game over');
						$("#bcakfilename").val('game_small.html');
						$("#playedTime").val(time.innerHTML);
						$("#playedLevel").val(speed.innerHTML);
						document.getElementById("front_game").submit();
			}
		
		
			
		}
	
	}
	
	
	
	function render() {
		
		for (var i =0; i <balls.length; i++) {
			ball = balls[i];
			ball.x = ball.nextx;
			ball.y = ball.nexty;
			
			context.save();
			context.translate(ball.x+0*8, ball.y+0*9);
			context.rotate(tempRadians[i]);
			
			context.drawImage(pointImage,-10,-9,19,18);
			context.restore();
		}
		
	}

	
	/*function collide() {
    	//var ball;
    	var testBall;
    	for (var i =0; i <balls.length; i++) {
        	ball = balls[i];
        	for (var j = i+1; j < balls.length; j++) {
              	testBall = balls[j];
                if (hitTestCircle(ball,testBall)) {
                    collideBalls(ball,testBall);
                 }
           	}
        }
  	}*/

	
	function hitTestCircle(ball1,ball2) {
     	var retval = false;
     	var dx = ball1.nextx - ball2.nextx;
     	var dy = ball1.nexty - ball2.nexty;
    	var distance = (dx * dx + dy * dy);
    	if (distance <= (ball1.radius + ball2.radius) * (ball1.radius + ball2.radius) ) {
     	      retval = true;
     	}
     	return retval;
  	}


	/*function collideBalls(ball1,ball2) {
	
 		var dx = ball1.nextx - ball2.nextx;
		var dy = ball1.nexty - ball2.nexty;
 
		var collisionAngle = Math.atan2(dy, dx);
 
		var speed1 = Math.sqrt(ball1.velocityx * ball1.velocityx + ball1.velocityy * ball1.velocityy);
		var speed2 = Math.sqrt(ball2.velocityx * ball2.velocityx + ball2.velocityy * ball2.velocityy);
 
		var direction1 = Math.atan2(ball1.velocityy, ball1.velocityx);
		var direction2 = Math.atan2(ball2.velocityy, ball2.velocityx);
 
		var velocityx_1 = speed1 * Math.cos(direction1 - collisionAngle);
		var velocityy_1 = speed1 * Math.sin(direction1 - collisionAngle);
		var velocityx_2 = speed2 * Math.cos(direction2 - collisionAngle);
		var velocityy_2 = speed2 * Math.sin(direction2 - collisionAngle);
		
		var final_velocityx_1 = ((ball1.mass - ball2.mass) * velocityx_1 + (ball2.mass + ball2.mass) * velocityx_2)/(ball1.mass + ball2.mass);
		var final_velocityx_2 = ((ball1.mass + ball1.mass) * velocityx_1 + (ball2.mass - ball1.mass) * velocityx_2)/(ball1.mass + ball2.mass);
 
		var final_velocityy_1 = velocityy_1;
		var final_velocityy_2 = velocityy_2;
 
		ball1.velocityx = Math.cos(collisionAngle) * final_velocityx_1 + Math.cos(collisionAngle + Math.PI/2) * final_velocityy_1;
		ball1.velocityy = Math.sin(collisionAngle) * final_velocityx_1 + Math.sin(collisionAngle + Math.PI/2) * final_velocityy_1;
		ball2.velocityx = Math.cos(collisionAngle) * final_velocityx_2 + Math.cos(collisionAngle + Math.PI/2) * final_velocityy_2;
		ball2.velocityy = Math.sin(collisionAngle) * final_velocityx_2 + Math.sin(collisionAngle + Math.PI/2) * final_velocityy_2;
 
  		ball1.nextx = (ball1.nextx += ball1.velocityx);
		ball1.nexty = (ball1.nexty += ball1.velocityy);
		ball2.nextx = (ball2.nextx += ball2.velocityx);
		ball2.nexty = (ball2.nexty += ball2.velocityy);
	}*/
	
	
	var maxSize = 5;
	var minSize = 5;
	var maxSpeed = maxSize+5;
	var balls = new Array();
	var tempBall;
	var tempX;
	var tempY;
	var tempSpeed;
	//var tempAngle;
	var tempRadius;
	//var tempRadians;
	var tempvelocityx;
	var tempvelocityy;
		
		
	var levelStart = setInterval(multiplier, 5000);	
   
	function multiplier(){
	speed.innerHTML = speedTest ;
	speedTest=speedTest+ 1;

	
	if (speedTest > 10){
		
		clearInterval(levelStart);
		clearInterval(gameInterval);
		clearInterval(timeIntervalCounter);
		//console.log('clear');
		
		}
	
	
	
	gameInterval = setInterval(drawScreen, 33);	
		
	
	
	
	}
	var tempAngle	=	new Array();
	var tempRadians	=	new Array();
	for (var i = 0; i < numBalls; i++) {
		
		var placeOK = false;
		while (!placeOK) {
			//tempX = tempRadius*3 + (Math.floor(Math.random()*theCanvas.width));
			tempY = 10;
			//tempX = 200;
			tempX = tempRadius*3 + (Math.floor(Math.random()*theCanvas.width));
			//tempY = tempRadius*3 + (Math.floor(Math.random()*theCanvas.height)-tempRadius*3);
			tempSpeed = 2;
			
					 tempAngle[i] =  Math.floor(Math.random()*360);
					//var tempAngle1 =  20;
					 tempRadians[i] = tempAngle[i] * Math.PI/ 180;
					tempvelocityx = Math.cos(tempRadians[i]) * tempSpeed;
					 //tempvelocityx =5;
					tempvelocityy = Math.sin(tempRadians[i]) * tempSpeed;	
					//tempvelocityy = 1;	
					tempBall = {x:tempX,y:tempY, nextX: tempX, nextY: tempY, radius:tempRadius, speed:tempSpeed, angle:tempAngle[i], velocityx:tempvelocityx, velocityy:tempvelocityy, mass:tempRadius};
			placeOK = canStartHere(tempBall);
			
			
			
			
		}
		balls.push(tempBall);
	}
	
	
	function canStartHere(ball) {
		var retval = true;
		for (var i =0; i <balls.length; i++) {
			if (hitTestCircle(ball, balls[i])) {
				retval = false;
			}
		}
		return retval;
	}
	var timeIntervalCounter = setInterval (timeCounter,1000);
	function timeCounter (){
	time.innerHTML = timeInterval
	timeInterval=timeInterval+ 1;}
  // var gameInterval = setInterval(drawScreen, 33);	
	multiplier()
}
