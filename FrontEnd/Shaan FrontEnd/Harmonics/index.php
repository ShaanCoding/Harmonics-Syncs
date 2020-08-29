<?php

/**
 * Swiping page for artist discovery
 * 
 * @author Jacky
 */

require_once("../include/sessions.php");
require_once("../include/utils.php");

/* require a login */
$session_db = new Sessions;
$current_token = ValidSession($session_db->TOKEN_NAME);
$session_db->RequireSession($current_token, LOGIN_PAGE, GetIPAddress());

?>

<html>

<head>
    <title> Harmonics - Explore </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
    <link rel="stylesheet" href="swipeleftright.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
</head>

<body>


    <div id="container">
        <div class="buddy" style="display: block;">
            <div class="avatar" style="display: block; background-image: url(https://1.bp.blogspot.com/_qEbjiFbQWGM/TCBVlN3mkYI/AAAAAAAADCM/7CjYqUHwbgY/s1600/workshop_modell_0126.jpg)"></div>
        </div>
        <div class="buddy">
            <div class="avatar" style="display: block; background-image: url(http://static.stylemagazin.hu/medias/29280/Nem-ehezik-a-Women-of-the-Year-legjobb-modell-dijara-eselyes-szepseg_32fc7c86954a8847610499a0fc7261e2.jpg)"></div>
        </div>
        <div class="buddy">
            <div class="avatar" style="display: block; background-image: url(http://w1nd.cc/promo/347.jpg)"></div>
        </div>
        <div class="buddy">
            <div class="avatar" style="display: block; background-image: url(http://ell.h-cdn.co/assets/cm/15/01/54a769be3112d_-_elle-rata-insta-1-24375723.png)"></div>
        </div>
        <div class="buddy">
            <div class="avatar" style="display: block; background-image: url(http://hircsarda.hu/wp-content/uploads/2016/03/orban1.jpeg)"></div>
        </div>
    </div>


    <form method="POST">
        <table border="0">
            <tr>
                <td align="center">
                    <Button>Hate</Button>
                </td>
            </tr>
            <td align="center">
                <Button>Seek Start</Button>
            </td>
            <tr>

            </tr>
            <td align="center">
                <Button>Play / Pause</Button>
            </td>

            <tr>
                <td align="center">
                    <Button>Skip</Button>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <Button>Love</Button>
                </td>
            </tr>
        </table>
    </form>

    <script src="swipeleftright.js"></script>
</body>

</html>