<?php

class Database
{

    private static $connection = null;

    public static function getConnection()
    {
        try {
            if (static::$connection == null) {
                $connection = new PDO("mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE, DB_USERNAME, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                static::$connection = $connection;
            }
            return static::$connection;
        } catch (PDOException $e) {
            abort(500, "Database Error: " . $e->getMessage());
        }
    }

    public static function execute($query)
    {
        return static::getConnection()->query($query);
    }
}

