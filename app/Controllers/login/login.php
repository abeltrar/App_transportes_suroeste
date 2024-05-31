<?php

namespace App\Controllers\login;

use App\Controllers\BaseController;


class login extends BaseController
{
    //Se define variable protegida para cargar al modelo
    public $model;


    public function __construct(){

      //SE CARGA EL MODELO UNA VEZ PARA QUE NO SEA NECESARIO CARGARLO EN CADA FUNCIÓN

      $this->model = model('App\Models\login\loginModel');


      if(!$this->model){
        print_r("error al cargar modelo");
        die;
      }
      
            
    }
    



    public function index(){

    
        return view('login/login');
    }

    //FUNCIÓN PARA RECIBIR LA DATA QUE VIENE DE PARTE DEL USUARIO Y SE PUEDA HACER EL LOGIN
    public function login(){

        $request = service('request');
        $formData = $request->getPost();

        $usuario = $formData['usuario'];
        $password = $formData['password'];

    
        $data_usuario = $this->model->get_data_user($usuario);

   
        if(!$data_usuario){
            return json_encode(array("status" => "0", "data" => "Usuario no encontrado en la plataforma"));

        }

       

        if(password_verify($password, $data_usuario[0]['password'])){

           
            $session = session();
            $session->set('isLoggedIn', true);
            $baseUrl = base_url();

            
            $session->set('nombre', $data_usuario[0]['nombre']); // Guardar el nombre de usuario en la sesión
            $session->set('cargo', $data_usuario[0]['id_cargo']); // Guardar el cargo de usuario en la sesión
            $session->set('cedula', $data_usuario[0]['cedula']); // Guardar la cedula de usuario en la sesión
            $session->set('email', $data_usuario[0]['email']); // Guardar el email de usuario en la sesión
            $session->set('id', $data_usuario[0]['id']); // Guardar el id de usuario en la sesión
            $session->set('id_vehiculo', $data_usuario[0]['id_vehiculo']); // Guardar el id de vehiculo en la sesión


          
           return json_encode(array("status"=>"1","data"=> $baseUrl));



        }else{
           
           return json_encode(array("status"=>"0","data"=>"Credenciales inválidas"));

        }


    }

    public function registro(){

    
        $request = service('request');
        $formData = $request->getPost();
        $usuario = $formData['usuario'];
        $password = $formData['password'];
        $accion =  $formData['accion'];


       

     
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        
        $formData['password'] = $hashedPassword;

        if($accion == "create"){

            //Validar existencia del usuario en base de datos

            $validate_unique_user =  $this->model->validate_unique_user($usuario);

        
            if(count($validate_unique_user)>0){
                return json_encode(array("status"=>"0","data"=>"Usuario ya existe en la plataforma"));
            }

        }


       
        if($accion == "create_login" || $accion == "create" ){
            $insert_user = $this->model->insert_user($formData);
            if(!$insert_user){
                return json_encode(array("status"=>"0","data"=>"Error al crear usuario"));
            }
        }else{
            $update_user = $this->model->update_user($formData);
            if(!$update_user){
                return json_encode(array("status"=>"0","data"=>"Error al actualizar usuario"));
            }
        }
       

        $baseUrl = base_url();


       

        if($accion == "create_login"){

            //SE DEJA LOGUEADO AL REALIZAR EL REGISTRO

            $session = session();
            $session->set('isLoggedIn', true);
           

        }

        



        return json_encode(array("status"=>"1","data"=>"Usuario registrado correctamente","url"=>$baseUrl));


       


    }


    public function logout()
    {
        $session = session();
        $session->remove('isLoggedIn');
        return redirect()->to('/');
    }
}
