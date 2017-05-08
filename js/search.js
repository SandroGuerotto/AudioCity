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
            $('#grid').html(data);
        },
        error: function (request, status, error) {

        }
    });
}
function searchById(musicid) {
    console.log((musicid));
    $.ajax({
        type: 'POST',
        url: 'input/SearchInput.php',
        data: "id="+musicid,
        cache: false,
        processData: false,
        success: function (data) {
            $('#grid').html(data);
        },
        error: function (request, status, error) {

        }
    });
}