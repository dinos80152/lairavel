<?php

namespace App;

class Config
{
    public static $directory;
    public static $config = [];

    public static function setDirectory($path)
    {
        self::$directory = $path;
    }

    public static function get($config)
    {
        $config = strtolower($config);

        self::$config[$config] = require self::$directory.'/'.$config.'.php';

        return self::$config[$config];
    }
}
