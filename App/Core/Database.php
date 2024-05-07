<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $host = "localhost";
    private static $dbname = "Products";
    private static $username = "ritvars";
    private static $password = "123";

    public static function getConnection()
    {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Error connecting to database: " . $e->getMessage();
            return null;
        }
    }
}
