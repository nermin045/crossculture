<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 18/04/2016
 * Time: 4:54 PM
 */
include '../php/session.php';
?>

<!DOCTYPE html>
<html class="" lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Culture</title>
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link href="../assets/css/animate-custom.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/loginform.css">
    <link rel="stylesheet" href="../css/dropdownbtn.css">
    <link rel='stylesheet prefetch' href='https://octicons.github.com/components/octicons/octicons/octicons.css'>
    <link href="../css/organize.css" rel="stylesheet">


    <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
<link href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>

    <script src="../js/gen_validatorv4.js" type="text/javascript"></script>

    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

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
<header id="navigation" class="navbar-static-top">
    <div class="container" style="width: 100%">

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
<div class="titlediv">
    <h2>Organize An Event</h2>
    <h4>You can organize your own event here.</h4>
</div>
<div class="contentdiv">
    <div class="container">
        <form id="eventform" class="formdiv" enctype="multipart/form-data" method="POST" action="../php/newEvent.php">

            <div class="formrow">
                <div class="rowtitle">
                    Culture
                </div>
                <div class="row">
                    <div class="onright">
                        <div class="col-md-2">
                            <input type="radio" name="radio" id="radio1" class="radio" value="Chinese OR China"/>
                            <label for="radio1" style="border-radius: 3px; border: 1px solid #D1D3D4">Chinese</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="radio" id="radio2" class="radio" value="Greek OR Greece"/>
                            <label for="radio2" style="border-radius: 3px; border: 1px solid #D1D3D4">Greek</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="radio" id="radio3" class="radio" value="Indian OR India"/>
                            <label for="radio3" style="border-radius: 3px; border: 1px solid #D1D3D4">Indian</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="radio" id="radio4" class="radio" value="Italian OR Italy"/>
                            <label for="radio4" style="border-radius: 3px; border: 1px solid #D1D3D4">Italian</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="radio" id="radio5" class="radio" value="Turkish OR Turkey"/>
                            <label for="radio5" style="border-radius: 3px; border: 1px solid #D1D3D4">Turkish</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="formrow">
                <div class="rowtitle">
                    Event Name
                </div>
                <div class="forminput">
                    <input type="text" name="nametext" id="nametext" class="inputfield"/>
                </div>
            </div>
            <div class="formrow">
                <div class="rowtitle">
                    Event Description
                </div>
                <div class="forminput">
                    <textarea name="comment" class="inputfield" id="descp" style="height: 80px" form="eventform"
                              placeholder="Enter text here..."></textarea>
                </div>
            </div>
            <div class="formrow">
                <div class="rowtitle">
                    Event Time
                    <div class="forminput">
                        <div class="container" style="padding: 0px; margin: 0px">
                            <div class="col-md-1" style="padding-left: 0px; width: 3%">
                                <label for="datetimepicker1" ><b>From</b></label>
<!--                                <b>From</b>-->
                            </div>
                            <div class='col-md-4' style="width:250px; padding-bottom: 0px;">
                                <div class="form-group">
                                    <div class='input-group date'>
                                        <input type="text" name="starttime" id="datetimepicker1" class="form-control"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" style="margin-left: 20px; width: 3%">
                                <label for="datetimepicker2" ><b>To</b></label>
<!--                                <b>To</b>-->
                            </div>
                            <div class='col-md-4' style="width:250px; padding-bottom: 0px">
                                <div class="form-group">

                                    <div class='input-group date'>
                                        <input type="text" name="endtime" id="datetimepicker2" class="form-control"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                                    </div>
                                </div>
</div>
<script type="text/javascript">
var dateToday = new Date();
$(function () {
  $('#datetimepicker1').datetimepicker({
                                       format: "DD MM YYYY - hh:mm A",
                                       minDate: dateToday
                                       });
  $('#datetimepicker2').datetimepicker({
                                       format: "DD MM YYYY - hh:mm A",
                                       minDate: dateToday,
                                       useCurrent: false //Important! See issue #1075
                                       });
  $("#datetimepicker1").on("dp.change", function (e) {
                           $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                           });
  $("#datetimepicker2").on("dp.change", function (e) {
                           $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
                           });
  });

</script>
                        </div>
                    </div>
                </div>

                <div class="formrow">
                <div class="rowtitle">
                    Capacity
                </div>
                <div class="forminput" style="width: 30%">
                    <input type="number" class="form-control bfh-number" name="capacity" value="10"/>
                </div>
            </div>
            <div class="formrow">
                <div class="rowtitle">
                    <label for="venuetext">Venue Name</label>
                </div>
                <div class="forminput">
                    <input type="text" name="venuetext" id="venuetext" class="inputfield" style="width: 480px;"/>
                </div>
            </div>
            <div class="formrow">
                <div class="rowtitle">
                    <label for="autocomplete">Address</label>
                </div>
                <div class="container">
                    <div class="row">
                        <div id="locationField">
                            <input id="autocomplete" placeholder="Enter your address"
                                   onFocus="geolocate()" type="text">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div id="map"></div>
                    </div>
                    <div class="row" hidden="true">
                        <table id="address">
                            <tr>
                                <td class="label">Street address</td>
                                <td class="slimField">
                                    <input class="field" id="street_number" name="street_number"></td>
                                <td class="wideField" colspan="2">
                                    <input class="field" id="route" name="route"></td>
                            </tr>
                            <tr>
                                <td class="label">City</td>
                                <td class="wideField" colspan="3">
                                    <input class="field" id="locality" name="locality"></td>
                            </tr>
                            <tr>
                                <td class="label">State</td>
                                <td class="slimField">
                                    <input class="field" id="administrative_area_level_1" name="administrative_area_level_1"></td>
                                <td class="label">Zip code</td>
                                <td class="wideField">
                                <input class="field" id="postal_code" name="postal_code"></td>
                            </tr>
                            <tr>
                                <td class="label">Country</td>
                                <td class="wideField" colspan="3">
                                    <input class="field" id="country" name="country"></td>
                            </tr>
                            <tr>
                                <td class="label">Longitude</td>
                                <td class="wideField" colspan="3">
                                    <input class="field" id="longitude" name="longitude"></td>
                            </tr>
                            <tr>
                                <td class="label">Latitude</td>
                                <td class="wideField" colspan="3">
                                    <input class="field" id="latitude" name="latitude"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="formrow">
                <div class="rowtitle">
                    Image
                </div>
                <div class="forminput">
                    <input type='file' onchange="readURL(this);" name="image" accept="image/*"/>
                    <img id="blah" src="#" alt="Please upload an image..."/>
                </div>
            </div>
            <div class="formrow">
            <div class="g-recaptcha" data-sitekey="6LeU8h0TAAAAAHKvV84ZVEgg37JxBcGnCOWe5OL4"></div>
                </div>
            <div class="formrow">
            <button type="submit" name="submit" id="submit" value="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">

    var frmvalidator = new Validator("eventform");
    frmvalidator.addValidation("nametext","req","Please enter event name");
    frmvalidator.addValidation("radio","selone","Please select culture",true);
    frmvalidator.addValidation("descp","req","Please enter event description");
    frmvalidator.addValidation("venuetext","req","Please enter venue");
    frmvalidator.addValidation("autocomplete","req","Please enter event address");
    frmvalidator.addValidation("datetimepicker1","req","Please enter start date for the event");
    frmvalidator.addValidation("datetimepicker2","req","Please enter end date for the event name");
</script>

<script src="../js/maporganize.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAohlvHFSdn17Csms1_VTA-BNkvc4aJ9YY&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src='https://www.google.com/recaptcha/api.js'></script>


</body>
</html>
