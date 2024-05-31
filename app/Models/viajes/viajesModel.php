<?php namespace App\Models\viajes;

use  CodeIgniter\Model;

class viajesModel extends Model{

    protected $table = 'viajes_conductor'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Nombre de la clave primaria de la tabla


    public function get_destinos(){

        $get_destinos = $this->db->query('
        SELECT * FROM destinos');

        return  $get_destinos ->getResult();



    }


    public function create_viaje($formData){

        unset($formData["accion"]); 
        unset($formData["id_viaje"]); 


        $insert_viaje = $this->db->table('viajes_conductor')->insertBatch($formData);

        if(!$insert_viaje){
            return false;
        }


        return true;

    }

    public function get_data_viajes($mode){

        $id_usuario = $_SESSION["id"];

        if($mode == "administracion"){
            $where = "";
        }else{
            $where = "WHERE a.id_usuario = $id_usuario";
        }

        $get_data_viajes = $this->db->query('
            SELECT a.* , b.nombre, c.placa,d.destino,
            if(e.id_viaje is null, 0, count(e.id_viaje)) as cantidad_pasajeros_registrados,
            if(a.iniciado=1 && a.hora_llegada is null ,"En camino",if(a.iniciado=1 && a.hora_llegada is not null,"Finalizado","Sin iniciar")) as estado
            FROM viajes_conductor a
            left join usuarios b
            on a.id_usuario = b.id
            left join vehiculos c
            on c.id = a.id_vehiculo
            left join destinos d
            on d.id = a.id_destino
            left join reservas e
            on e.id_viaje=a.id
            ' . $where . '
            GROUP BY a.id
            ORDER BY a.fecha_viaje DESC
            
          
        ');

        return  $get_data_viajes ->getResult();

    }


    public function update_viaje($formData){

        unset($formData["accion"]); 
       
        $id_viaje = $formData['id_viaje'];
        unset($formData["id_viaje"]); 


  
        
        
        
        $update_viaje = $this->db->table('viajes_conductor')
                      ->where('id', $id_viaje)
                      ->update($formData);
        
       
        return $update_viaje;
  
  
    }


    public function delete_viaje($id_viaje){
        return $this->delete($id_viaje);

    }


    public function finalizarViaje($id_viaje){

        // Establecer la zona horaria a Colombia
        date_default_timezone_set('America/Bogota');

        // Obtener la hora local de Colombia
        $hora_colombia = date("H:i:s");

        $data = array(
            "hora_llegada" => $hora_colombia 
        );

        $finalizarViaje = $this->db->table('viajes_conductor')
                        ->where('id', $id_viaje)
                        ->update($data);


       if(!$finalizarViaje){
         return false;
       }


       return true;
                        
    }


    public function iniciarViaje($id_viaje){

        $data = array(
            "iniciado" => 1 
        );

        $iniciarViaje = $this->db->table('viajes_conductor')
                        ->where('id', $id_viaje)
                        ->update($data);


       if(!$iniciarViaje){
         return false;
       }


       return true;
                        
    }



  


}