// globals

var xAngle = 0, yAngle = 0;
var cube = document.getElementById('cube');
var alpha, beta, gamma;     // gyrscope x, y, z (z is like y on iphone, points straight up)
var touchx;

// event listeners

// chrome complains about this not being done of https
// window? document?

window.addEventListener("deviceorientation", function(e) {        
    var gain = 5.0;
    alpha = 0 - e.alpha * gain;
    beta = 0 - e.beta * gain;
    gamma = 0 - e.gamma * gain;
    // device_orientation_handler_xyz(alpha, beta, gamma);
    // device_orientation_handler_xyz(0, gamma, 0);
    // device_orientation_handler_limit(gamma);
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
    document.getElementById('cube').style.transform = "rotateX("+xAngle+"deg) rotateY("+yAngle+"deg)";
}, false);

if (thiscontrol = document.getElementById('control')) {
    thiscontrol.addEventListener('click', function() {
        device_orientation_handler(500);
        // yAngle += 90;
        // document.getElementById('cube').style.webkitTransform = "rotateX("+xAngl$
    }, false);
}

/*
window.addEventListener("touchstart", function(e) {        
    touchx = e.touches[0].clientX;                                      
}, false);

window.addEventListener("touchmove", function(e) {
    if (!touchx) return;
    var touchx_up = e.touches[0].clientX;                                    
    var touchx_diff = touchx - touchx_up;
    if ( touchx_diff > 50 )
        yAngle -= 90;
    else
        yAngle += 90;
    document.getElementById('cube').style.transform = "rotateX("+xAngle+"deg) rotateY("+yAngle+"deg)";
    touchx = null;
}, true);
*/

// display

function device_orientation_handler(tilt) {
    cube.style.transform = " rotateX("+ tilt +"deg)";
    cube.style.webkitTransform  = " rotateX("+ tilt +"deg)";
    cube.style.transform = " rotateY("+ tilt +"deg)";
    cube.style.webkitTransform  = " rotateY("+ tilt +"deg)";
    cube.style.transform = " rotateZ("+ tilt +"deg)";
    cube.style.webkitTransform  = " rotateZ("+ tilt +"deg)";
}

function device_orientation_handler_xyz(alpha, beta, gamma) {
    cube.style.transform = " rotateX("+ alpha +"deg) rotateY("+ beta +"deg) rotateZ("+ gamma +"deg)";
    cube.style.webkitTransform = " rotateX("+ alpha +"deg) rotateY("+ beta +"deg) rotateZ("+ gamma +"deg)";
}

function device_orientation_handler_limit(gamma) {
    if (gamma > 45) 
        yAngle = 90;
    else if (gamma < -45) 
        yAngle = -90;
    else 
        yAngle = 0;
    cube.style.transform = " rotateY("+ yAngle + "deg)";
}
