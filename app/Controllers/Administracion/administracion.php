<?php

namespace App\Controllers\Administracion;
use App\Controllers\BaseController;


class Administracion extends BaseController
{

     //Se define variable protegida para cargar al modelo
    public $model;


     public function __construct(){
 
       //SE CARGA EL MODELO UNA VEZ PARA QUE NO SEA NECESARIO CARGARLO EN CADA FUNCIÓN
 
       $this->model = model('App\Models\administracion\administracionModel');
 
 
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
            'content_view' => view('administracion')
           
        ];

        // Cargar el layout y pasar la vista como contenido
        return view('main', $data);

       
    }


    public function get_user_data(){


        $get_user_data = $this->model->get_user_data();

        if(!$get_user_data){
            die(json_encode(array("status"=>"0","data"=>"Ningún dato encontrado")));
        }

        die(json_encode(array("status"=>"1","data"=>$get_user_data)));

    }

    public function deleteUser(){

        $request = service('request');
        $formData = $request->getPost();

        $id_usuario = $formData["id"];

        $delete_user = $this->model->deleteUser($id_usuario);

        if(!$delete_user){
            die(json_encode(array("status"=>"0","data"=>"Error al eliminar el usuario")));

        }

        die(json_encode(array("status"=>"1","data"=>"Usuario eliminado exitosamente")));





    }

    public function get_all_permits(){

        $get_all_permits = $this->model->get_all_permits();

        if(!$get_all_permits){
            die(json_encode(array("status"=>"0","data"=>"Error al consultar permisos")));

        }

        die(json_encode(array("status"=>"1","data"=>$get_all_permits)));





    }


    public function guardarPermisos(){

        $request = service('request');
        $formData = $request->getPost();

        $data_insert = array();

        $permisos = $formData['permisos'];
        $id_usuario = $formData['id_usuario'];


        foreach($permisos as $permiso){

            $data_final = array(

                "id_permiso" => $permiso,
                "id_usuario" => $id_usuario


            );

            array_push( $data_insert,$data_final);

        }

       //INSERT DATA 

       $insert_data = $this->model->insert_data($data_insert);

       if(!$insert_data){
            die(json_encode(array("status"=>"0","data"=>"Error en la creación de los permisos")));

       }


       die(json_encode(array("status"=>"1","data"=>"Permisos creados con éxito")));




    }


    public function get_permits_of_user(){

        
        $request = service('request');
        $formData = $request->getPost();

        $id_usuario = $formData["id_usuario"];

        $get_permits_of_user = $this->model->get_permits_of_user($id_usuario);

        if(!$get_permits_of_user){
            die(json_encode(array("status"=>"0","data"=>"Error al consultar los permisos")));

        }

        die(json_encode(array("status"=>"1","data"=>$get_permits_of_user)));


    }






}