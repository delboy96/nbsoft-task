<?php

header('Content-type: application/json, charset=utf-8');

$name = isset($_POST['name']) ? $_POST['name'] : '';
$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';

$user = [
    'name' => $name, 
    'surname' => $surname, 
    'gender' => $gender, 
    'birthdate' => $birthdate, 
    'address' => $address, 
    'city' => $city
];

http_response_code(200);
echo json_encode($user, JSON_THROW_ON_ERROR);

