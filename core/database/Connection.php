<?php

class Connection
{
    public static function make($config)
    {
        try {
            return  new PDO("{$config['host']};dbname={$config['dbName']}", "{$config['username']}", "{$config['password']}");
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
        }
    }
}
