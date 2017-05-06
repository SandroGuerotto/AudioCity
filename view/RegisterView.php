<?php
include_once "../model/CustomSession.php";
if (CustomSession::getInstance()->getCurrentUser() != null ){
    echo '<script> activateTab("view/LibView.php")</script> ';
    return;
}
?>

<div class="padding-top-128 center">
    <div class="container padding-32 light-gray">
        <div class="third">&nbsp;</div>
        <div class="row-padding third" style="margin-top:64px">
            <h3>Registration</h3>
            <form onsubmit="register(); return false;" method="get" action="javascript:void(0);" name="registerForm" id="registerForm">
                <p><input type="text" name="forename" id="forename" class="input border" required="required" placeholder="Vorname"></p>
                <p><input type="text" name="name" id="name" class="input border" required="required" placeholder="Name"></p>
                <p><input type="email" name="email" id="email" class="input border" required="required" placeholder="E-Mail"></p>
                <p>&nbsp;</p>
                <p><input type="text" name="username" id="username" class="input border" required="required" placeholder="Benutzername"></p>
                <p><input type="password" name="password" id="password" class="input border" required="required" placeholder="Passwort"> </p>
                <p><input type="password" name="passwordtwo" id="passwordtwo" class="input border" required="required" placeholder="Passwort wiederholen"></p>
                <p id="error-msg" class="text-red margin-0 left-align hide" >Benutzername oder Passwort falsch</p>
                <button class="button" type="submit" id="registerButton" name="registerButton"><i class="fa fa-user-plus margin-right"></i>Registrieren</button>
            </form>
        </div>
        <div class="third">&nbsp;</div>
    </div>
</div>