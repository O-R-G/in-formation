// event listener (logo)

var logo = document.getElementById('logo');
var menu = document.getElementById('menu');
var docket = document.getElementById('docket');
var information = document.getElementById('in-formation');

logo.addEventListener("click", function(e) {

    if (menu && menu.style.display != "block") {
        menu.style.display = "block";
        docket.style.display = "none";
        information.innerHTML = "Institute of Contemporary Arts";
        // information.innerHTML = "Menu";
    } else {
        menu.style.display = "none";
        docket.style.display = "block";
        information.innerHTML = date;   // date is global, set in head.php
    }
}, false);
