<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 7/05/2016
 * Time: 1:56 PM
 */
if($_POST) {
    if($_POST['status'] == 1){
        echo "0";
        exit;
    }
    else{
        echo "1";
        exit;
    }
}else{
    echo "0";
    exit;
}

?>
