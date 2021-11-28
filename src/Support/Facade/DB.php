<?php

namespace Ryodevz\PhpQueryBuilder\Support\Facade;

use Ryodevz\PhpQueryBuilder\Support\Connection;

class DB extends Connection
{
    public static function select(string $table = null, int $primaryKey = null)
    {
        return self::connection()->from($table, $primaryKey);
    }

    public static function insert(string $table = null, array $values = [])
    {
        return self::connection()->insertInto($table, $values);
    }

    public static function update(string $table = null, $set = [], int $primaryKey = null)
    {
        return self::connection()->update($table, $set, $primaryKey);
    }

    public static function delete(string $table = null, int $primaryKey = null)
    {
        return self::connection()->deleteFrom($table, $primaryKey);
    }

    protected static function connection()
    {
        return (new Connection)->conn();
    }
}
