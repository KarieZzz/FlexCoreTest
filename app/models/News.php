<?php


namespace app\models;

use vendor\core\Model;

class News extends Model
{
    /**
     * @return array
     */
    public function getNews()
    {
        $result = $this->db->row('SELECT title, description FROM news');
        return $result;
    }
}