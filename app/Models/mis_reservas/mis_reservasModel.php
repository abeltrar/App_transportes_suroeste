<?php namespace App\Models\mis_reservas;


use  CodeIgniter\Model;

class mis_reservasModel extends Model{

   

    public function get_mis_viajes(){

        $id_usuario = $_SESSION['id'];


        $get_mis_viajes = $this->db->query("
            SELECT a.id,a.estado_reserva,b.nombre AS conductor, c.fecha_viaje,c.hora_salida,d.destino, e.placa,e.modelo,
            a.fecha_creacion

            FROM reservas a
            LEFT JOIN usuarios b
            ON a.id_usuario_conductor = b.id
            
            LEFT JOIN viajes_conductor c
            ON c.id = a.id_viaje
            
            LEFT JOIN destinos d
            ON c.id_destino = d.id
            
            LEFT JOIN vehiculos e
            ON c.id_vehiculo = e.id

            where a.id_usuario_reserva = ?
        
        
        ",array($id_usuario));


        return $get_mis_viajes->getResult();



    }


    public function cancelar_viaje($id_viaje){

        $data = array(

            "estado_reserva" => "Cancelado"

        );

        $finalizarViaje = $this->db->table('reservas')
        ->where('id', $id_viaje)
        ->update($data);


        if(!$finalizarViaje){
            return false;
        }
        

        return true;





    }


}