<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include $_SERVER['DOCUMENT_ROOT'] . '/core/App.php';

$app = new App(__DIR__, App::initDB(), 'POST');

App::response([
    'method' => $_SERVER['REQUEST_METHOD'],
    'data' => $app->data,
    'auth' => 'no-auth',
]);
