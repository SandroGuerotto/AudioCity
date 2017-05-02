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
    $('#mainContent').load(contentPath).hide().fadeIn(500);
}
// default starting script when loading index page
$(function() {
    $('#home').load('view/header_img.html');
    activateTab('view/HomeView.php');
});