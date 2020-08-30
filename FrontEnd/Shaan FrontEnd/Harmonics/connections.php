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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo" height="90" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right main-menu">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span><img src="images/down-arrow.png" alt="" /></span></a>
                            <ul class="dropdown-menu newsfeed-home">
                                <li><a href="index.html">Landing Page 1</a></li>
                                <li><a href="ingex.php">Landing Page 2</a></li>
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
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>
    <!--Header End-->

    <!-- Connection Page Contents
    ================================================= -->

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
                            <table class="table table-dark" style="width: 50%;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
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