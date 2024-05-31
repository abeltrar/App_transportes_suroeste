<?php

namespace App\Controllers\mis_reservas;
use App\Controllers\BaseController;

class mis_reservas extends BaseController
{

     //Se define variable protegida para cargar al modelo
     public $model;


     public function __construct(){
 
         //SE CARGA EL MODELO UNA VEZ PARA QUE NO SEA NECESARIO CARGARLO EN CADA FUNCIÓN
 
         $this->model = model('App\Models\mis_reservas\mis_reservasModel');
 
 
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
             'content_view' => view('mis_reservas')
            
         ];
 
         // Cargar el layout y pasar la vista como contenido
         return view('main', $data);
 
        
     }


    public function get_mis_viajes(){


        $get_mis_viajes = $this->model->get_mis_viajes();

        if(!$get_mis_viajes){
            return json_encode(array("status"=>"0","data"=>"Sin reversas encontradas"));
        }

    
        return json_encode(array("status"=>"1","data"=>$get_mis_viajes));
    }


    public function cancelar_viaje(){

        $request = service('request');
        $formData = $request->getPost();

        $id_viaje = $formData["id"];

        $cancelar_viaje = $this->model->cancelar_viaje($id_viaje);

        if(!$cancelar_viaje){

            return json_encode(array("status"=>"0","data"=>"error al cancelar el viaje"));
        }

        return json_encode(array("status"=>"1","data"=>"Reserva cancelada con éxito"));


    }



}