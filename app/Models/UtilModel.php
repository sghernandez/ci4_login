<?php

namespace App\Models;
use App\Models\BaseModel;

class UtilModel extends BaseModel
{
    public function __construct() {
        parent::__construct();
    }
        
    public function pdoConn()
    {
        $dns = 'mysql:host='. getenv('database.default.hostname'). ';dbname='. getenv('database.default.database'). ';charset=utf8';

        $pdo = new \PDO($dns, getenv('database.default.username'), getenv('database.default.password'));	 
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);    
        
        return $pdo;
    }      
  
}