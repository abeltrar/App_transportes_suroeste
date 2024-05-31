<?php

namespace App\Controllers\Viajes;
use App\Controllers\BaseController;


class Viajes extends BaseController
{

     //Se define variable protegida para cargar al modelo
    public $model;


    public function __construct(){
 
       //SE CARGA EL MODELO UNA VEZ PARA QUE NO SEA NECESARIO CARGARLO EN CADA FUNCIÓN
 
       $this->model = model('App\Models\viajes\viajesModel');
 
 
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
            'content_view' => view('viajes')
           
        ];

        // Cargar el layout y pasar la vista como contenido
        return view('main', $data);

       
    }

    public function get_destinos(){

        $get_destinos = $this->model->get_destinos();

        if(!$get_destinos){
            return json_encode(array("status"=>"0","data"=>"No se pudo obtener los destinos"));
        }
        

        return json_encode(array("status"=>"1","data"=>$get_destinos));




    }


    public function guardar_viaje(){

        $request = service('request');
        $formData = $request->getPost();

   

        //TOMAR DE LAS VARIABLES DE SESIÓN LA DATA DEL USUARIO CREADOR

        $id_usuario = $_SESSION['id'];
        $id_vehiculo = $_SESSION['id_vehiculo'];

    
        $formData["id_usuario"] = $id_usuario;
        $formData["id_vehiculo"] = $id_vehiculo;

        if($formData["accion"] == "crear"){

            $insert_viaje = $this->model->create_viaje($formData);

            if (!$insert_viaje) {
                return json_encode(array("status"=>"0", "data"=>"Error al crear el viaje, intentalo nuevamente."));
            }
     
     
             return json_encode(array("status"=>"1", "data"=>"Viaje creado exitosamente"));
     

        }else{

            
            $update_viaje = $this->model->update_viaje($formData);



            if (!$update_viaje) {
                return json_encode(array("status"=>"0", "data"=>"Error al actualizar el viaje, intentalo nuevamente."));
            }
     
     
             return json_encode(array("status"=>"1", "data"=>"Viaje actualizado exitosamente"));
     

        }


      
    }


    public function delete_viaje(){
        $request = service('request');
        $formData = $request->getPost();

        $id_viaje = $formData["id"];


        $delete_viaje = $this->model->delete_viaje($id_viaje);

        if(!$delete_viaje){
            return json_encode(array("status"=>"0", "data"=>"Error al eliminar el viaje"));

        }

        return json_encode(array("status"=>"1", "data"=>"Viaje eliminado satisfactoriamente"));


    }


    public function get_data_viajes(){
        $request = service('request');
        $formData = $request->getPost();

        $mode = $formData["modulo"];

        $get_data_viajes = $this->model->get_data_viajes($mode);

        if(!$get_data_viajes){
            return  json_encode(array("status"=>"0", "data"=>"No se encontraron viajes"));
        }

        return  json_encode(array("status"=>"1","data"=>$get_data_viajes));

    }


    public function finalizarViaje(){
        $request=service('request');
        $formData=$request->getPost();

        $id_viaje = $formData['id'];

        //MANDAR UN 1 AL INICIADO PARA FINALIZAR EL VIAJE

        $finalizarViaje = $this->model->finalizarViaje($id_viaje);
        
        if (!$finalizarViaje){
            return json_encode(array("status"=>"0", "data"=>"Error al finalizar el viaje"));

        }

        return json_encode(array("status"=>"1", "data"=>"Viaje finalizado"));


    }

    
    public function iniciarViaje(){
        $request=service('request');
        $formData=$request->getPost();

        $id_viaje = $formData['id'];

        //MANDAR UN 1 AL INICIADO PARA FINALIZAR EL VIAJE

        $iniciarViaje = $this->model->iniciarViaje($id_viaje);
        
        if (!$iniciarViaje){
            return json_encode(array("status"=>"0", "data"=>"Error al iniciar el viaje"));

        }

        return json_encode(array("status"=>"1", "data"=>"Viaje Iniciado"));


    }
        
    


}