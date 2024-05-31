<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<link rel="stylesheet" href="css/administracion/administracion.css">
<script src="js/administracion.js"></script>


<div class="container-lg">
    <div id="miniAlert" class="alert-success"></div>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2 class="color_text_tittle">Usuarios <i class="fa fa-users" aria-hidden="true"></i></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new" onclick="register()"><i class="fa fa-plus"></i> Nuevo </button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cédula</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>   

<div class="modal fade" id="modal_registro" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="testbox">
                    <h1>Usuarios <i class="fa fa-plus-square-o"></i></h1>

                    <form id="form_register" method="post">

                        <input type="hidden" name="accion" id="accion" value="crear">

                        <hr>
                        <div class="accounttype">

                            <input type="radio" value="1" id="rbconductor" name="id_cargo" checked/>
                            <label for="rbconductor" class="radio" chec>Pasajero</label>
                            <input type="radio" value="2" id="rbpasajero" name="id_cargo" />
                            <label for="rbpasajero" class="radio">Conductor</label>
                        
                        
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-sm-12">

                                <label id="icon" for="usuario"><i class="fas fa-users"></i></label>
                                <input type="text" name="usuario" id="usuario" placeholder="Usuario" required/>
                                <label id="icon" for="nombre"><i class="fa fa-user-circle"></i></label>
                                <input type="text" name="nombre" id="nombre" placeholder="Nombres" required/>

                            </div>

                           

                        </div>

                        <div class="row">

                            <div class="col-sm-12">

                                <label id="icon" for="password"><i class="fa fa-unlock-alt"></i></label>
                                <input type="password" name="password" id="password" placeholder="Contraseña"/>
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
                            <input type="submit" value="Registrarse" id="btn_register" class="btn float-right register_btn">
                        </div>
                    </form>
                    </div>

                
                    
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            
            </div>
            </div>
        </div>
    </div>




<!-- Modal -->
<div class="modal fade" id="modal_permits" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_permits_tittle">Asignar permisos usuario <i class="fa fa-user-secret" aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">


            <table id="permisosTabla">
                <thead>
                    <tr>
                        <th>Permiso <i class="fa fa-user" aria-hidden="true"></i></th>
                        <th>Activar <i class="fa fa-check-circle" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>


            <div class="form-group d-flex justify-content-center align-items-center mt-2 ">
                <input type="submit" value="Guardar" onclick="guardarPermisos()" class="btn btn-success mr-2">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>





   
        </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>