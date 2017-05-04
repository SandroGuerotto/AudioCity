$(document).ready(function(){

    console.log(window.location.pathname);
    switch (window.location.pathname){
        case "/audiocity/login":
            activateTab("view/LoginView.php");
            break;
        case "/audiocity/register":
            activateTab("view/RegisterView.php");
            break;
        case "/audiocity/discover":
            activateTab("view/DiscoverView.php");
            break;
        case "/audiocity/mymusic":
            activateTab("view/LibView.php");
            break;
        default:
            activateTab("view/HomeView.php");
            break;
    }
});