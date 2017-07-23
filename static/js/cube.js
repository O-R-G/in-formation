// globals

var xAngle = 0, yAngle = 0;
var cube = document.getElementById('cube');

// gyroscope 
// chrome complains about this not being done of https

window.addEventListener("deviceorientation", function(e) {        
    var tilt = 0 - e.gamma;
    device_orientation_handler(tilt);
}, false);

function device_orientation_handler(tilt) {
    cube.style.transform = " rotateY("+ tilt +"deg)";
    cube.style.webkitTransform  = " rotateY("+ tilt +"deg)";
}

// controls

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
    document.getElementById('cube').style.webkitTransform = "rotateX("+xAngle+"deg) rotateY("+yAngle+"deg)";
}, false);

document.getElementById('control').addEventListener('click', function() { 
    device_orientation_handler(500);
    // yAngle += 90;
    // document.getElementById('cube').style.webkitTransform = "rotateX("+xAngle+"deg) rotateY("+yAngle+"deg)";
}, false);

