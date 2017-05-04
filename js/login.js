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
    $.ajax({
        type: 'POST',
        url: 'input/LogoutInput.php',
        success: function (data) {
            loginStatusChanged();
        }
    });
}

function register() {
    var genericFormData = new FormData($("form")[0]);

    var previousValue = $('#registerButton').html();
    $('#registerButton').html('...').prop( "disabled", true);

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
            $('#password').addClass('error');
            $('#forename').addClass('error');
            $('#name').addClass('error');
            $('#email').addClass('error');
            $('#passwordtwo').addClass('error');
            $('#error-msg').removeClass('hide');
            setTimeout(function() {
                $('#registerButton').html(previousValue).prop( "disabled", false);
            }, 750)
        }
    });
}

function loginStatusChanged() {
    window.location.pathname = '/audiocity';
    console.log(window.location.pathname);
    location.reload(true);
    console.log(window.location.pathname);
}