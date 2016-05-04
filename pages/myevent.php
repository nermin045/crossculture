<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 22/04/2016
 * Time: 1:21 AM
 * Function: Display all the events
 */
include '../php/session.php';
require "../php/dbinfo.php";
$organizer = $_SESSION['login_username'];
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query1 = "SELECT * FROM Events WHERE eid = 0 AND organizer = " . "'$organizer'";
$result = $conn->query($query1);
?>

<!DOCTYPE html>
<html class="" lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Culture</title>
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/loginform.css">
    <link rel="stylesheet" href="../css/dropdownbtn.css">
    <link rel='stylesheet prefetch' href='https://octicons.github.com/components/octicons/octicons/octicons.css'>
    <link href="../css/organize.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body style="overflow:scroll">
<!--Popup Login
==================================== -->
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
        <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
    </div>
</div>


<!--Fixed Navigation
==================================== -->
<header id="navigation" class="nav navbar-static-top">
    <div class="container">

        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
                <h3><i class="fa fa-bars"></i></h3>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo.png" width="112" height="36" alt="Logo">
            </a>
            <!-- /logo -->

        </div>

        <!-- main nav -->
        <nav id="main-menu" class="collapse navigation navbar-collapse navbar-right"
             style="z-index:1000; position: relative" role="navigation">
            <ul class="nav navbar-nav hidden-xs ">
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
                        <a href="event.php?clt=test">Event <span
                                class="icon octicon octicon-list-ordered"></span></a>
                        <a href="community.php">Community <span
                                class="icon octicon octicon-organization"></span></a>
                        <a href="story.php">Story <span class="icon octicon octicon-squirrel"></span></a>
                    </div>
                </li>
                <li id="admin1" style="width: auto;">
                    <?php


                    if (isset($_SESSION['login_username'])) {

                        echo '<a href="#">' . $_SESSION['login_username'] . ' </a>';
                        echo '<div id="menu1" class="menu">
                            <div class="arrow"></div>
                            <a href="#">My Profile <span class="icon octicon octicon-person"></span></a>
                            <a href="myevent.php">My Events <span class="icon octicon octicon-tasklist"></span></a>
                            <a href="mystory.php">My Stories <span class="icon octicon octicon-rocket"></span></a>
                            <a href="poststory.php">Post Story<span class="icon octicon octicon-pencil"></span></a>
                            <a href="../php/logout.php">Logout <span class="icon octicon octicon-sign-out"></span></a>
                        </div>';
                    } else {
                        echo '<a href="javascript:login(\'show\');">login </a>';
                    }
                    ?>

                </li>
            </ul>

            <ul id="mobnav" class="nav navbar-nav visible-xs">
                <?php
                if (isset($_SESSION['login_username'])) {
                    echo '<li><a href="#">' . $_SESSION['login_username'] . '<i class="fa fa-user pull-right" aria-hidden="true"></i></a></li>';

                    ?>
                    <li><a href="../index.php">Home<i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>
                    <li><a href="event.php?clt=test">Event<i class="fa fa-list-ol pull-right"
                                                             aria-hidden="true"></i></a></li>
                    <li><a href="community.php">Community<i class="fa fa-university pull-right"
                                                            aria-hidden="true"></i></a></li>
                    <li><a href="story.php">Story<i class="fa fa-paper-plane pull-right"
                                                    aria-hidden="true"></i></a></li>

                    <?php
                    echo '<li><a href="../php/logout.php">Logout<i class="fa fa-sign-out pull-right" aria-hidden="true"></i></a></li>';

                } else {
                    echo '<li><a href="../index.php">Home<i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="event.php?clt=test">Event<i class="fa fa-list-ol pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="community.php">Community<i class="fa fa-university pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="story.php">Story<i class="fa fa-paper-plane pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="javascript:login(\'show\');">Login<i class="fa fa-sign-in pull-right" aria-hidden="true"></i></a></li>';
                }
                ?>
            </ul>
        </nav>
        <!-- /main nav -->


    </div>


</header>


<div class="titlediv">
    <h2>My Events</h2>
    <h4></h4>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <ul class="list-group">
            <?php
            $count = 0;
            foreach($result as $row) {
                $count++;
                $eventstart = $row['start'];
                $eventend = $row['end'];
                echo '<li class="list-group-item row">';
                echo '<div class="col-md-2">';
                echo '<img width=130px src="'.$row['logo']. '"">';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<h4>'. $row['name']. '</h4>';
                echo 'From: ' .
                      substr($eventstart,8,2).'/'.
                      substr($eventstart,5,2).'/'.
                      substr($eventstart,0,4).'  '.
                      substr($eventstart,11,5);
//                    substr($eventstart, 8,-9) . '/' .
//                    substr($eventstart, 5,-12) . '/' .
//                    substr($eventstart, 0,-15) . ' ' .
//                    substr($eventstart, 11,-3);
                echo '<br>';
                echo 'To: ' .
                      substr($eventend,8,2).'/'.
                      substr($eventend,5,2).'/'.
                      substr($eventend,0,4).'  '.
                      substr($eventend,11,5);
//                    substr($eventend, 8,-9) . '/' .
//                    substr($eventend, 5,-12) . '/' .
//                    substr($eventend, 0,-15) . ' ' .
//                    substr($eventend, 11,-3);
                echo '</div>';
                echo '<div class="col-md-2" >';
                echo '<a href="eventDetail.php?event='. $row['name'] .'" class="btn btn-default" style="margin-top: 20%">View Detail</a>';
                echo '</div>';
                echo '<div class="col-md-2">';
                echo '<a href="../php/deleteevent.php?event='. $row['name'] .'&venue='.$row['venue']. '" class="btn btn-default" style="margin-top: 20%">Delete</a>';
                echo '</div>';
                echo '</li>';
            }
            if ($count == 0){
                echo '<li class="list-group-item row">';
                echo '<div class="col-md-12">';
                echo '<h3> Sorry, you have not organized any event </h3>';
                echo '</div>';
                echo '</li>';
            }
            ?>
        </ul>
        </div>
    </div>

</div>
<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>
</body>
</html>
