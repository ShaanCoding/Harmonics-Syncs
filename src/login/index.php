<html>
    <head>
        <title> Harmonics - Sign Up </title>
    </head>

    <?php
        require_once("../include/utils.php");
        /*
            Data Required Here:
            Username
            Password
        */

        //Variable decloration
        $userName = ValidPost('userName');
        $password = ValidPost('password');



    ?>

    <body>
        <form method="post">
            <table border="0">

                <tr>
                    <td>Username:</td>
                    <td align="center"><input type="text" name="userName" size="30"/></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td align="center"><input type="password" name="password" size="30"/></td>
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