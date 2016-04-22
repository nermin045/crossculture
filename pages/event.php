<?php
//include '../php/session.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<head>
    <meta charset="UTF-8">
    <title>CrossCulture</title>


    <link rel="stylesheet" href="../css/preload.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/Infowindow.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link href="../assets/css/animate-custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../css/loginform.css">
    <link rel="stylesheet" href="../css/dropdownbtn.css">
    <link rel='stylesheet prefetch' href='https://octicons.github.com/components/octicons/octicons/octicons.css'>


    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script src="../js/pace.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- [profolio B] -->
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="../themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--simple-line-icons-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAohlvHFSdn17Csms1_VTA-BNkvc4aJ9YY"
            type="text/javascript"></script>
</head>
<body onload="firstLoad()">
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>

<div style="width: 100%">
    <div id="popupbox" class="module form-module popuplogin">
        <div class="toggle">
            <a class="fa fa-times" href="javascript:login('hide');"></a>
            <div class="tooltip">Click Me</div>
        </div>
        <div class="form">
            <h2>Login to your account</h2>
            <form method="post" name="login" action="../php/login.php">
                <input type="text" name="username" id="userid" required="required" placeholder="Username"/>
                <input type="password" name="password" id="passid" required="required" placeholder="Password"/>
                <button type="submit" name="submit" id="submit" value="submit">Login</button>
            </form>
        </div>
        <div class="form">
            <h2>Create an account</h2>
            <form>
                <input type="text" placeholder="Username"/>
                <input type="password" placeholder="Password"/>
                <input type="email" placeholder="Email Address"/>
                <input type="tel" placeholder="Phone Number"/>
                <button>Register</button>
            </form>
        </div>
        <div class="cta"><a href="registration.php">Sign Up</a></div>
    </div>
</div>

<header id="navigation" class="navbar-static-top">
    <div class="container">

        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <h1 class="navbar-brand">
                <a href="#body">
                    <a href="../index.php"><img src="../images/logo.png" width="112" height="36" alt="Logo">
                    </a>
                </a>
            </h1>
            <!-- /logo -->

        </div>

        <!-- main nav -->
        <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="../pages/organize.php">
                        <div style="border-style: solid; border-color: gainsboro; border-width: thin">
                            &nbsp&nbsp Organize an event &nbsp&nbsp
                        </div>
                    </a>
                </li>
                <li id="admin2" style="width: 108px;">
                    <a href="#">Service</a>
                    <div id="menu2" class="menu">
                        <div class="arrow"></div>
                        <a href="../pages/event.php?clt=test">Event <span
                                class="icon octicon octicon-list-ordered"></span></a>
                        <a href="../pages/community.php">Community <span class="icon octicon octicon-organization"></span></a>
                        <a href="../pages/story.php">Story <span class="icon octicon octicon-squirrel"></span></a>
                    </div>
                </li>
                <li id="admin1" style="width: auto;">
                    <a href="javascript:login('show');">
                        <?php
                        if (isset($_SESSION['login_username'])) {
                            echo $_SESSION['login_username'] . ' </a>';
                            echo '<div id="menu1" class="menu">
                            <div class="arrow"></div>
                            <a href="#">My Profile <span class="icon octicon octicon-person"></span></a>
                            <a href="myevent.php">My Events <span class="icon octicon octicon-tasklist"></span></a>
                            <a href="#">My Stories <span class="icon octicon octicon-rocket"></span></a>
                            <a href="../php/logout.php">Logout <span class="icon octicon octicon-sign-out"></span></a>
                        </div>';
                        } else {
                            echo 'login </a>';
                        }
                        ?>

                </li>
            </ul>
        </nav>
        <!-- /main nav -->


    </div>


</header>


<div id="container" style="margin-left: 7%; margin-right: 7%; margin-top: 30px;">
    <div id="content">
        <div id="buttonculture">
            <button class="denem  hvr-grow" onclick="load('test')" data-toggle="tooltip" title="ALL"></button><br>
            <button class="denem1 hvr-grow" onclick="load('Chinese OR China')" data-toggle="tooltip" title="Chinese"></button><br>
            <button class="denem2 hvr-grow" onclick="load('Greek OR Greece')" data-toggle="tooltip" title="Greek"></button><br>
            <button class="denem3 hvr-grow" onclick="load('Indian OR India')" data-toggle="tooltip" title="Indian"></button><br>
            <button class="denem4 hvr-grow" onclick="load('Italian OR Italy')" data-toggle="tooltip" title="Italian"></button><br>
            <button class="denem5 hvr-grow" onclick="load('Turkish OR Turkey')" data-toggle="tooltip" title="Turkish"></button>
        </div>
        <div id="map-canvas"></div>
    </div>
    <div id="sidebar"></div>
</div>



<section class="rowfooter breath" >
    <div class="col-md-12 footerlinks"  style="background-color: #adadad; margin-top: 30px;color:black;">
        <p><br>© 2016 Dream Builders. All Rights Reserved</p>
    </div>
</section>



</body>

<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>
<script src="../js/map.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</html>