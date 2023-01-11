<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/utils.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cfg.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/core/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/core/SkeletonAPI.php';

class App
{
    public $api;
    public $data;
    public static $db;

    public function __construct($dir, $db, $method = 'GET')
    {
        if ($_SERVER['REQUEST_METHOD'] !== $method) {
            self::response([
                'method' => $_SERVER['REQUEST_METHOD'],
                'error' => '[!] Измените метод запроса на ' . $method,
            ]);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $json = file_get_contents('php://input');
            $this->data = json_decode($json, true);
        }
        $this->initAPI($dir, $db);
    }

    private function initAPI($dir, $db)
    {
        $objFile = ucfirst(basename($dir)) . '.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/objects/' . $objFile;
        $objName = str_replace('.php', '', $objFile);
        $this->api = new $objName($_GET, $db);
    }

    public static function initDB()
    {
        $db = Database::init(
            config['DB_NAME'],
            config['DB_USER'],
            config['DB_PASSWORD'],
        );
        // error db
        if (is_array($db)) {
            self::response($db);
        }
        return $db;
    }

    public static function response(array $data)
    {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die;
    }
}
