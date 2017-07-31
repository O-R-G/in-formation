// event listener (logo)

var logo = document.getElementById('logo');
logo.addEventListener("click", function(e) {

    var menu = document.getElementById('menu');
    var docket = document.getElementById('docket');

    if (menu && menu.style.display != "block") {
        menu.style.display = "block";
        docket.style.display = "none";
    } else {
        menu.style.display = "none";
        docket.style.display = "block";
    }
}, false);
