<?php

require_once("../include/sessions.php");
require_once("../include/utils.php");

/* require a login */
$session_db = new Sessions;

$current_token = ValidSession($session_db->TOKEN_NAME);

/* local user info */
$current_session = $session_db->GetSessionFromToken($current_token);

$session_db->ToggleSession($current_session['id'], 0);

header('Location: ' . LOGIN_PAGE);
