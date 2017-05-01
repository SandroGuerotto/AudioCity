function searchByText() {
    var genericFormData = new FormData($("form")[0]);
    $.ajax({
        type: 'POST',
        url: 'input/SearchInput.php',
        data: genericFormData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            $('#grid').html(data);
            // alert(data);
        },
        error: function (request, status, error) {

        }
    });
}