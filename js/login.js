function login() {
    var genericFormData = new FormData($("form")[0]);

    var previousValue = $('#loginButton').html();
    $('#loginButton').html('...').prop( "disabled", true);

    $.ajax({
        type: 'POST',
        url: 'input/LoginInput.php',
        data: genericFormData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#loginButton').html('Erfolgreich');
            loginStatusChanged();
        },
        error: function (request, status, error) {
            $('#loginButton').html('Einloggen');
            $('#username').addClass('error');
            $('#password').addClass('error');
            $('#error-msg').removeClass('hide');
            setTimeout(function() {
                $('#loginButton').html(previousValue).prop( "disabled", false);
            }, 750)
        }
    });
}

function logout() {
    var path = window.location.pathname === '/audiocity' ? '/audiocity/'+ 'input/LogoutInput.php' : 'input/LogoutInput.php';
    $.ajax({
        type: 'POST',
        url: path,
        success: function (data) {
            activateTab('view/HomeView.php');
            loginStatusChanged();
        }
    });
}

function register() {

    if($('#passwordtwo').val() != $('#password').val()){
        $('#passwordtwo').addClass('error');
        $('#password').addClass('error');
        $('#error-msg').removeClass('hide');
        $('#error-msg').text("Beide Passwörter müssen gleich sein!");
        setTimeout(function() {
            $('#registerButton').html(previousValue).prop( "disabled", false);
        }, 750)
        return;
    }

    var genericFormData = new FormData($("form")[0]);

    var previousValue = $('#registerButton').html();
    $('#registerButton').html('...').prop( "disabled", true);
    console.log(genericFormData);
    $.ajax({
        type: 'POST',
        url: 'input/RegisterInput.php',
        data: genericFormData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#registerButton').html('Erfolgreich');
            loginStatusChanged();
        },
        error: function (request, status, error) {

            $('#registerButton').html('Einloggen');
            $('#username').addClass('error');
            $('#mail').addClass('error');
            $('#error-msg').removeClass('hide');
            $('#error-msg').text("Benutzername oder Email existiert bereit!");
            setTimeout(function() {
                $('#registerButton').html(previousValue).prop( "disabled", false);
            }, 750)
        }
    });
}

function loginStatusChanged() {
    location.reload(true);
}