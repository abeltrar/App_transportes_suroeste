<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<link rel="stylesheet" href="css/mis_reservas/mis_reservas.css">
<script src="js/mis_reservas.js"></script>


<div class="container-lg">
    <div id="miniAlert" class="alert-success"></div>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2 class="color_text_tittle">Mis reservas <i class="fa fa-car car" aria-hidden="true"></i></h2></div>
                    

                </div>
                <input type="text" id="filtro" placeholder="Buscar..."  />

            </div>
            <div class="container_table">
               

                <table class="table table-bordered" id="tabla">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Conductor</th>
                            <th>Fecha viaje</th>
                            <th>Hora salida</th>
                            <th>Destino</th>
                            <th>Placa</th>
                            <th>Modelo</th>
                            <th>Fecha creación</th>
                            <th>Cancelar</th>
                           
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
