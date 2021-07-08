<?php

namespace App\DB;

class DB{

	 private static $pdo;
     public static $static = 'Value of static from DB';
     
     public function __construct()
     {
        $util = new \App\Models\UtilModel();
        self::$pdo = $util->pdoConn();        
     }

 	 
    /* insert - ingresa un registro en la tabla*/
    public static function insert($table, $array)
    {   
        $cols = $binds = '';    
        foreach ($array as $key => $data){
            $cols .= "$key,";
            $binds .= '?,';
            $insert[] = $data;
        }               

        try 
        {
            $sql = "INSERT INTO `$table` (" . rtrim($cols, ',') . ") VALUES (" . rtrim($binds, ',') .")";
            return self::$pdo->prepare($sql)->execute($insert);             
        } 
        catch (\PDOException $e) 
        {
            return $e->getMessage();
        }
    }   
    
	
    /* update => actualiza un registro */
    public static function update($table, $array, $index) 
    {
        $cols = $binds = '';    
        foreach ($array as $key => $data)
        {
		   if($key != $index){ $cols .= "$key=?,";  }           
           $update[] = $data;
        }
        
        try 
        {            
            $sql = "UPDATE  `$table` SET " . rtrim($cols, ',') . " WHERE $index=?";
            return self::$pdo->prepare($sql)->execute($update); 
        } 
        catch (\PDOException $e) 
        {
            return $e->getMessage();
        }
       
    }
	
    /* delete - borra un registro de la tabla: "$table" con el id: "$id"
       retorna: boolean  */
    public static function delete($table, $idArray) 
    {		
		foreach ($idArray as $key => $id){
			$field_id = $key;
		}
		
        try 
        {
            $stm = self::$pdo->prepare("DELETE FROM $table WHERE idArray = ?");
            return $stm->execute([$id]);
        } 
        catch (\PDOException $e) 
        {
            return $e->getMessage();
        }
    }
	
	
    /* getRow - retornas un registro de la tabla: "$table"
       retorna: resultados de la consulta */
    public static function getRow($table, $idArray) 
    {		
		foreach ($idArray as $key => $id){ $field = $key; }		

        try 
        {            
            $stm = self::$pdo->prepare("SELECT * FROM $table WHERE $field = ? LIMIT 1");
            $stm->execute([$id]);
			
			return $stm->fetch();
        } 
        catch (\PDOException $e) 
        {
            return $e->getMessage();
        }
    }	


    /* getRows - retornas los registros de la tabla: "$table"
       retorna: resultados de la consulta */
       public static function getRows($table, $idArray=[]) 
       {		
           try 
           {            
               $stm = self::$pdo->prepare("SELECT * FROM $table");  
               $stm->execute();             
               return $stm->fetchAll();
           } 
           catch (\PDOException $e) 
           {
               return $e->getMessage();
           }
       }	    
		

     public static function sp()
     {
        $published_year = 2010;
        $sql = 'CALL get_books(:published_year)';
        
        try {

            $statement = self::$pdo->prepare($sql);        
            $statement->bindParam(':published_year', $published_year, \PDO::PARAM_INT);        
            $statement->execute();
        
            return $statement->fetchAll(\PDO::FETCH_ASSOC);        
        } 
        catch (\PDOException $e) 
        {
            return $e->getMessage();
        }


     }
    	
}