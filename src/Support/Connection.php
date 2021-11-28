<?php

namespace Ryodevz\PhpQueryBuilder\Support;

use Envms\FluentPDO\Query;
use PDO;

class Connection
{
    protected $host;

    protected $username;

    protected $password;

    protected $database;

    protected $path;

    public function __construct()
    {
        $this->setPath();
        $this->setConfig();
    }

    protected function conn()
    {
        $pdo = new PDO('mysql:dbname=' . $this->database, $this->username, $this->password);
        $conn = new Query($pdo);

        return $conn;
    }

    protected function setConfig()
    {
        $config = require_once $this->path;

        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];

        return $config;
    }

    protected function setPath()
    {
        if (file_exists('config.php')) {
            return $this->path = 'config.php';
        }

        return $this->path = __DIR__ . '/config.php';
    }
}
