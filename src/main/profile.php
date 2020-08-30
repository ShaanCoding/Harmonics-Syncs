<?php

/** get information from get and display it here, wont worry too much about security at this point */

require_once("../include/database.php");
require_once("../include/utils.php");
require_once("../include/sessions.php");
require_once("../include/users.php");

$user_db = new Users;

$userid = ValidGet('uid');

if (!$userid) {
  die();
}

$userinfo = $user_db->GetUserFromId($userid);

if (!$userinfo) {
  die();
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
    <nav class="navbar navbar-default navbar-fixed-top menu" style="background:#212121; margin-top: 0px;  width:100%; padding: 5px; padding-bottom: 15px;">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= LANDING_PAGE ?>"><img src="images/logo.png" alt="logo" height="40" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right main-menu">
            <li class="dropdown"><a href="<?= EXPLORE_PAGE ?>">Explore</a></li>
            <li class="dropdown"><a href="<?= CONNECTION_PAGE ?>">Connections</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </header>
  <!--Header End-->

  <!-- Connection Page Contents
    ================================================= -->

  <div id="lp-register">
    <div class="container wrapper">
      <div class="row">
        <div class="row mt-sm-4 mt-md-0">
          <div class="col-sm-12 col-md-6" style="left: 25%;  padding-bottom: 30px">
            <h2><?= $userinfo['name'] ?></h2>
            <h3>Bio
              <!--<button class="editbutton1" style="background-color: transparent; outline-color: transparent ; color: #ffffff71  ;  border-width: 0px; "> <u>edit</u></button>-->
            </h3>
            <p><?= $userinfo['bio'] ?></p>
          </div>
          <div class="col-sm-12 col-md-2">
          </div>
        </div>

        <div class="row">
          <div class="col-md-2" style="left: 25%; padding-bottom: 20px">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">somthing</h5>
                <img src="assets/music_folder/album6.jpg" alt="cover" position=relative width="100px" height="100px">
              </div>
            </div>
          </div>

          <div class="col-md-2" style="left: 25%; padding-bottom: 20px">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Blond</h5>
                <img src="assets/music_folder/album7.jpg" alt="cover" position=relative width="100px" height="100px">
              </div>
            </div>
          </div>
          <div class="col-md-2" style="left: 25%; padding-bottom: 20px">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Pink + White</h5>
                <img src="assets/music_folder/album8.jpg" alt="cover" position=relative width="100px" height="100px">
              </div>
            </div>
          </div>
        </div>



        <div class="row mt-sm-4 mt-md-0">
          <div class="col-sm-12 col-md-6" style="left: 25%; ">

            <h3> Songs
            </h3>



          </div>
        </div>






        <div class="col-sm-12 col-md-6" style="left: 25%; padding-top: 20px">
          <table class="table table-dark" style="width: 100%;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Song</th>
                <th scope="col">Length</th>
                <th scope="col">Genre</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Pink + White</td>
                <td>6:69</td>
                <td>Trap</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Chanel</td>
                <td>4:20</td>
                <td>Rap</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Slide + Ft Migos</td>
                <td>13:37</td>
                <td>Hip-Hop</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>



      <div class="row mt-sm-4 mt-md-0">
        <div class="col-sm-12 col-md-6" style="left: 25%;  padding-bottom: 30px">

          <h3>Contact


            <!--<button class="editbutton1"  style="background-color: transparent; outline-color: transparent ; color: #ffffff71  ;  border-width: 0px; " >  <u>edit</u></button>-->

          </h3>
          <p><?= $userinfo['pfp'] ?></p>
        </div>
        <div class="col-sm-12 col-md-2">
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