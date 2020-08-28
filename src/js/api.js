let api_point = "../api/index.php";

function contact_api(data, callback) {
    $.get(api_point, data, callback);
}
