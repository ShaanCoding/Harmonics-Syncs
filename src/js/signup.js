
function add_user(name, username, password)
{

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
                let genres = $('#genres').val();
                let songs = $('#songs').val();
                let levels = $('#level').val();


                console.log(name);
                console.log(user);
                console.log(pass);
                console.log(roles);
                console.log(gender);
                console.log(bio);
                console.log(pfp);
                console.log(genres);
                console.log(songs);
                console.log(levels);


            }
        );

    }

);