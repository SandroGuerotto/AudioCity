<!DOCTYPE html>
<?php
require_once("model/CustomSession.php");
$session = CustomSession::getInstance();
/** @var User $currentUser */
$currentUser = $session->getCurrentUser();
?>
<html>
<?php include_once "header/header.php"; ?>
<body>

<!-- Navbar (sit on top) -->
<div class="top">
  <div class="bar card-2 " id="myNavbar">
    <a href="#home" onclick="activateTab('view/HomeView.php')" class="bar-item button wide"><img src="images/logo_icon.png" class="logo"/>AudioCity</a>
    <!-- Right-sided navbar links -->
    <div class="right hide-small">
      <a href="#about" class="bar-item button">ABOUT</a>
      <a href="#" onclick="activateTab('view/LibView.php')"class="bar-item button"><i class="fa fa-search"></i>DISCOVER</a>
      <a href="#" onclick="<?= $currentUser != null ? " activateTab('view/library.php')" : " activateTab('view/LoginView.php')" ?>" class="bar-item button"><i class="fa fa-th"></i>MY MUSIC</a>
      <a href="#" onclick="<?= $currentUser != null ? " logout()" : " activateTab('view/LoginView.php')" ?>"  class="bar-item button"><i <?= $currentUser != null ? " class=\"fa fa-sign-out\"" : " class=\"fa fa-sign-in\"" ?> ></i> <?= $currentUser != null ? "LOGOUT" : "LOGIN" ?></a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="menu_open()">
      <i class="fa fa-bars padding-right padding-left"></i>
    </a>
  </div>
</div>

<!-- Sidenav on small screens when clicking the menu icon -->
<nav class="sidenav black card-2 animate-left hide-medium hide-large" style="display:none" id="mySidenav">
    <a href="javascript:void(0)" onclick="menu_close()" class="large padding-16"><i class="fa fa-times"></i> Close </a>
    <a href="#about" onclick="menu_close()">ABOUT</a>
    <a href="#" onclick="menu_close();activateTab('view/LibView.php')">DISCOVER</a>
    <a href="#" onclick="menu_close();<?= $currentUser != null ? " activateTab('view/library.php')" : " activateTab('view/LoginView.php')" ?>">MY MUSIC</a>
    <a href="#" onclick="<?= $currentUser != null ? " logout()" : " activateTab('view/LoginView.php')"?>;menu_close()"><?= $currentUser != null ? "LOGOUT" : "LOGIN" ?></a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 display-container grayscale-min" id="home">
</header>
<!-- content will be loaded in here -->
<div id="mainContent">
</div>

</body>
</html>