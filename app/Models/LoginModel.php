<?php

namespace App\Models;
use App\Models\BaseModel;

class LoginModel extends BaseModel
{
    public function __construct() 
    {
        parent::__construct();
    }
             

/*
  -------------------------------------------------------------------
  Nombre: logIn
  -------------------------------------------------------------------
  Descripción: valida la información enviada desde el formulario de login
  -------------------------------------------------------------------
  Entradas: Post
  -------------------------------------------------------------------
  Salida: False o redireccionamiento
  -------------------------------------------------------------------
 */     
  function logIn()
  {     
       $password = $this->request->getPost('password');

       $builder = $this->db->table('usuarios');        
       $res = $builder->limit(1)
         ->where('email', $this->request->getPost('email'))
		->get();
   
       if($res->getResult()) 
       {                         		   
            $user = $res->getRow();
            if(password_verify($password, $user->password))
            {                                
                // si el password necestia actualizar el hash
                if (password_needs_rehash($user->password, PASSWORD_BCRYPT, Config('AppConfig')->pass_cost))
                {
                    $update = ['password' => hashPassword($password)];
                    $this->db->table('usuarios')->update($update, ['id' => $user->id]);                      
                }    
                
                return $this->setSession($user);
            } 
       }
               
       return FALSE;
  }  


  /* setSession: define las variables de session */
  public function setSession($user)
  {
      $sess = [
          'isLoggedIn' => TRUE,
          'id_user' => $user->id,
          'name' => "$user->nombre $user->apellido"
      ];

      session()->set($sess);       
  }

  
  
}