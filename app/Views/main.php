
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transportes suroeste Antioqueño</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main/main.css">
    <script src="js/main.js"></script>




   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bus-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Transportes suroeste <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones administración</h6>
                        <a class="collapse-item" href="administracion">Usuarios</a>
                        <a class="collapse-item" href="viajes?modulo=administracion">Viajes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="viajes?modulo=mis_viajes">
                    <i class="fas fa-tasks"></i>
                    <span>Mis viajes</span>
                </a>

                <a class="nav-link collapsed" href="reservas">
                    <i class="fas fa-tasks"></i>
                    <span>Reservar</span>
                </a>

                <a class="nav-link collapsed" href="mis_reservas">
                    <i class="fas fa-tasks"></i>
                    <span>Mis reservas</span>
                </a>

            
        
               
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

          

            <!-- Sidebar Message -->
           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Centro de alertas
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Enero 12, 2024</div>
                                        <span class="font-weight-bold">Un nuevo viaje registrado</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Febrero 7, 2024</div>
                                        Un nuevo viaje registrado
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Marzo 2, 2024</div>
                                        Un nuevo viaje registrado
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Ver todas</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Centro de mensajes
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Tienes una nueva reserva</div>
                                        <div class="small text-gray-500">Emilia Robles · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Tienes una nueva reserva</div>
                                        <div class="small text-gray-500">Camila Buitrago · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Tienes una nueva reserva</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Tienes una nueva reserva</div>
                                        <div class="small text-gray-500">Andrés Lopez 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Leer más...</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nombre_usuario ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" onclick="open_modal_ver_mi_perfil()" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi perfil y vehiculos
                                </a>
                                <a class="dropdown-item" onclick="open_modal()" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Registrar mis vehiculos
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div id="content_view">

                  <?= $content_view ?>
                 
                </div>

            

               

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Transportes suroeste 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


      <!-- Modal registrar vehiculos -->
      <div class="modal" tabindex="-1" id="modal_info_conductor">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar mis vehiculos <i class="fas fa-bus"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_registro_auto" method="post">
                    <div class="row">
                        <div class="col">
                        <label>Placa vehiculo <i class="fas fa-address-card"></i></label>
                        <input type="text" id="placa" name="placa" class="form-control" placeholder="Ingrese placa del vehiculo" required>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Tipo vehiculo <i class="fas fa-bus-alt"></i></label>
                            <select class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" required>
                            <option value="">Seleccione tipo de vehiculo...</option>
                            <option value="bus">Bus</option>
                            <option value="camioneta van">Camioneta Van</option>
                            <option value="carro">Carro</option>
                            <option value="moto">Moto</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                        <label>Modelo vehiculo <i class="fas fa-car"></i></label>
                        <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Ingrese modelo del vehiculo" required>
                        </div>
                        <div class="col">
                        <label>Color vehiculo <i class="fas fa-taxi"></i></label>
                        <input type="text" id="color" name="color" class="form-control" placeholder="Ingrese color del vehiculo" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                        <label>Descripción vehiculo <i class="fas fa-edit"></i></label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese breve descripción del vehiculo" required>
                        </div>
                        <div class="col">
                        <label>Capacidad de pasajeros <i class="fas fa-users"></i></label>
                        <input type="number" id="capacidad_pasajeros" name="capacidad_pasajeros" class="form-control" placeholder="Ingrese capacidad del vehiculo" required>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col">
                        <label>Fecha vencimiento soat <i class="fas fa-calendar-day"></i></label>
                        <input type="date" id="fecha_vencimiento_soat" name="fecha_vencimiento_soat" class="form-control" placeholder="Ingrese fecha vencimiento soat del vehiculo" required>
                        </div>
                        <div class="col">
                        <label>Fecha vencimiento tecnomecanica <i class="fas fa-calendar-day"></i></label>
                        <input type="date" id="fecha_vencimiento_tecnomecanica" name="fecha_vencimiento_tecnomecanica" class="form-control" placeholder="Ingrese fecha vencimiento tecnomecanica del vehiculo" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">

                            <div class="form-group">
                                <label for="img_vehiculo">Seleccionar foto vehiculo...</label>
                                <input type="file" class="form-control-file" id="img_vehiculo" name="img_vehiculo" accept=".png">
                            </div>


                        </div>

                    </div>
                  
                    <div class="form-group text-center mt-5">
                        <input type="submit" value="Guardar" class="btn btn-success btn_guardar_auto">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              
            </div>
            </div>
        </div>
    </div>

    <!-- end modal registrar vehiculos -->



    <!-- Modal ver mi perfil -->


    <div class="modal" tabindex="-1" id="modal_ver_perfil">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0 texto-centrado">

                            <h5>Mi perfil <i class="far fa-user"></i></h5>
                           
                        </ol>
                        </nav>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="img/perfil.png" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3" id="nombre_usuario"></h5>
                            <p class="text-muted mb-1" id = "cargo_usuario"></p>
                            <div class="d-flex justify-content-center mb-2">
                           
                            </div>
                        </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe fa-lg text-warning"></i>
                                <p class="mb-0">https://transportesSuroeste.com</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                <p class="mb-0">transportesSuroeste</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                <p class="mb-0">@transportesSuroeste</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                <p class="mb-0">transportesSuroeste</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">transportesSuroeste</p>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombre completo</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id = "nombre_usuario_info"></p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id="email_info"></p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Celular</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id="celular_info"></p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Cédula</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id="cedula_info"></p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Usuario</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id="usuario_info"></p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Vehiculos registrados</span>
                                </p>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <p class="mb-1" style="font-size: .77rem;">Placa</p>
                                        <p class="text-muted mb-0" id="placa_info"></p>

                                    
                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Tipo Vehiculo</p>
                                        <p class="text-muted mb-0 text-capitalize" id="tipo_vehiculo_info"></p>

                                    
                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Modelo</p>
                                        <p class="text-muted mb-0" id="modelo_info"></p>

                                    </div>

                                   <div class="col-sm-6">

                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Color</p>
                                        <p class="text-muted mb-0" id="color_info"></p>

                                        
                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Descripción</p>
                                        <p class="text-muted mb-0" id="descripcion_info"></p>

                                        <p class="mt-2 mb-1" style="font-size: .77rem;">Capacidad pasajeros</p>
                                        <p class="text-muted mb-0" id="cantidad_pasajeros_info"></p>

                                   </div>

                                </div>

                            
                               

                                
                            

                                
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Fotografía vehiculo</span>
                                </p>

                                <div>
                                    <img src="" alt="photo_car" id="img_vehiculo_info"
                                    class="rounded-circle img-fluid" style="width: 300px;">
                                </div>
                               
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </section>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              
            </div>
            </div>
        </div>
    </div>


    <!-- end modal ver mi perfil -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>