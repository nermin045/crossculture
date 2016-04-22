<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 17/04/2016
 * Time: 1:35 AM
 */
require 'dbinfo.php';
session_start();
{
    $data = file_get_contents("php://input");
    parse_str($data, $get_array);
    $user=$get_array['username'];
    $pass=$get_array['password'];
    $pass= md5($pass);
    $conn = new mysqli($hn,$un,$pw,$db);
    mysqli_set_charset($conn,"utf8");
    if ($conn->connect_error) die($conn->connect_error);
    $query = "SELECT id FROM users WHERE username='$user' and password='$pass'";
    $fetch=$conn->query($query);
    $count=$fetch->num_rows;
    if($count!="")
    {
        $_SESSION['login_username']=$user;
        $_SESSION['islogin'] = true;
        header("Location:../index.php");
    }
    else
    {
        echo 'log out';
        header('Location: ../index.php?logged=wrong');
    }

}
?>