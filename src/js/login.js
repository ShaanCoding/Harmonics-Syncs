function log_in(_user, _pass, callback) {
    contact_api(
        {
            m: 2,
            user: _user,
            pass: _pass
        },
        callback
    );
}

$(document).ready(
    function () {
        
        $("form").submit(
            function (e) {
                e.preventDefault();

                let name = $("#username").val();
                let pass = $('#password').val();

                console.log(name);
                console.log(pass);

                log_in(name, pass, function (data, status) {
                    if (status == "success" && data == "success") {
                        window.location.href = "../main/explore.php";
                    } else {
                        console.log(data);
                    }
                });

            }
        );

    }
);
