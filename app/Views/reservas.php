<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<link rel="stylesheet" href="css/reservas/reservas.css">
<script src="js/reservas.js"></script>

<div class="container_busqueda">

    <div id="miniAlert" class="alert-success"></div>

    <form id="form_buscar_viaje" method="post" method="post">
        <div class="row">

        

            <div class="col-sm-4">

                <div class="form-group">
                    <label>Elija la fecha en la que desea viajar <i class="fa fa-calendar" aria-hidden="true"></i> </label>

                    <input type="date" name="fecha_viaje" id="fecha_viaje" class="form-control" placeholder="Fecha viaje *" value="" required />
                </div>
                                        


            </div>

            <div class="col-sm-4">

                <label>Elija su destino <i class="fa fa-paper-plane" aria-hidden="true"></i></label>

                <select class="form-control" name="id_destino" id="id_destino" required>                         
                </select>



            </div>
            <div class="col-sm-4">

                 <div class="form-group text-center d-flex justify-content-center btn_buscar">
                    <input type="submit" name="btnSubmit" class="btn btn-info" value="Buscar" />
                </div>

                


            </div>

        </div>

        <div class="row" id="viajesRow" style="display: none;">

            <div class="col-sm-12">

                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row mt-10">
                                <div class="col-sm-8"><h2 class="color_text_tittle">Viajes <i class="fa fa-car" aria-hidden="true"></i></h2></div>
                                
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Conductor</th>
                                    <th>Placa</th>
                                    <th>Modelo</th>
                                    <th>Hora salida</th>
                                    <th>Fecha</th>
                                    <th>Destino</th>
                                    <th>Color</th>
                                    <th>Cantidas pasajeron máxima</th>
                                    <th>Cantidas pasajeron registrados</th>
                                    <th>¿Encomiendas?</th>
                                    <th>Novedades</th>
                                    <th>¿Mascotas?</th>
                                    <th>Reservar</th>
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
    </form>

</div>




