<?php namespace App\Models\inicio;


use  CodeIgniter\Model;

class inicioModel extends Model{


    public function insert_vehiculo($data_vehiculo){

        //SI YA EXISTE EL VEHICULO SE LE ACTUALIZARÁ LA INFO


        $insert_vehiculo = $this->db->table('vehiculos')->replace($data_vehiculo);


        if(!$insert_vehiculo){
            return false;
        }


        return true;




    }


    public function get_data_usuario(){

        //TOMAR EL ID DEL USUARIO QUE TIENE LA SESIÓN PARA BUSCAR SU INFORMACIÓN

        $id_usuario = $_SESSION['id'];


        $get_data_usuario = $this->db->query('
            SELECT * FROM usuarios a
            LEFT JOIN cargos b
            ON a.id_cargo = b.id
            LEFT JOIN vehiculos c
            ON c.id_usuario = a.id
            
            WHERE a.id = ?

        ',array($id_usuario));
        
        $respuesta = $get_data_usuario->getResultArray();


        return $respuesta[0];
    



    }


}