<?php

abstract class Model
{
    protected static $table;

    protected static $fillable;

    public static function all()
    {
        $query = "SELECT * FROM ". static::$table;
        $result = Database::execute($query);
        $models = array_map(function($item) {
            $object = new static();
            foreach ($item as $key => $value) {
                $object->$key = $value;
            }
            return $object;
        }, $result->fetch_all());
        return $models;
    }
}
