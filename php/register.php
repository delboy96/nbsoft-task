<?php

$name = '';
$surname = '';
$email = '';
$phone = '';
$username = '';
$password = '';
$city = '';
$postalCode = '';
$address = '';

$register = register($conn, $name, $surname, $email, $phone, $username, $password, $city, $postalCode, $address);

if(! empty($register)){
    echo ('Successfuly inserted!');
}else {
    $error_msg = "Error";
}