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
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="index-register.html"><img src="images/logo.png" alt="logo" height="40"/></a>
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

          <div id="container" style="height: 450px;">
            <div class="buddy" style="display: block;">
              <div class="avatar"
                style="display: block; background-image: url(assets/music_folder/album1.jpg)">
              </div>
            </div>
            <div class="buddy">
              <div class="avatar"
                style="display: block; background-image: url(assets/music_folder/album2.jpg)">
              </div>
            </div>
            <div class="buddy">
              <div class="avatar" style="display: block; background-image: url(assets/music_folder/album3.jpg)"></div>
            </div>
            <div class="buddy">
              <div class="avatar"
                style="display: block; background-image: url(assets/music_folder/album4.jpg)">
              </div>
            </div>
            <div class="buddy">
              <div class="avatar"
                style="display: block; background-image: url(assets/music_folder/album5.jpg)">
              </div>
            </div>
          </div>

          <!-- Put Code Here -->
          <div id="container" style="height: 50px;">
            <div id="exploreDev">
              <div id="exploreDevButton">
                <button id="cross"></button>
              </div>
              <div id="exploreDevButton">
                <button id="back"></button>
              </div>
              <div id="exploreDevButton">
                <button id="play"></button>
              </div>
              <div id="exploreDevButton">
                <button id="next"></button>
              </div>
              <div id="exploreDevButton">
                <button id="heart"></button>
              </div>
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
  <script src="js/swipeleftright.js"></script>
</body>

</html>