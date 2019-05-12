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
        $config = require '../app/components/db.php';
        $this->db = new PDO(
            'mysql:host='
            . $config['host'].';port='.$config['port']
            . ';dbname='
            . $config['name'] . '',
            $config['user'],
            $config['password']);
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
}