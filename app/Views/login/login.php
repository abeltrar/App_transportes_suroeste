

<!DOCTYPE html>
<html>
<head>
	<title>Transportes</title>
   <!--Made with love by Mutiullah Samim -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">



   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <script src="bootstrap/js/bootstrap.min.js"></script>

   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
   <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">


	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login/login.css">
    <script src="js/login.js"></script>

</head>
<body>
    <div class="container">
        <div id="miniAlert" class="alert-success"></div>

        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="loginForm" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="usuario" class="form-control" placeholder="username" require>
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password" require>
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Recordar
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Ingresar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿No tienes cuenta?<a href="#" onclick="register()">Registrarse</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">¿Olvidaste tu constraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        

    <!-- Vertically centered modal -->

    <div class="modal fade" id="modal_registro" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="testbox">
                    <h1>Registro <i class="icon-edit"></i></h1>

                    <form id="form_register" method="post">
                     <input type="hidden" name="accion" id="accion" value="crear">

                        <hr>
                        <div class="accounttype">

                            <input type="radio" value="1" id="rbconductor" name="id_cargo" checked/>
                            <label for="rbconductor" class="radio" chec>Conductor</label>
                            <input type="radio" value="2" id="rbpasajero" name="id_cargo" />
                            <label for="rbpasajero" class="radio">Pasajero</label>
                        
                        
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-sm-12">

                                <label id="icon" for="usuario"><i class="fas fa-users"></i></label>
                                <input type="text" name="usuario" id="usuario" placeholder="Usuario" required/>
                                <label id="icon" for="nombre"><i class="icon-user"></i></label>
                                <input type="text" name="nombre" id="nombre" placeholder="Nombres" required/>

                            </div>

                           

                        </div>

                        <div class="row">

                            <div class="col-sm-12">

                                <label id="icon" for="password"><i class="icon-shield"></i></label>
                                <input type="password" name="password" id="password" placeholder="Contraseña" required/>
                                <label id="icon" for="cedula"><i class="fas fa-id-card"></i></label>
                                <input type="number" name="cedula" id="cedula" placeholder="Cédula" required/>

                            </div>

                            
                        </div>

                        <div class="row">

                            <div class="col-sm-12">

                                <label id="icon" for="celular"><i class="fas fa-phone"></i></label>
                                <input type="number" name="celular" id="celular" placeholder="celular" required/>

                                <label id="icon" for="email"><i class="fas fa-envelope-square"></i></label>
                                <input type="text" name="email" id="email" placeholder="email" required/>



                            </div>

                          
                            

                        </div>
                       
                       
                       
                        
                       
                        
                        <div class="form-group">
                            <input type="submit" value="Registrarse" class="btn float-right register_btn">
                        </div>
                    </form>
                    </div>

                
                    
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    


</body>
</html>



