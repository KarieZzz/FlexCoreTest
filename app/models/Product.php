<?php

namespace app\models;

use vendor\core\Model;

/**
 * Class Product
 * @package app\models
 */
class Product extends Model
{
    /**
     * @return array
     */
    public function getList()
    {

        $result = $this->db->row('SELECT name FROM products WHERE id<5');
        return $result;
    }
}