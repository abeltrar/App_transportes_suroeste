<?php

namespace App\Controllers\Home;
use App\Controllers\BaseController;


class Home extends BaseController
{

     //Se define variable protegida para cargar al modelo
    public $model;


     public function __construct(){
 
       //SE CARGA EL MODELO UNA VEZ PARA QUE NO SEA NECESARIO CARGARLO EN CADA FUNCIÓN
 
       $this->model = model('App\Models\inicio\inicioModel');
 
 
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
            'content_view' => view('welcome_message')
           
        ];

        // Cargar el layout y pasar la vista como contenido
        return view('main', $data);

       
    }


    public function guardar_data_vehiculo(){
        $request = service('request');
        $formData = $request->getPost();
        $data_foto = array();

        $user_id = array(

            "id_usuario" => $_SESSION["id"]

        );



        if(!empty($_FILES["img_vehiculo"])){ 

            $foto_vehiculo = $_FILES["img_vehiculo"];

           

            //VERIFICAR QUE NO HAYA ERRORES EN LA SUBIDA DEL ARCHIVO

            if($foto_vehiculo['error']== UPLOAD_ERR_OK){
                //MOVER ARCHIVO A LA UBICACIÓN DESEADA

                $nombre_archivo = $foto_vehiculo['name'];
                $ruta_destino = 'img/'.$nombre_archivo;

                if(move_uploaded_file($foto_vehiculo['tmp_name'],$ruta_destino)) {

                    $data_foto = array(
                        "img_vehiculo"=>$ruta_destino
                    );


                   $insert_data = array_merge( $formData , $data_foto , $user_id);


                }else{

                    $insert_data = array_merge($user_id,$formData);
                }

               
            }

        }


        //INSERTAR DATA EN LA TABLA VEHICULOS


        $insert_vehiculo = $this->model->insert_vehiculo($insert_data);

        if(!$insert_vehiculo) {

            return json_encode(array("status" => "0", "data" => "Error al ingresar información de vehiculo"));


        }


        return json_encode(array("status" => "1", "data" => "Creado satisfactoriamente"));


       

    }


    //TOMAR INFO DE USUARIO PARA VISTA DE MI PERFIL

    public function get_data_usuario(){


        $get_data_usuario = $this->model->get_data_usuario();

        if(!$get_data_usuario){
            return json_encode(array("status"=>"0","data"=>"No se encontró información del usuario"));
        }

        return json_encode(array("status"=>"1","data"=>$get_data_usuario));





    }
}
