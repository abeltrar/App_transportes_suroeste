<?php namespace App\Models\reservas;


use  CodeIgniter\Model;

class reservasModel extends Model{

    public function get_viajes($fecha_viaje,$id_destino){

      

        $query = $this->db->query("

            SELECT 
            a.cantidad_pasajeros_maxima,a.fecha_viaje,a.hora_salida,a.disponibilidad_encomiendas,a.posibilidad_mascotas,
            a.posibilidad_mascotas,a.novedades_viaje,b.destino,c.nombre AS nombre_conductor, d.placa,d.modelo,d.color,
            ifnull(reservas_count.count_reservas,0) as cantidad_registrados,a.id_usuario AS id_usuario_conductor,a.id AS id_viaje

            FROM viajes_conductor a 
            LEFT JOIN destinos b
            ON a.id_destino = b.id
            LEFT JOIN  usuarios c
            ON c.id = a.id_usuario
            LEFT JOIN vehiculos d
            ON d.id = a.id_vehiculo
            LEFT JOIN(

                SELECT COUNT(res.id) AS count_reservas, res.id_viaje FROM reservas res
                GROUP BY res.id_viaje
               
            ) AS reservas_count ON reservas_count.id_viaje = a.id
        
            WHERE a.id_destino = ?
            AND a.fecha_viaje = ?
            AND a.iniciado = 0
            AND ifnull(reservas_count.count_reservas,0) < a.cantidad_pasajeros_maxima

           
        
        
        ",array($id_destino,$fecha_viaje));

      

        return $query->getResult();

    }


    public function insert_data_reserva($data){

    
        
        $insert_viaje = $this->db->table('reservas')->insert($data);

        if(!$insert_viaje){
            return false;
        }


        return true;



    }


    public function get_info_reserva($id_usuario,$id_viaje){

        $query = $this->db->query("

           Select * from reservas a
           where a.id_usuario_reserva = ?
           and a.estado_reserva like '%Activo%'
           and a.id_viaje = ?


        ",array($id_usuario,$id_viaje));

        return $query ->getResult();
    }



}