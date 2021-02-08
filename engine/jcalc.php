<?php
function jcalc($op1, $op2, $opType) {
    $res['result'] = mathOperation($op1, $op2, $opType);
    return json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

// $data = json_decode(file_get_contents('php://calc'));
// $response = [
//     'operation1' => $data->operation1,
//     'operation2' => $data->operation2,
//     'operationType' => $data->operationType,
// ];
// header('Content-type: application/json');
// return json_encode($response);