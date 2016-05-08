<html>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 17.04.2016
 * Time: PM 11:18
 */

require("../php/dbinfo.php");


$data = file_get_contents("php://input");
parse_str($data, $get_array);

//print_r($get_array);


    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $usrname = $get_array['username'];
    $pwd = $get_array['regpwd'];
    $fname = $get_array['firstname'];
    $lname = $get_array['lastname'];
    $mail = $get_array['email'];
    $nation = $get_array['nationality'];
    //$birth = $get_array['dob'];
    $sex = $get_array['gender'];
//    $adr = $get_array['address'];
//    $sub = $get_array['suburb'];
    $adr = $get_array['streetnumber'].' '.$get_array['route'].' '.$get_array['locality'];
    $sub= $get_array['locality'];
    $int = $get_array['interest'];
    $pwd = md5($pwd);
//    $dob = date("Y-m-d", strtotime($birth));


session_start();
if($get_array['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
session_destroy();


    $sql = "INSERT INTO Users(username, password, firstname, lastname, email, nationality, dob, gender, address, suburb, interest) VALUES ('$usrname', '$pwd', '$fname', '$lname','$mail', '$nation', '2014-03-03', '$sex', '$adr', '$sub', '$int')";


    $retval = mysqli_query($conn, $sql);

    if (!$retval) {
        die('Could not enter data: ' . mysqli_error($conn));
    }

//    echo "Entered data successfully\n";
mysqli_close($conn);
    header("Location:../index.php?logged=successful");




?>
</body>
</html>