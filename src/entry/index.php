<?php

/**
 * Main page for login and registration
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
          <a class="navbar-brand" href="index-register.html"><img src="images/logo.png" alt="logo" /></a>
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
              <h3>Register Now !!!</h3>
              <p class="text-muted">Be cool and join today. Meet millions</p>

              <!--Register Form-->
              <form name="registration_form" id='registration_form' class="form-inline">
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="register-username" class="sr-only">Username</label>
                    <input id="register-username" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name" />
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="register-name" class="sr-only">Full name</label>
                    <input id="register-name" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-12">
                    <label for="register-password" class="sr-only">Password</label>
                    <input id="register-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password" />
                  </div>
                </div>
                <div class="row">
                  <p class="birth"><strong>Tell us a bit more about yourself</strong></p>
                  <div>
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" id="register-level">
                      <option value="Commitment Level" disabled selected>Commitment Level</option>
                      <option value="1">Amateur</option>
                      <option value="2">Professional</option>
                    </select>
                  </div>
                  <div>
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" id="speciality">
                      <option value="Commitment Level" disabled selected>Speciality</option>
                      <option>Vocal</option>
                      <option>Instrumental</option>
                      <option>Producer</option>
                    </select>
                  </div>
                  <div>
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" id="genre">
                      <option value="Commitment Level" disabled selected>Genre</option>
                      <option>Lo-Fi</option>
                      <option>Swing</option>
                      <option>EDM</option>
                      <option>Classical</option>
                    </select>
                  </div>
                </div>

                <div class="form-group gender">
                  <label class="radio-inline">
                    <input type="radio" name="optradio" checked>Male
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="optradio">Female
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="optradio">Other
                  </label>
                </div>

                <div class="row">
                  <p class="birth"><strong>What genre of artist are you looking for?</strong></p>
                  <div>
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" id="wantedGenre">
                      <option value="Commitment Level" disabled selected>Wanted Genre</option>
                      <option>Lo-Fi</option>
                      <option>Swing</option>
                      <option>EDM</option>
                      <option>Classical</option>
                    </select>
                  </div>
                </div>

              </form>
              <!--Register Now Form Ends-->
              <p><a href="#">Already have an account?</a></p>
              <button class="btn btn-primary">Register Now</button>
            </div>
            <!--Registration Form Contents Ends-->

            <!--Login-->
            <div class="tab-pane" id="login">
              <h3>Login</h3>
              <p class="text-muted">Log into your account</p>

              <!--Login Form-->
              <form id='Login_form' method="get">
                <div class="row">
                  <div class="form-group col-xs-12">
                    <label for="login-username" class="sr-only">Username</label>
                    <input id="login-username" class="form-control input-group-lg" type="text" name="text" title="Enter Username" placeholder="Your Username" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-12">
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
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.appear.min.js"></script>
  <script src="js/jquery.incremental-counter.js"></script>
  <script src="js/script.js"></script>
  <script src="../js/api.js"></script>
  <script src="../js/login-register.js"></script>

</body>

</html>