<?php

namespace Core;

class Database
{
    static $db;

    public static function init($name, $user, $password)
    {
        if (!empty(self::$db)) {
            return self::$db;
        }
        try {
            $db = new \PDO(
                'mysql:host=localhost;dbname=' . $name,
                $user,
                $password
            );
            self::$db = $db;
            return $db;
        } catch (\PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
