<?php

/**
 * connections.php
 * 
 * shows all connections that you made on explore
 * 
 * @author Jacky Wu
 */

require_once("../include/sessions.php");
require_once("../include/users.php");
require_once("../include/matches.php");
require_once("../include/utils.php");

$session_db = new Sessions;
$matches_db = new Matches;
$users_db = new Users;

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

  <!--Google Font-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" type="image/png" href="images/fav.png" />
</head>

<body>

  <!-- Header
    ================================================= -->

  <header id="header-inverse">
    <nav class="navbar navbar-default navbar-fixed-top menu">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a data-ajax="false" class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo" height="90" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right main-menu">
            <!--<li class="dropdown"><a href="<?= LANDING_PAGE ?>">Home</a></li>-->
            <li class="dropdown"><a href="<?= EXPLORE_PAGE ?>">Explore</a></li>
            <li class="dropdown"><a href="<?= LOGOUT_PAGE ?>" data-ajax="false">Logout</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
  </header>
  <!--Header End-->

  <!-- Connection Page Contents -->

  <div id="lp-register">
    <div class="container wrapper">
      <div class="row">
        <!--HeadForm Contents-->
        <div class="tab-content">
          <div class="tab-pane active" id="register">
            <h1>Mutal Connections</h1>
            <p class="text-muted">PERSONS USERNAME CURRENT FRIENDS:</p>
            <!-- Put Code Here -->
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Name</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $all_matches = $matches_db->GetAllMatchesFromUser($userinfo['id']);

                foreach ($all_matches as $match) {
                  $targetid = $match['user1'];

                  if ($targetid == $userinfo['id']) {
                    $targetid = $match['user2'];
                  }
                  $target_info = $users_db->GetUserFromId($targetid);
                ?>
                  <tr>
                    <td><a href="<?= PROFILE_PAGE ?>?uid=<?= $target_info['id'] ?>"><?= $target_info['username'] ?></a></td>
                    <td><a href="<?= PROFILE_PAGE ?>?uid=<?= $target_info['id'] ?>"><?= $target_info['name'] ?></a></td>
                    <td><a href="<?= PROFILE_PAGE ?>?uid=<?= $target_info['id'] ?>">@<?= $target_info['pfp'] ?></a></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- https://www.w3schools.com/html/html_tables.asp -->

    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.min.js"></script>
    <script src="js/jquery.incremental-counter.js"></script>
    <script src="js/script.js"></script>

</body>

</html>