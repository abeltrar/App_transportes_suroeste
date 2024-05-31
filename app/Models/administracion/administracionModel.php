<?php namespace App\Models\administracion;


use  CodeIgniter\Model;

class administracionModel extends Model{

    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Nombre de la clave primaria de la tabla

   public function get_user_data(){

        $data_usuario = $this->db->query('
        SELECT a.*, b.cargo FROM usuarios a
        left join cargos b
        on a.id_cargo = b.id ');

        return  $data_usuario ->getResult();

   }
   


   public function deleteUser($id_usuario){

        return $this->delete($id_usuario);



   }



   public function get_all_permits(){

     $data_usuario = $this->db->query('
        SELECT * FROM permisos ');

     return  $data_usuario ->getResult();

   }

     public function insert_data($data_insert){

         
         

          // Obtener el ID de usuario del array de datos
          $id_usuario = $data_insert[0]['id_usuario'];


         
          // Elimina las filas existentes para este ID de usuario
          $this->db->table('permisos_x_usuario')
               ->where('id_usuario', $id_usuario)
               ->delete();

          // Inserta las nuevas filas
          $insert_permisos = $this->db->table('permisos_x_usuario')->insertBatch($data_insert);

          if(!$insert_permisos){
               return false;
          }else{
               return true;
          }
      




      
      

        
         

     }


     public function get_permits_of_user($id_usuario){


          $data_usuario = $this->db->query('

              Select a.id_permiso from permisos_x_usuario a
              where a.id_usuario = ?'
          ,array($id_usuario));

        return  $data_usuario ->getResult();

     }

   


}