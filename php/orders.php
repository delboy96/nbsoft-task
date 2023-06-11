<?php

require_once 'conn.php';
require_once '../repositories/OrderRepository.php';

header('Content-type: application/json, charset=utf-8');

$orderRepository = new OrderRepository($conn);
$orders = $orderRepository->getAll();

http_response_code(200);
echo json_encode($orders, JSON_THROW_ON_ERROR);