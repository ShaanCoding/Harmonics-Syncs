<?php

/**
 * Display page for signup
 * 
 * @author Jacky Wu
 * @author Shaan Khan
 * 
 */

require_once("../include/utils.php");

?>

<html>
    <head>
        <title> Harmonics - Sign Up </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <form method="get">
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