<?php


namespace vendor\core;

use vendor\libs\Db;

/**
 * Class Model
 * @package vendor\core
 */
abstract class Model
{

    /**
     * @var Db
     */
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = new Db;
    }
}