<?php namespace App\Models\login;


use  CodeIgniter\Model;

class loginModel extends Model{

    public function get_data_user($user_name){

  
        $data_usuario = $this->db->query('
        SELECT a.*, b.id as id_vehiculo
        FROM usuarios a 
        LEFT JOIN vehiculos b
        ON a.id = b.id_usuario
        WHERE a.usuario = ?',array($user_name));

        
        return $data_usuario->getResultArray();


     
    }

    public function validate_unique_user($usuario){
        $data_usuario = $this->db->query('SELECT * FROM usuarios a WHERE a.usuario = ?',array($usuario));

        return $data_usuario->getResultArray();


    }

    public function insert_user($formData){

  

      unset($formData["accion"]); 


   
      $insert_usuario =  $this->db->table('usuarios')->insert($formData);

      return $insert_usuario;




    }


    public function update_user($formData){

      unset($formData["accion"]); 
      $cedula = $formData['cedula'];

      
      
      
      $update_user = $this->db->table('usuarios')
                    ->where('cedula', $cedula)
                    ->update($formData);
      
     
      return $update_user;


    }

}