<?php

namespace core;

class App
{
    protected static $datas = [];
    public static function bind($key, $val)
    {
        static::$datas[$key] = $val;
    }
    public static function get($key)
    {
        return static::$datas[$key];
    }
}
