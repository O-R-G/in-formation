// var isHidden;
var scrollPos = 0;

function showHide()
{
	var cols = document.getElementsByClassName("column-container");
	var body = document.getElementById("body");
	var header = document.getElementById("header");
	if(isHidden)
	{
		scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
		// show the menu
		for(var i = 0; i < cols.length; i++)
			cols[i].className = cols[i].className.replace( /(?:^|\s)hidden(?!\S)/g , ' visible' );
		header.className = header.className.replace( /(?:^|\s)hidden(?!\S)/g , ' visible' );
		body.className = body.className.replace( /(?:^|\s)visible(?!\S)/g , ' hidden' );
		close_clock();
		// fill_circle();
		window.scrollTo(0, 0);
		
	}
	else
	{
		// hide the menu
		for(var i = 0; i < cols.length; i++)
			cols[i].className = cols[i].className.replace( /(?:^|\s)visible(?!\S)/g , ' hidden' );
		header.className = header.className.replace( /(?:^|\s)visible(?!\S)/g , ' hidden' );
		body.className = body.className.replace( /(?:^|\s)hidden(?!\S)/g , ' visible' );
		open_clock();
		window.scrollTo(0, scrollPos);
	}
	
	isHidden = !isHidden;
}


function setCookie(cname, cvalue, exdays)
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function expireCookie(name)
{
	if (getCookie(name) != "")
	{
		document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
		return true;
	} 
	else
		return false;
}

function getCookie(name)
{
	var cname = name + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ')
			c = c.substring(1);
		if (c.indexOf(cname) != -1) 
			return c.substring(cname.length,c.length);
	}
	return "";
}

function checkCookie(name)
{
	if (getCookie(name) != "")
		return true;
	else
		return false;
}

// event listener (logo)

var ica = document.getElementById('ica');

ica.addEventListener("click", function(e) {
    var docket = document.getElementById('docket');
    var menu = document.getElementById('docket');
    menu.style.display = "block";
    docket.style.display = "none";
    alert(e);
}, false);
