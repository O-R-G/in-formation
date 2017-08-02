// this is almost exactly the same as cube.js
// could just pass a parameter for what to adjust


// globals

var x_angle = 0, y_angle = 0;
var logo = document.getElementById('logo');
var logo_r = document.getElementById('logo-r');
var logo_g = document.getElementById('logo-g');
var logo_b = document.getElementById('logo-b');
var alpha, beta, gamma;     // gyrscope x, y, z (z is like y on iphone, points straight up)

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
    // device_orientation_handler_logo_r(alpha);
    // device_orientation_handler_logo_g(beta);
    // device_orientation_handler_logo_b(gamma);
    // device_orientation_handler_logo_rgb(gamma);
    device_orientation_handler_logo_rgb_xy(gamma, beta);
    // device_orientation_handler_logo_rgb_xy(0, beta);
}, false);

/*
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
    };
    document.getElementById('cube').style.transform = "rotateX("+x_angle+"deg) rotateY("+y_angle+"deg)";
}, false);
*/

// display

function device_orientation_handler_logo_r(gamma) {
    logo_r.style.left = gamma + "px";
}

function device_orientation_handler_logo_g(gamma) {
    logo_g.style.left = gamma + "px";
}

function device_orientation_handler_logo_b(gamma) {
    logo_b.style.left = gamma + "px";
}

function device_orientation_handler_logo_rgb(gamma) {
    logo_r.style.left = gamma * .2 + "px";
    logo_g.style.left = gamma * .1 + "px";
    logo_b.style.left = gamma * .05 + "px";
}

function device_orientation_handler_logo_rgb_xy(x_offset, y_offset) {
    var gain = .25;
    logo_r.style.left = x_offset * .2 * gain + "px";
    logo_g.style.left = x_offset * .1 * gain + "px";
    logo_b.style.left = x_offset * .05 * gain + "px";
    logo_r.style.top = y_offset * .2 * gain + "px";
    logo_g.style.top = y_offset * .1 * gain + "px";
    logo_b.style.top = y_offset * .05 * gain + "px";
}


