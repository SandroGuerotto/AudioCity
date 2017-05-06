// Toggle between showing and hiding the sidenav when clicking the menu icon
function menu_open() {
    var mySidenav = document.getElementById("mySidenav");
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
    } else {
        mySidenav.style.display = 'block';
    }
}

// Close the sidenav with the close button
function menu_close() {
    var mySidenav = document.getElementById("mySidenav");
    mySidenav.style.display = "none";
}
// navigate to next requested page
function activateTab(contentPath){
    if(contentPath == 'view/HomeView.php'){
        $('#home').load('view/header_img.html');
        $('#myNavbar').removeClass('white');
        $('#home').show();
    }else{
        $('#home').hide();
        $('#myNavbar').addClass('white');
    }

    $('#mainContent').load(window.location.pathname == '/audiocity' ? '/audiocity/'+ contentPath : contentPath).hide().fadeIn(500);
    rewriteURL(contentPath);
    $('html,body').scrollTop(0);
}

function  rewriteURL(path) {
    switch (path){
        case "view/LoginView.php":
            window.history.pushState("", "", '/audiocity/login');
            break;
        case "view/RegisterView.php":
            window.history.pushState("", "", '/audiocity/register');
            break;
        case "view/DiscoverView.php":
            window.history.pushState("", "", '/audiocity/discover');
            break;
        case "view/LibView.php":
            window.history.pushState("", "", '/audiocity/mymusic');
            break;
        case "view/HomeView.php":
            window.history.pushState("", "", '/audiocity');
            break;

    }
}
