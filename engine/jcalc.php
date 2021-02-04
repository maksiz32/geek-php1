<?php
$data = json_decode(file_get_contents('php://calc'));
$response = [
    'operation1' => $data->operation1,
    'operation2' => $data->operation2,
    'operationType' => $data->operationType,
];
header('Content-type: application/json');
return json_encode($response);