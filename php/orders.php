<?php

require_once 'conn.php';

header('Content-type: application/json, charset=utf-8');

$orders = ordersIndex($conn);

http_response_code(200);
echo json_encode($orders, JSON_THROW_ON_ERROR);