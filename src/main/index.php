<?php

/**
 * Main page for login and registration
 */

require_once("../include/utils.php");
require_once("../include/sessions.php");
require_once("../include/genres.php");

/* check if the user has a token, if they do then verify it and proceed - or disable and login again
   to verify the token, the current ip must match the active session */

$genres_db = new Genres;
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
        header('Location: ' . EXPLORE_PAGE);
      }
    }
  }
}

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
  <link rel="stylesheet" href="../css/custom.css">

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
          <a class="navbar-brand" href="<?= LANDING_PAGE ?>"><img src="images/logo.png" alt="logo" height="40" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right main-menu">
            <li class="dropdown"><a href="<?= LANDING_PAGE ?>">Home</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </header>
  <!--Header End-->

  <!-- Landing Page Contents
    ================================================= -->
  <div id="lp-register">
    <div class="container wrapper">
      <div class="row">

        <div class="reg-form-container">

          <!-- Register/Login Tabs-->
          <div class="reg-options">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
              <li><a href="#login" data-toggle="tab">Login</a></li>
            </ul>
            <!--Tabs End-->
          </div>

          <!--Registration Form Contents-->
          <div class="tab-content">
            <div class="tab-pane active" id="register">
              <h3>Register</h3>
              <p class="text-muted">Connect with artists around the world.</p>

              <!--Register Form-->
              <form name="registration_form" id='registration_form' class="form-inline">
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="register-name" class="sr-only">Full name</label>
                    <input required id="register-name" class="form-control input-group-lg" type="text" name="name" title="Enter last name" placeholder="Full name" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="register-name" class="sr-only">Username</label>
                    <input required id="register-username" class="form-control input-group-lg" type="text" name="username" title="Enter user name" placeholder="User name" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="register-password" class="sr-only">Password</label>
                    <input required id="register-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="register-pfp" class="sr-only">Handle</label>
                    <input required id="register-pfp" class="form-control input-group-lg" type="text" name="pfp" title="Enter Handle" placeholder="Handle" />
                  </div>
                </div>
                <div class="row">
                  <p class="birth"><strong>Tell us a bit more about yourself</strong></p>
                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="register-name" class="sr-only">Bio</label>
                      <input id="register-bio" class="form-control input-group-lg" type="text" name="Bio" title="Enter Bio" placeholder="Bio" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="month" class="sr-only"></label>
                      <select required class="form-control" id="register-level">
                        <option value="Skill Level" disabled selected>Skill Level</option>
                        <option value="1">Amateur</option>
                        <option value="2">Professional</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-6">

                      <label for="month" class="sr-only"></label>
                      <select required class="form-control" id="register-role">
                        <option value="Role" disabled selected>Role</option>
                        <option value="1">Vocal</option>
                        <option value="2">Instrumental</option>
                        <option value="3">Producer</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="month" class="sr-only"></label>
                      <select required class="form-control" id="register-genre">
                        <option value="Genre" disabled selected>Genre</option>
                        <?php
                        $valindex = 0;
                        foreach ($genres_db->GetAllGenres() as $genre) {
                          $valindex += 1;
                        ?>
                          <option value="<?= $valindex ?>"><?= $genre['tag'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group gender">
                    <label class="radio-inline">
                      <input id="register-gender-1" value="1" type="radio" name="optradio" checked>Male
                    </label>
                    <label class="radio-inline">
                      <input id="register-gender-2" value="2" type="radio" name="optradio">Female
                    </label>
                    <label class="radio-inline">
                      <input id="register-gender-3" value="3" type="radio" name="optradio">Other
                    </label>
                  </div>

                  <div class="row">
                    <div class="form-group col-xs-6">
                      <label for="register-song" class="sr-only">Sound cloud song</label>
                      <input id="register-song" class="form-control input-group-lg" type="text" name="song" title="Enter song" placeholder="Link a song" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-xs-6">

                      <p class="birth"><strong>What genre of artist are you looking for?</strong></p>
                      <div>
                        <label for="month" class="sr-only"></label>
                        <select required class="form-control" id="register-target-genre">
                          <option value="Target Genre" disabled selected>Wanted Genre</option>
                          <?php
                          $valindex = 0;
                          foreach ($genres_db->GetAllGenres() as $genre) {
                            $valindex += 1;
                          ?>
                            <option value="<?= $valindex ?>"><?= $genre['tag'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <p></p>

                <button class="btn btn-primary">Register Now</button>

              </form>
              <!--Register Now Form Ends-->
            </div>
            <!--Registration Form Contents Ends-->

            <!--Login-->
            <div class="tab-pane" id="login">
              <h3>Login</h3>
              <p class="text-muted">Log into your account</p>

              <!--Login Form-->
              <form id='Login_form' method="get">
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="login-username" class="sr-only">Username</label>
                    <input id="login-username" class="form-control input-group-lg" type="text" name="text" title="Enter Username" placeholder="Your Username" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="login-password" class="sr-only">Password</label>
                    <input id="login-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password" />
                  </div>
                </div>
                <button class="btn btn-primary">Login Now</button>
              </form>
              <!--Login Form Ends-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.appear.min.js"></script>
  <script src="js/jquery.incremental-counter.js"></script>
  <script src="js/script.js"></script>
  <script src="../js/api.js"></script>
  <script src="../js/login-register.js"></script>

</body>

</html>