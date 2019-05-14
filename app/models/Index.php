<?php


namespace app\models;


class Index
{
    public function getNavigation()
    {

        $result = $this->db->row('SELECT title, description FROM news');
        return $result;
    }
}