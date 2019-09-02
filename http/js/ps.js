
function sb_toggle() {
    if (document.getElementById("sidebar").style.display === "block") {
        document.getElementById("sidebar").style.display = "none";
        document.getElementById("btn-toggler").className = "fa fa-bars";
    }
    else {
        document.getElementById("sidebar").style.display = "block";
        document.getElementById("sidebar").focus();
        document.getElementById("btn-toggler").className = "fa fa-times";
    }
}

function control_toggle() {
    if (document.getElementById("control-pane").style.display === "block") {
        document.getElementById("control-pane").style.display = "none";
        document.getElementById("toggle-control").className = "fa fa-bars";
    }
    else {
        document.getElementById("control-pane").style.display = "block";
        document.getElementById("control-pane").focus();
        document.getElementById("toggle-control").className = "fa fa-times";
    }
}

/** Facebook */

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.1';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));