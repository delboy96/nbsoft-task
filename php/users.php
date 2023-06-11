<?php

require_once 'conn.php';
require_once '../repositories/UserRepository.php';

header('Content-type: application/json, charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);

if(empty($data)){
    http_response_code(400);
    echo json_encode(['message' => 'Validation failed']);
}

$userRepository = new UserRepository($conn);
$userId = $userRepository->create($data);

http_response_code(201);
echo json_encode(['id' => $userId]);