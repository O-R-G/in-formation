function rotate_menu() {

    f1 = document.getElementsByClassName("f1")[0];
    f2 = document.getElementsByClassName("f2")[0];
    f3 = document.getElementsByClassName("f3")[0];
    
    f1.className = "f3";
    f2.className = "f1";
    f3.className = "f2";
}


function change_color() {

    f1 = document.getElementsByClassName("f1")[0];
    f2 = document.getElementsByClassName("f2")[0];
    f3 = document.getElementsByClassName("f3")[0];
    
    f1.style.background = "#F00";
    f2.style.background = "#090";
    f3.style.background = "#00F";

    f1.style.opacity= "0.5";
    f2.style.opacity= "0.5";
    f.style.opacity= "0.5";
}
