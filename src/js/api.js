let api_point = "api/index.php";

function contact_api(data, callback) {
    $.post(api_point, data, callback);
}