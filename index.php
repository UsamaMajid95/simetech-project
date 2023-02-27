<?php
require 'functions.php';

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$message = $_POST['message'];
$city = $_POST['city'];

$target='upload/'.basename($_FILES['file']['name']);
#بهاي الخطوه اجيب الفايل من الفورم
#upload هو اسم الفولدر

$user = new Person();
$result = $user->save_user($name,$email,$gender,$message,$city,$target);

echo $result;



?>