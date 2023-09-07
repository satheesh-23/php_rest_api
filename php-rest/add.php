<?php
include('db.php');
include('function.php');

header('Access-Control-Allow-Origin');
header('Content-Type: application/json');
header('Access-Control-Allow-Method:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Header,Authorization,X-Request-with');

$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method == 'POST') {
    $inputdata = json_decode(file_get_contents('php://input'), true);
    if (empty($inputdata)) {
        $store = store($_POST);

    } else {
        $store = store($inputdata);
    }

    echo $store;
} else {
    $data = [
        'message' => $request_method . ' method not allowed',

    ];

    echo json_encode($data);
}



?>