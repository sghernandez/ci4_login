<?php

namespace App\Models;
use CodeIgniter\Model;

class BaseModel extends Model
{    
    public function __construct() 
    {   
        /* De este modo definimos la conexión, podemos trabajar con solucitudes post, get... 
         * y podemos validar formularios. En los modelos que extienden este. "BaseModel"
         */
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();   
    }    
          
    
} // Finaliza la clase
