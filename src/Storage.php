<?php

use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\Filesystem;

class Storage
{
    private static $instance = null;

    private static function getInstance()
    {
        if (is_null(static::$instance)) {
            $adapter = new LocalFilesystemAdapter(ROOT_PATH . '/storage');
            static::$instance = new Filesystem($adapter);
        }

        return static::$instance;
    }

    public static function upload($directory, $file, $filename = null)
    {
        $stream = fopen($file["tmp_name"], 'r+');
        $filesystem = static::getInstance();
        $filename ??= uniqid() . "-" . $file["name"];
        $fullpath = $directory ."/" . $filename;
        $filesystem->writeStream($fullpath, $stream);
        return $fullpath;
    }

    public static function download($path, $name = null)
    {
        $filesystem = static::getInstance();
        $response = $filesystem->read($path);

        $name ??= $path;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . $name . "\""); 
        echo $response; 
    }
}