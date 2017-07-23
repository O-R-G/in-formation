var xAngle = 0, yAngle = 0;

function rotate_left(degrees) {
      yAngle -= 90;
}

function rotate_right(degrees) {
      yAngle += 90;
}

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
  
document.getElementById('cube').style.webkitTransform = 
"rotateX("+xAngle+"deg) rotateY("+yAngle+"deg)";
}, false);
