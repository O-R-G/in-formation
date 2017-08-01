// event listener (logo)

var logo = document.getElementById('logo');
logo.addEventListener("click", function(e) {

    // better in global scope?
    var menu = document.getElementById('menu');
    var docket = document.getElementById('docket');
    var information = document.getElementById('in-formation');

    if (menu && menu.style.display != "block") {
        menu.style.display = "block";
        docket.style.display = "none";
        // information.innerHTML = "Institute of Contemporary Arts";
        information.innerHTML = "Menu";
    } else {
        menu.style.display = "none";
        docket.style.display = "block";
        information.innerHTML = "01/08/2017";
    }
}, false);
