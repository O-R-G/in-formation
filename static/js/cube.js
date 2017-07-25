// globals

var xAngle = 0, yAngle = 0;
var cube = document.getElementById('cube');


// event listeners

// chrome complains about this not being done of https
// window? document?

window.addEventListener("deviceorientation", function(e) {        
    var tilt = 0 - e.gamma;
    device_orientation_handler(tilt);
}, false);

document.addEventListener('keydown', function(e) {
  switch(e.keyCode) {
    case 37: // left
      yAngle -= 90;
      break;
    case 38: // up
      xAngle += 90;
      break;
    case 39: // right
      yAngle += 90;
      break;
    case 40: // down
      xAngle -= 90;
      break;
    };
    // 'webkitTransform'?
    document.getElementById('cube').style.webkitTransform = "rotateX("+xAngle+"deg) rotateY("+yAngle+"deg)";
}, false);

document.getElementById('control').addEventListener('click', function() { 
    device_orientation_handler(500);
    // yAngle += 90;
    // document.getElementById('cube').style.webkitTransform = "rotateX("+xAngle+"deg) rotateY("+yAngle+"deg)";
}, false);


// display

function device_orientation_handler(tilt) {
    cube.style.transform = " rotateX("+ tilt +"deg)";
    cube.style.webkitTransform  = " rotateX("+ tilt +"deg)";
    cube.style.transform = " rotateY("+ tilt +"deg)";
    cube.style.webkitTransform  = " rotateY("+ tilt +"deg)";
    cube.style.transform = " rotateZ("+ tilt +"deg)";
    cube.style.webkitTransform  = " rotateZ("+ tilt +"deg)";
}
