function rotate_menu() {

    f1 = document.getElementsByClassName("f1")[0];
    f2 = document.getElementsByClassName("f2")[0];
    
    f1.className = "f2";
    f2.className = "f1";
}

function change_color() {

    f1 = document.getElementsByClassName("f1")[0];
    f2 = document.getElementsByClassName("f2")[0];
    
    f1.style.color = "#F00";
    f2.style.color = "#00F";
}
