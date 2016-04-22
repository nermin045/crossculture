<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 18/04/2016
 * Time: 12:51 AM
 * Function: User logout
 */
session_start();
if(session_destroy())
{
    header("Location: ../index.php");
}
?>