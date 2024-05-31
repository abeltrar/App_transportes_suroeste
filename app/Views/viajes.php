<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<link rel="stylesheet" href="css/viajes/viajes.css">
<script src="js/viajes.js"></script>


<div class="container-lg">
    <div id="miniAlert" class="alert-success"></div>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2 class="color_text_tittle">Viajes <i class="fa fa-car car" aria-hidden="true"></i></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new" onclick="new_viaje()"><i class="fa fa-plus"></i> Nuevo </button>
                    </div>

                </div>
                <input type="text" id="filtro" placeholder="Buscar..."  />

            </div>
            <div class="container_table">
               

                <table class="table table-bordered" id="tabla">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Conductor</th>
                            <th>Placa vehiculo</th>
                            <th>Destino</th>
                            <th>Cantidad máxima pasajeros</th>
                            <th>Cantidad pasajeros registrados</th>
                            <th>Fecha viaje</th>
                            <th>Hora llegada</th>
                            <th>Hora salida</th>
                            <th>¿Encomiendas?</th>
                            <th>¿Mascotas?</th>
                            <th>Novedades</th>
                            <th>Fecha creación</th>
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
</div>   


<div class="modal" tabindex="-1" role="dialog" id="modal_create_viaje">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_viajes">
        <div class="container contact-form">
                <div class="contact-image">
                    <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
                </div>
                <form id="form_guardar_viaje" method="post" method="post">
                    <h3>Registro de viajes</h3>
                    <div class="row">
                      


                            <div class="col-md-6">
                                <input type="hidden" name="accion" id="accion" value="crear">
                                <input type="hidden" name="id_viaje" id="id_viaje">

                                <div class="form-group">
                                    <label>Destino <i class="fa fa-bus" aria-hidden="true"></i></label>
                                    <select class="form-control" name="id_destino" id="id_destino" required>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>N° pasajeros máxima <i class="fa fa-users" aria-hidden="true"></i></label>
                                    <input type="number" name="cantidad_pasajeros_maxima" id="cantidad_pasajeros_maxima" class="form-control" placeholder="Cantidas pasajeron máxima*" value="" required />
                                </div>
                               
                            
                                <div class="form-group">
                                    <label>Novedades viaje <i class="fa fa-plus-circle" aria-hidden="true"></i></label>

                                    <input type="text" name="novedades_viaje" id="novedades_viaje" class="form-control" placeholder="Ingrese novedades " value="" required />
                                </div>

                                <div class="form-group">
                                    <label>Hora salida </label>

                                    <input type="time" name="hora_salida" id="hora_salida" class="form-control" placeholder="Hora salida *" value="" required/>
                                </div>
                            

                            
                                
                            </div>

                            <div class="col-md-6">

                                

                                <div class="form-group">
                                    <label>¿Encomiendas? <i class="fa fa-paper-plane" aria-hidden="true"></i></label>

                                    <select class="form-control" name="disponibilidad_encomiendas" id="disponibilidad_encomiendas" required>
                                        <option value="" selected disabled>Elija una opción...</option>                                 
                                        <option value="si">Si</option>                                 
                                        <option value="no">No</option>                                 
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label>¿Posibilidad mascotas? <i class="fa fa-paw" aria-hidden="true"></i></label>

                                    <select class="form-control" name="posibilidad_mascotas" id="posibilidad_mascotas" required>
                                        <option value="" selected disabled>Elija una opción...</option>                                 
                                        <option value="si">Si</option>                                 
                                        <option value="no">No</option>                                 
                                    </select>
                                </div>
                            
                                

                                <div class="form-group">
                                    <label>Fecha viaje </label>

                                    <input type="date" name="fecha_viaje" id="fecha_viaje" class="form-control" placeholder="Fecha viaje *" value="" required />
                                </div>
                                

                            
                                
                            </div>

                            <div class="row mt-5">

                                <div class="col-md-12">

                                    <div class="form-group text-center d-flex justify-content-center">
                                        <input type="submit" name="btnSubmit" class="btnContact" value="Guardar" />
                                    </div>

                                </div>



                            </div>

                        
                       
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