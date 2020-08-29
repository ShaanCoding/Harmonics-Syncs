<?php

/**
 * Swiping page for artist discovery
 * 
 * @author Jacky
 */

require_once("../include/sessions.php");
require_once("../include/utils.php");
require_once("../include/users.php");
require_once("../include/swipes.php");

/* require a login */
$session_db = new Sessions;
$users_db = new Users;
$swipes_db = new Swipes;

$current_token = ValidSession($session_db->TOKEN_NAME);
$session_db->RequireSession($current_token, LOGIN_PAGE, GetIPAddress());

/* local user info */
$current_session = $session_db->GetSessionFromToken($current_token);
$userid = $current_session['userid'];
$userinfo = $users_db->GetUserFromId($userid);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Harmonics</title>

  <!-- Stylesheets
    ================================================= -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />

  <link rel="stylesheet" href="css/ionicons.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
  <link rel="stylesheet" href="css/swipeleftright.css">

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>

  <!--Google Font-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" type="image/png" href="images/fav.png" />
</head>

<body>

  <!-- Header
    ================================================= -->

  <header id="header-inverse">
    <nav class="navbar navbar-default navbar-fixed-top menu" style="background:#212121; margin-top: 0px;  width:100%; padding: 5px; padding-bottom: 15px;">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index-register.html"><img src="images/logo.png" alt="logo" height="40" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right main-menu">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span><img src="images/down-arrow.png" alt="" /></span></a>
              <ul class="dropdown-menu newsfeed-home">
                <li><a href="index.html">Landing Page 1</a></li>
                <li><a href="index-register.html">Landing Page 2</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsfeed <span><img src="images/down-arrow.png" alt="" /></span></a>
              <ul class="dropdown-menu newsfeed-home">
                <li><a href="newsfeed.html">Newsfeed</a></li>
                <li><a href="newsfeed-people-nearby.html">Poeple Nearly</a></li>
                <li><a href="newsfeed-friends.html">My friends</a></li>
                <li><a href="newsfeed-messages.html">Chatroom</a></li>
                <li><a href="newsfeed-images.html">Images</a></li>
                <li><a href="newsfeed-videos.html">Videos</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="contact.html">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </header>

  <!-- Header End -->

  <!-- Landing Page Contents -->
  <div id="lp-register">
    <div class="container wrapper">

      <div class="row">
        <div class="square"></div>

        <div id="container" style="height: 450px; ">

          <?php
          $all_users = $users_db->GetAllUsers();

          // check if we already swiped on this person
          $card_stack = 0;
          foreach ($all_users as $target_user) {

            if ($target_user['id'] ==  $userinfo['id']) {
              continue;
            }

            /* check if we already swiped on the person */
            $swipe_check = $swipes_db->GetSwipeFromUseridAndTarget($userinfo['id'], $target_user['id']);

            if (ValidInput($swipe_check)) {
              continue;
            }

            $card_stack += 1;

            /* show them as a card */
          ?>
            <div id="buddy_<?= $card_stack ?>" class=" buddy" href="<?= $target_user['id'] ?>" <?php if ($card_stack == 1) { ?> style="display: block;" <?php } ?>>
              <iframe id="sce_<?= $card_stack ?>" width="100%" style="padding: 10px;" height="360" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/678917328&color=%233090d8&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
            </div>
          <?php }
          ?>
          <!-- final card -->
          <div class="buddy" <?php if ($card_stack == 0) { ?> style="display: block;" <?php } ?>>
            <div class="avatar" style="display: block; background-image: url(images/nocards.png); background-size: 100% !important;">
            </div>
          </div>
        </div>

        <input type="hidden" id="sce_max" value="<?= $card_stack + 1 ?>">
        <input type="hidden" id="sce_local" value="<?= $userinfo['id'] ?>">

        <div id="container" style="height: 50px;">
          <div id="exploreDev" style="display: table;margin: 0 auto;">
            <div id="exploreDevButton" style="width: 40%">
              <button id="cross" style="background-color: transparent;"></button>
            </div>

            <div id="exploreDevButton" style="width: 40%">
              <button id="heart" style="background-color: transparent;"></button>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <!-- Scripts
    ================================================= -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.appear.min.js"></script>
  <script src="js/jquery.incremental-counter.js"></script>
  <script src="js/script.js"></script>
  <script src="https://w.soundcloud.com/player/api.js"></script>
  <script src="js/swipeleftright.js"></script>
  <script src="../js/api.js"></script>
  <script src="../js/explore.js"></script>

</body>

</html>