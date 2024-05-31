<?php

namespace App\Controllers\reservas;
use App\Controllers\BaseController;


class reservas extends BaseController
{

    //Se define variable protegida para cargar al modelo
    public $model;


    public function __construct(){

        //SE CARGA EL MODELO UNA VEZ PARA QUE NO SEA NECESARIO CARGARLO EN CADA FUNCIÓN

        $this->model = model('App\Models\reservas\reservasModel');


        if(!$this->model){
            print_r("error al cargar modelo");
            die;
        }
    
            
    }

    public function index(): string
    {

        // Iniciar sesión
        session_start();

        // Obtener el nombre de usuario de la sesión
        $nombre_usuario = $_SESSION['nombre'] ?? '';

        
        // Cargar la vista dentro del layout
        $data = [
            'nombre_usuario' => $nombre_usuario,
            'content_view' => view('reservas')
           
        ];

        // Cargar el layout y pasar la vista como contenido
        return view('main', $data);

       
    }

    public function get_viajes(){


        $request = service('request');
        $formData = $request->getPost();

        $fecha_viaje = $formData["fecha_viaje"];
        $id_destino = $formData["id_destino"];

    
        $get_viajes = $this->model->get_viajes($fecha_viaje,$id_destino);

    
        if(!$get_viajes){
            return json_encode(array("status"=>"0", "data"=>"No hay viajes disponibles en esta fecha"));
        }

        return json_encode(array("status"=>"1", "data"=>$get_viajes));




    }


    public function reservar_viaje(){

        $request = service('request');
        $formData = $request->getPost();

        $id_usuario = $_SESSION['id'];




        $decodedData = json_decode($formData['data'], true);

        $id_viaje = $decodedData["id_viaje"];

        
        //VALIDAR QUE EL USUARIO NO TENGA RESERVA

        $get_info_reserva = $this->model->get_info_reserva($id_usuario,$id_viaje);

        if($get_info_reserva){
            return json_encode(array("status"=>"0", "data"=>"Ya cuentas con reserva en este viaje"));

        }

       
        $data_insert = array(

            "id_usuario_reserva" => $_SESSION['id'],
            "id_usuario_conductor" => $decodedData["id_usuario_conductor"],
            "id_viaje" => $decodedData["id_viaje"],
            "estado_reserva" => "Activo"

        );

       
       
  
        $insert_data = $this->model->insert_data_reserva($data_insert);

        if(!$insert_data){
            return json_encode(array("status"=>"0", "data"=>"No se pudo reservar el viaje"));
        }

     

        return json_encode(array("status"=>"1", "data"=>"Reserva exitosa"));
 

    }

}