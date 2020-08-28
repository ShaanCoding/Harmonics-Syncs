<?php

/**
 * Login page for harmonic
 * 
 * Contains a front end that allows the user to log in their accoutns
 * If they were already signed in, we automatically direct them into the explore page
 * 
 * @author Jacky Wu
 * 
 */

require_once("../include/utils.php");
require_once("../include/sessions.php");

/* check if the user has a token, if they do then verify it and proceed - or disable and login again
   to verify the token, the current ip must match the active session */

$session_db = new Sessions;

$user_token = ValidSession($session_db->TOKEN_NAME);
$current_session = $session_db->GetSessionFromToken($user_token);

if ($current_session) {
    // validate active?
    if ($current_session['active']) {

        // validate time
        $expire_time = $current_session['time'] + $session_db->EXPIRE_TIME;

        if (time() > $expire_time) {

            // set expired and proceed as usual
            $session_db->ToggleSession($current_session['id'], false);
        } else {

            if (GetIPAddress() == $current_session['ip']) {
                // redirect to site
                header('Location: ' . LOGIN_PAGE);
            }
        }
    }
}


?>

<html>

<head>
    <title> Harmonics - Sign Up </title>
</head>

<body>
    <form method="post">
        <table border="0">

            <tr>
                <td>Username:</td>
                <td align="center"><input type="text" name="userName" size="30" /></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td align="center"><input type="password" name="password" size="30" /></td>
            </tr>

            <tr>
                <td align="center">
                    <button>Submit</button>
                </td>
            </tr>

        </table>
    </form>
</body>

</html>