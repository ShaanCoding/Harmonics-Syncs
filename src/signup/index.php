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
                <td align="center"><input id="username" type="text" name="userName" size="30" /></td>
            </tr>

            <tr>
                <td>Name:</td>
                <td align="center"><input id="name" type="text" name="name" size="30" /></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td align="center"><input id="password" type="password" name="password" size="30" /></td>
            </tr>

            <tr>
                <td>Roles:</td>
                <td align="center"><input id="roles" type="text" name="roles" size="30" /></td>
            </tr>

            <tr>
                <td>Gender:</td>
                <td align="center">
                    <select id="gender" name="gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Biography:</td>
                <td align="center"><input id="biography" type="text" name="biography" size="30" /></td>
            </tr>

            <tr>
                <td>Profile Picture:</td>
                <td align="center"><input id="profile" type="text" name="profilePicture" size="30" /></td>
            </tr>

            <tr>
                <td>Genres:</td>
                <td align="center"><input id="genres" type="text" name="genres" size="30" /></td>
            </tr>

            <tr>
                <td>Linked Music:</td>
                <td align="center"><input id="songs" type="text" name="linkedMusic" size="30" /></td>
            </tr>

            <tr>
                <td>Commitment Level:</td>
                <td align="center">
                    <select id="level" name="commitmentLevel">
                        <option value="1">Hobbiest</option>
                        <option value="2">Professional</option>
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

<script src="../js/api.js"></script>
<script src="../js/signup.js"></script>