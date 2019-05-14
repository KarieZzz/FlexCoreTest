<?php

namespace vendor\libs;

use PDO;

/**
 * Class Db
 * @package vendor\libs
 */
class Db
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $this->connectToDB('../app/components/db.php');
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool|\PDOStatement
     */
    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    private function connectToDB(string $configPath)
    {
        $config = require $configPath;
        $this->db= new PDO(
            $config['driver'].':host='
            . $config['host'].';port='.$config['port']
            .';unix_socket='.$config['unix_socket']
            . ';dbname='.$config['name'].'',
            $config['user'],
            $config['password']);

    }
}