<?php
namespace application\models;

use PDO;

class DB {

    protected $host = 'localhost';
    protected $db = 'rss';
    protected $user = 'root';
    protected $pass = '415263';
    protected $charset = 'utf8';

    protected $instance = null;

    public function __construct() {
        if (empty($this->instance)) {
            $this->instance = $this->connect();
        };
    }

    public function get(){
        return $this->instance;
    }

    protected function connect(){
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new PDO($dsn, $this->user, $this->pass, $opt);
    }
}
