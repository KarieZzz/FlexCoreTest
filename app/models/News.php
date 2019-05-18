<?php


namespace app\models;

use vendor\core\Model;

/**
 * Class News
 * @package app\models
 */
class News extends Model
{
    /**
     * @return array
     */
    public function getNews()
    {

        $result = $this->db->row('SELECT description FROM news');
        return $result;
    }
}