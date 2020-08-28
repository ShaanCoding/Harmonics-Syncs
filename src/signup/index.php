<html>
    <head>
        <title> Harmonics - Sign Up </title>
    </head>

    <?php
        require_once("../include/utils.php");
        /*
            Data Required Here:
            Username
            Name
            Password
            Confirm Password
            Roles
            Gender
            Bio
            Profile Pic (Upload)
            Genres Done
            Linked music / songs
            Commitment level (hobbiest / professional)
        */

        //Variable decloration
        $userName = ValidPost('userName');
        $name = ValidPost('name');
        $password = ValidPost('password');

        $profilePicture = ValidPost('profilePicture');
        $roles = ValidPost('roles');
        $gender = ValidPost('gender');
        $biography = ValidPost('biography');
        $genres = ValidPost('genres');
        $linkedMusic = ValidPost('linkedMusic');
        $commitmentLevel = ValidPost('commitmentLevel');
        $linkedMusic = validPost('linkedMusic');


        if(!usernameValidation($userName) && strlen($userName) > 0)
        {
            echo "The username must have only numbers, letters and underscores, no additional characters </br>";
        }

        if(!nameValidation($name) && strlen($name) > 0)
        {
            echo "The name is incorrect, must only contains letters a-z with capitals and or spaces </br>";
        }

        if(!passwordValidation($password) && strlen($password) > 0)
        {
            echo "The password is incorrect, length must be greater than or equal to five, contain at least one uppercase letter and at least one number OR symbol </br>";
        }

        

        function usernameValidation($userName)
        {
            //Restricts username to having numbers, letters & underscores
            return preg_match('/[^a-zA-Z0-9_]/', $userName) == 0;
        }

        function nameValidation($name)
        {
            //Restricts to just a-z with capitals and spaces
            return preg_match("/^([a-zA-Z' ]+)$/", $name);
        }

        function passwordValidation($password)
        {
            //Returns a true or false statement dependent if the password is valid or not
            //Password >= 5
            //include uppercase, numbers OR symbols
            return (strlen($password) >= 5 && preg_match('/[A-Z]/', $password) &&
                    (preg_match('/\d/', $password) || preg_match('/[^a-zA-Z\d]/', $password)));
        }

    ?>

    <body>
        <form method="post">
            <table border="0">

                <tr>
                    <td>Username:</td>
                    <td align="center"><input type="text" name="userName" size="30"/></td>
                </tr>

                <tr>
                    <td>Name:</td>
                    <td align="center"><input type="text" name="name" size="30"/></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td align="center"><input type="password" name="password" size="30"/></td>
                </tr>

                <tr>
                    <td>Roles:</td>
                    <td align="center"><input type="text" name="roles" size="30"/></td>
                </tr>

                <tr>
                    <td>Gender:</td>
                    <td align="center">
                        <select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Biography:</td>
                    <td align="center"><input type="text" name="biography" size="30"/></td>
                </tr>

                <tr>
                    <td>Profile Picture:</td>
                    <td align="center"><input type="text" name="profilePicture" size="30"/></td>
                </tr>

                <tr>
                    <td>Genres:</td>
                    <td align="center"><input type="text" name="genres" size="30"/></td>
                </tr>

                <tr>
                    <td>Linked Music:</td>
                    <td align="center"><input type="text" name="linkedMusic" size="30"/></td>
                </tr>

                <tr>
                    <td>Commitment Level:</td>
                    <td align="center">
                        <select name="commitmentLevel">
                            <option value="hobbiest">Hobbiest</option>
                            <option value="professional">Professional</option>
                        </select>
                    </td>
                </tr>
            
                <tr>
                    <td align="center">
                        <button>Submit<button>
                    </td>
                </tr>

            </table>
        </form>
    </body>
</html>