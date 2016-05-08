<?php
require("../php/dbinfo.php");


if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"/Applications/XAMPP/xamppfiles/htdocs/crossculture-master-2/photos/".$file_name);
//        echo "Success";
    }else{
        print_r($errors);
    }
}
$title = $_POST['title'];
$content = $_POST['content'];
$culture = $_POST['culture'];
$pic = $_FILES['image']['name'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_SESSION['login_username'])){
    $user = $_SESSION['login_username'];
}


$sql = "INSERT INTO Story(title, content, image, latitude, longtitude, postdate, culture, username) 
VALUES ('$title', '$content', '$pic', '$lname','$mail', now(), '$culture', '$user')";

?>
