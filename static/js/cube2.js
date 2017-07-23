function next_rotate() {

    f1 = document.getElementsByClassName("f1")[0];
    f2 = document.getElementsByClassName("f2")[0];
    f3 = document.getElementsByClassName("f3")[0];
    
    f1.className = "f3";
    f2.className = "f1";
    f3.className = "f2";
}

var xAngle = 0, yAngle = 0;
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
