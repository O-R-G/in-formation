function next_rotate() {

    f1 = document.getElementsByClassName("f1")[0];
    f2 = document.getElementsByClassName("f2")[0];
    f3 = document.getElementsByClassName("f3")[0];
    
    f1.className = "f3";
    f2.className = "f1";
    f3.className = "f2";
}

function update_rotateY(face, degrees) {

    var thisface = "f" + face;
    var thisupdate = "rotateY(" + degrees + "deg)";

    var f = document.getElementsByClassName(thisface)[0];
    f.style.transform = thisupdate;
}

// global state variables
// should these be encapsulated and passed back and forth?
// ** perhaps ** ** fix **


var f1_Y = 0;
var f2_Y = 120;
var f3_Y = 240;

function update_cube(degrees) {

    // assumes 3 faces for now
    // and only around Y axis
    // this should use arrays and a loop for crissakes
    
    f1_Y += degrees;
    f2_Y += degrees;
    f3_Y += degrees;
    
    /*
    var thisupdatef1 = "rotateY(" + f1_Y + "deg)";
    var thisupdatef2 = "rotateY(" + f2_Y + "deg)";
    var thisupdatef3 = "rotateY(" + f3_Y + "deg)";
    */

    var thisupdatef1 = "rotateY(" + f1_Y + "deg) translateX(300px)";
    var thisupdatef2 = "rotateY(" + f2_Y + "deg) translateX(300px)";
    var thisupdatef3 = "rotateY(" + f3_Y + "deg) translateX(300px)";

    f1 = document.getElementsByClassName("f1")[0];
    f2 = document.getElementsByClassName("f2")[0];
    f3 = document.getElementsByClassName("f3")[0];

    f1.style.transform = thisupdatef1;
    f2.style.transform = thisupdatef2;
    f3.style.transform = thisupdatef3;

    f1.style.opacity = 1.0;
}




// or maybe better to use object -- 
// cube object, 6 faces, each with x, y, z rotate values

function makeCube(size) {

    // returns a cube object with array of 6 faces
    // each with x,y,z rotation values in degrees
    // and offsets in pixels

    var thiscube = {};
    thiscube.faces = [                        
        {x:0,   y:0,    z:0,    xoff:0}, 
        {x:0,   y:90,   z:0,    xoff:size}, 
        {x:0,   y:180,  z:0,    xoff:0}, 
        {x:0,   y:270,  z:0,    xoff:0}, 
        {x:-90, y:0,    z:0,    xoff:0}, 
        {x:90,  y:0,    z:0,    xoff:0} 
    ];
    thiscube.size = size;

    return thiscube;
}

var cube = makeCube(200);

function readCube(thiscube) {
    // alert(thiscube.size);
    alert(thiscube.faces[1].xoff);
}
