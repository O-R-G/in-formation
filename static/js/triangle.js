// this is almost exactly the same as cube.js
// could just pass a parameter for what to adjust


// globals

var x_angle = 0, y_angle = 0;
var triangle = document.getElementById('triangle');
var triangle_r = document.getElementById('triangle-r');
var triangle_g = document.getElementById('triangle-g');
var triangle_b = document.getElementById('triangle-b');
var alpha, beta, gamma;     // gyrscope x, y, z (z is like y on iphone, points straight up)
var gamma = 0.0;
// event listeners

// chrome complains about this not being done of https
// window? document?

window.addEventListener("deviceorientation", function(e) {        
    var gain = 5.0;
    alpha = 0 - e.alpha * gain;
    beta = 0 - e.beta * gain;
    gamma = 0 - e.gamma * gain;
    device_orientation_handler_triangle_rgb(gamma);
}, false);

document.addEventListener('keydown', function(e) {
  switch(e.keyCode) {
    case 37: // left
      y_angle -= 90;
      break;
    case 38: // up
      x_angle += 90;
      break;
    case 39: // right
      y_angle += 90;
      break;
    case 40: // down
      x_angle -= 90;
      break;
    case 188: // lessthan
      gamma -= 20;
      break;
    case 190: // greaterthan
      gamma += 20;
      break;
    };
    device_orientation_handler_triangle_rgb(gamma);
    rotate_handler_triangle_rgb(beta);
}, false);

// display

function device_orientation_handler_triangle_rgb(gamma) {
    console.log(gamma);
    triangle_r.style.left = gamma * .2 + "px";
    triangle_g.style.left = gamma * .1 + "px";
    triangle_b.style.left = gamma * .05 + "px";
}

function rotate_handler_triangle_rgb(beta) {
    console.log(gamma);
    triangle_r.style.transform = "rotateX("+x_angle+"deg) rotateY("+y_angle+"deg)";
    triangle_g.style.transform = "rotateX("+x_angle+"deg) rotateY("+y_angle*.5+"deg)";
    triangle_b.style.transform = "rotateX("+x_angle+"deg) rotateY("+y_angle*.25+"deg)";
}



