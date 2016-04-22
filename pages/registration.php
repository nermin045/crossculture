<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 20.04.2016
 * Time: AM 12:39
 */
session_start();
if(isset($_SESSION['login_username'])){
    header("Location:../index.php");
}
?>

<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title>CrossCulture</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../css/pwdwidget.css" />
    <link rel="stylesheet" href="css/animate.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/Infowindow.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link href="../assets/css/animate-custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link href="../css/header.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../css/loginform.css">
    <link rel="stylesheet" href="../css/dropdownbtn.css">
    <link rel='stylesheet prefetch' href='https://octicons.github.com/components/octicons/octicons/octicons.css'>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="../js/pwdwidget.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script src="../js/pace.js"></script>
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
    <script src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="..//assets/js/modernizr.custom.js"></script>
    <script src="../js/gen_validatorv4.js" type="text/javascript"></script>



</head>
<body>

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


<header id="navigation" class="navbar-static-top" style="background-color: black;">
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
                    <a href="../index.php"><img src="../images/logo.png" width="112" height="36" alt="Logo"></a>
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

<div id="reg">

    <form id="regform" action="insertuser.php" method="POST" name="input" accept-charset="utf-8">
        <fieldset>
            <legend><b>Registration</b></legend>

            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" style="width: 20%"><br><br>

            <div style="width: 50%; float: left;">
                <label for='regpwd'>Password</label> <br />
                <div class='pwdwidgetdiv' id='thepwddiv'></div>"
                <script  type="text/javascript" >
                    var pwdwidget = new PasswordWidget('thepwddiv','regpwd');
                    pwdwidget.txtShow= 'Display';
                    pwdwidget.txtMask= 'Hide';
                    pwdwidget.MakePWDWidget();
                </script>
                <noscript>
                    <div><input type='password' id='regpwd' value="regpwd" name='regpwd' /></div>
                </noscript>
            </div>
            <div style="width: 50%; float: left;">
                <label for="repassword">Re-type Password</label><br>
                <input type="password" name="repassword" id="repassword"><br><br><br>
            </div>

            <div style="width: 50%; float: left;">
                <label for="firstname">Firstname</label><br>
                <input type="text" name="firstname" id="firstname"/>
            </div>
            <div style="width: 50%; float: left;">
                <label for="lastname">Lastname</label><br>
                <input type="text" name="lastname" id="lastname"/><br><br>
            </div>
            <label for="email">E-mail</label><br>
            <input type="text" name="email" id="email" style="width: 20%"/><br><br>
            <label for="nationality">Nationality</label><br>
            <input type="text" name="nationality" id="nationality" style="width: 20%"/><br><br>
            <label for="datepicker">Date of Birth</label><br>
            <input type="date" name="dob" id="datepicker" style="width: 20%"/><br><br>
            <label for="gender">Gender</label><br>
            <input type="radio" name="gender" id="gender" value="Male"/> Male
            <input type="radio" name="gender" id="gender" value="Female"/> Female<br><br>

            <div style="width: 50%; float: left">
                <label for="address">Address</label><br>
                <input type="text" id="address" name="address"/>
            </div>
            <div style="float: left; width: 50%">
                <label for="suburb">Suburb</label><br>
                <input type="text" name="suburb" id="suburb"/>
            </div>
            <div style="width: 100%; float: left; padding-top: 3%">
                <label for="interest">Cultural  Interest</label><br>
                <select id="interest" name="interest" onChange="OnDropDownChange(this);">
                    <option value="choose">Select one</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Greek">Greek</option>
                    <option value="Indian">Indian</option>
                    <option value="Italian">Italian</option>
                    <option value="Turkish">Turkish</option>
                </select><br><br><br>
            </div>
            <p><img id="captcha" src="../php/captcha.php" width="160" height="45" border="1" alt="CAPTCHA">
                <small><a href="#" onclick="document.getElementById('captcha').src = '../php/captcha.php?' + Math.random();
  document.getElementById('captcha_code').value = '';
  return false;
">refresh</a></small></p>
            <p><input id="captcha_code" type="text" name="captcha" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"> <small>copy the digits from the image into this box</small></p>

        </fieldset>
        <button type="submit" name="submit" value="submit" class="btn-group btn-toolbar" style="margin-left: 60%">Submit</button><br><br><br>
    </form>



</div>

<section class="rowfooter breath" >
    <div class="col-md-12 footerlinks"  style="background-color: #adadad;bottom: 0;color: black;">
        <p><br>© 2016 Dream Builders. All Rights Reserved</p>
    </div>
</section>

<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            changeYear: true,
            dateFormat: 'dd/mm/yy',
            maxDate: '01/01/2006'
//            showButtonPanel:true
        });
    });
</script>
<script type="text/javascript">
    function OnDropDownChange(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("interest").value = selectedValue;
    }

</script>
<script type="text/javascript">

    var frmvalidator = new Validator("regform");
    frmvalidator.addValidation("username","req","Please enter username");
    frmvalidator.addValidation("username", "maxlen=10  ", "Username length should be maximum 10");
    frmvalidator.addValidation("regpwd", "req", "Please enter password");
    frmvalidator.addValidation("firstname", "req", "Please enter your firstname");
    frmvalidator.addValidation("lastname", "req", "Please enter your lastname");
    frmvalidator.addValidation("email","email");
    frmvalidator.addValidation("regpwd", "minlen=6  ", "Password length should be at least 6");
    frmvalidator.addValidation("regpwd", "eqelmnt=repassword", "Password should match re-type password");
    frmvalidator.addValidation("firstname","alpha");
    frmvalidator.addValidation("lastname","alpha");
    frmvalidator.addValidation("nationality","alpha");
    frmvalidator.addValidation("suburb","alpha");
    frmvalidator.addValidation("captcha","req","Please enter the captcha digits in the box provided");
</script>
</body>
<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>

</html>
