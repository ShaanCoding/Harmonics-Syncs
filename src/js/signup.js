function add_user(_name, _username, _password, _roles, _gender, _bio, _pfp, _genres, _songs, _level, callback) {
    contact_api(
{
            m: 1,
            name: _name,
            user: _username,
            pass: _password,
            roles: _roles,
            gender: _gender,
            bio: _bio,
            pfp: _pfp,
            genre: _genres,
            songs: _songs,
            level: _level
        },
        callback
    );
}

$(document).ready(

    function () {

        $("form").submit(
            function (e) {
                e.preventDefault();

                let name = $("#name").val();
                let user = $('#username').val();
                let pass = $('#password').val();
                let roles = $('#roles').val();
                let gender = $('#gender').val();
                let bio = $('#biography').val();
                let pfp = $('#profile').val();
                let genres = $('#genres').val(); // convert to json
                let songs = $('#songs').val(); // convert to json
                let level = $('#level').val();


                add_user(name, user, pass, roles, gender, bio, pfp, genres, songs, level ,
                    function (data, status) {
                        if (status == 'success' && data == 'success') {
                            // redirect to explore
                            console.log("Added!");
                            
                        } else {
                            // throw an error
                            console.log(data);
                        }
                    });

            }
        );

    }

);