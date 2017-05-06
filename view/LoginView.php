<?php
    include_once "../model/CustomSession.php";
    if (CustomSession::getInstance()->getCurrentUser() != null ){
        echo '<script> activateTab("view/LibView.php")</script> ';
        return;
    }
?>
<div class="login-padding-top-128 center">
    <div class="container padding-32 light-gray">
        <div class="third">&nbsp;</div>
        <div class="row-padding third" style="margin-top:64px">
            <h3>Login</h3>
            <form onsubmit="login(); return false;" method="get" action="javascript:void(0);" name="loginForm" id="loginForm">
                <p><input type="text" name="username" id="username" class="input border" required="required" placeholder="Benutzername" ></p>
                <p><input type="password" name="password" id="password" class="input border" required="required" placeholder="Passwort"></p>
                <p id="error-msg" class="text-red margin-0 left-align hide" >Benutzername oder Passwort falsch</p>
                <button class="button" type="submit" id="loginButton" name="loginButton"><i class="fa fa-paper-plane margin-right"></i>Einloggen </button>
                <p class="opacity padding-12">Noch nicht registriert?
                    <span class="text-dark-blue link" onclick="activateTab('view/RegisterView.php')">Account erstellen</span>
                </p>
            </form>
        </div>
        <div class="third">&nbsp;</div>
    </div>
</div>