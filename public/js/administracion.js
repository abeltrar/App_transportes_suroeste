

var id_usuario;


$(document).ready(function(){

    

    $('[data-toggle="tooltip"]').tooltip();


    fetch('http://localhost/App_transports/public/get_user_data', {
        method: 'GET'
        
    })
    .then(response => response.json())
    .then(data => {
        
        if (data.status == 0) {
            
            mostrarAlerta(data.data, "danger");
        } else {
            var usuarios = data.data;
            pintarTable(usuarios);

            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });


   
	
});



// Muestra la alerta y la hace desaparecer después de 3 segundos
function mostrarAlerta(mensaje,contexto) {
    var miniAlert = document.getElementById('miniAlert');
    miniAlert.textContent =  mensaje;
    miniAlert.className = 'alert-' + contexto;
    miniAlert.classList.add('show');
    setTimeout(function() {
        miniAlert.classList.remove('show');
    }, 3000); // 3 segundos
}


function pintarTable(usuarios){
    // Encuentra el tbody de la tabla
    var tbody = document.querySelector(".table tbody");

    // Itera sobre cada usuario en el array
    usuarios.forEach(function(usuario) {
    // Crea una nueva fila de tabla
    var row = document.createElement("tr");

    // Añade cada propiedad del usuario como una celda en la fila
    var properties = ["nombre", "cedula", "celular", "email", "usuario", "cargo"];
    properties.forEach(function(prop) {
        var cell = document.createElement("td");
        cell.textContent = usuario[prop];
        row.appendChild(cell);
    });

    // Crea la celda de acciones con los iconos
    var actionsCell = document.createElement("td");
    var addAction = document.createElement("a");
    addAction.className = "add";
    addAction.innerHTML = '<i class="material-icons">&#xE03B;</i>';
   
    var editAction = document.createElement("a");
    editAction.className = "edit";
    editAction.innerHTML = '<i class="material-icons">&#xE254;</i>';
    var deleteAction = document.createElement("a");
    deleteAction.className = "delete";
    deleteAction.innerHTML = '<i class="material-icons">&#xE872;</i>';
    

    var permits = document.createElement("a");
    permits.className = "permits";
    permits.innerHTML = '<i class="fa fa-user-secret"></i>';


    // Agregar un evento de clic al enlace de eliminación
    deleteAction.addEventListener("click", function() {
        eliminarUsuario(usuario.id); 
    });

    editAction.addEventListener("click", function(){

        editUser(usuario);

    });

    permits.addEventListener('click', function(){

        id_usuario = usuario.id;


        permits_user();

    });


  // SE AGREGA LA ACCIÓN A LA COLUMNA Y LUEGO A LA FILA COMO HIJO
    actionsCell.appendChild(addAction);
    actionsCell.appendChild(editAction);
    actionsCell.appendChild(deleteAction);
    actionsCell.appendChild(permits);
    row.appendChild(actionsCell);

    // Agrega la fila a la tabla
    tbody.appendChild(row);
    });
 
}

document.addEventListener('DOMContentLoaded', function() {

    
    document.getElementById('form_register').addEventListener('submit', function(event) {


       
        event.preventDefault();
        var formData = new FormData(this);

    
        fetch('http://localhost/App_transports/public/registro', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status == 0) {
                mostrarAlerta(data.data, "danger");
            } else {

                
                window.location.reload();
               
                mostrarAlerta(data.data,"success");
               
        
               
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });




});

function register(){
    document.getElementById("btn_register").value = "Crear";
    document.getElementById("nombre").value = "";
    document.getElementById("cedula").value = "";
    document.getElementById("password").value = "";
    document.getElementById("celular").value = "";
    document.getElementById("email").value = ""
    document.getElementById("usuario").value = "";
    document.getElementById('accion').value = 'create';

    $('#modal_registro').modal('show');
    
}


function eliminarUsuario(id_usuario){

    var formData = new FormData();
    formData.append("id", id_usuario);


    fetch('http://localhost/App_transports/public/deleteUser', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == 0) {
            mostrarAlerta(data.data, "danger");
        } else {

            $('#modal_registro').modal('hide');
            window.location.reload();
           
            mostrarAlerta(data.data,"success");
           
    
           
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


function editUser(usuario){


    document.getElementById("nombre").value = usuario.nombre;
    document.getElementById("cedula").value = usuario.cedula;
    document.getElementById("celular").value = usuario.celular;
    document.getElementById("email").value = usuario.email;
    document.getElementById("usuario").value = usuario.usuario;
    document.getElementById("btn_register").value = "Actualizar";
    document.querySelector('input[name="id_cargo"][value="' + usuario.id_cargo + '"]').checked = true;
    document.getElementById('accion').value = 'update';




    $('#modal_registro').modal('show');





}


function permits_user(){


    var permits_user = [];

    //TOMAR TODOS LOS PERMISOS DESDE LA BASE DE DATOS


    
    fetch('http://localhost/App_transports/public/get_all_permits', {
        method: 'GET'
       
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == 0) {
            mostrarAlerta(data.data, "danger");
        } else {

            var permits = data.data;


            // Vaciar el contenido de la tabla antes de agregar nuevas filas
            $('#permisosTabla tbody').empty();

            // Iterar sobre los permisos y agregar filas a la tabla
            permits.forEach(function(permiso) {
                var fila = '<tr>' +
                    '<td>' + permiso.permiso + '</td>' +
                    '<td><input type="checkbox" name="permisos[]" value="' + permiso.id + '"></td>' +
                    '</tr>';
                $('#permisosTabla tbody').append(fila);
            });


            //BUSCAR PERMISOS QUE YA TIENE EL USUARIO

            var formData = new FormData();

            formData.append("id_usuario",id_usuario);

            fetch('http://localhost/App_transports/public/get_permits_of_user', {
                 method: 'POST',
                 body: formData
       
            })
            .then(response => response.json())
            .then(data => {
                if (data.status == 0) {
                    permits_user = [];
                    $('#modal_permits').modal('show');
                } else {

                    permits_user = data.data;


                    permits_user.forEach(function(id) {
                       
                        // Buscar el checkbox con el valor del id y marcarlo
                        $('#permisosTabla input[type="checkbox"][value="' + id.id_permiso + '"]').prop('checked', true);
                    });

                   
                    $('#modal_permits').modal('show');
                
            
                
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });


              
            
        
            
        }
        })
        .catch(error => {
            console.error('Error:', error);
        });



}



function  guardarPermisos() {


    // Obtén los permisos seleccionados
    var permisosSeleccionados = [];
    $('input[name="permisos[]"]:checked').each(function() {
        permisosSeleccionados.push($(this).val());
    });


    var formData = new FormData();

    formData.append("permisos",permisosSeleccionados);
 
    permisosSeleccionados.forEach(function(permiso){

        formData.append('permisos[]',permiso);

    });

    formData.append("id_usuario",id_usuario);


    fetch('http://localhost/App_transports/public/guardarPermisos', {
        method: 'POST',
        body: formData
       
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == 0) {
            mostrarAlerta(data.data, "danger");
        } else {

            mostrarAlerta(data.data, "success");
            $('#modal_permits').modal('hide');
           
    
           
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });




}