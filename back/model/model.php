<?php

namespace projeto1\Model;

use projeto1\System\Database;

abstract class Model
{

    public $bd;

    public function conectar($db)
    {
        $options = [
            'host' => MYSQL_HOST,
            'database' => MYSQL_DATABASE,
            'username' => MYSQL_USERNAME,
            'password' => MYSQL_PASSWORD
        ];
        $this->$db = new Database($options);
    }

    public function query($sql = "", $params = [])
    {
        return $this->bd->execute_query($sql, $params);
    }
}
