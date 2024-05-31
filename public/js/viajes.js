
function mostrarAlerta(mensaje,contexto) {
    var miniAlert = document.getElementById('miniAlert');
    miniAlert.textContent =  mensaje;
    miniAlert.className = 'alert-' + contexto;
    miniAlert.classList.add('show');
    setTimeout(function() {
        miniAlert.classList.remove('show');
    }, 3000); // 3 segundos
}


function new_viaje(){


    fetch('http://localhost/App_transports/public/get_destinos', {
        method: 'GET'
        
    })
    .then(response => response.json())
    .then(data => {
        
        if (data.status == 0) {
            
            mostrarAlerta(data.data, "danger");
        } else {
            var destinos = data.data;
            pintarSelect(destinos,null);

            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });





    $('#modal_create_viaje').modal('show');
}

function pintarSelect(destinos,id_destino_seleccionado) {
    var select = document.querySelector('select[name="id_destino"]');
    
    // Limpiar el select por si ya tenía opciones anteriores
    select.innerHTML = '';
    
    // Agregar la opción por defecto
    var optionDefault = document.createElement('option');
    optionDefault.value = '';
    optionDefault.textContent = 'Elija un destino...';
    optionDefault.disabled = true;
    optionDefault.selected = true;
    select.appendChild(optionDefault);
    
    // Agregar las opciones de los destinos
    destinos.forEach(function(destino) {
        var option = document.createElement('option');
        option.value = destino.id;
        option.textContent = destino.destino;
        if (destino.id === id_destino_seleccionado) {
            option.selected = true;
        }
        select.appendChild(option);
    });
}


document.addEventListener('DOMContentLoaded', function() {

    
    document.getElementById('form_guardar_viaje').addEventListener('submit', function(event) {


       
        event.preventDefault();
        var formData = new FormData(this);

    
        fetch('http://localhost/App_transports/public/guardar_viaje', {
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


    // Obtener el campo de búsqueda y la tabla
  const filtro = document.getElementById('filtro');
  const tabla = document.getElementById('tabla');
  const filas = tabla.getElementsByTagName('tr'); // Obtener todas las filas de la tabla, incluyendo el encabezado

  // Escuchar el evento input en el campo de búsqueda
  filtro.addEventListener('input', function() {
    const filtroValor = filtro.value.toUpperCase(); // Convertir a mayúsculas para hacer la búsqueda sin distinción entre mayúsculas y minúsculas

    // Recorrer todas las filas de tbody y ocultar aquellas que no coincidan con el término de búsqueda
    for (let i = 0; i < filas.length; i++) {
      const fila = filas[i];
      const celdas = fila.getElementsByTagName('td'); // Obtener todas las celdas de la fila

      // Si es el encabezado, omitir la iteración
      if (fila.parentElement.tagName === 'THEAD') {
        continue;
      }

      // Recorrer todas las celdas de la fila y verificar si alguna coincide con el término de búsqueda
      let coincidencia = false;
      for (let j = 0; j < celdas.length; j++) {
        const celda = celdas[j];
        if (celda) {
          const textoCelda = celda.textContent || celda.innerText; // Obtener el texto de la celda
          if (textoCelda.toUpperCase().indexOf(filtroValor) > -1) { // Verificar si el texto de la celda contiene el término de búsqueda
            coincidencia = true; // Si hay coincidencia, marcar como verdadero
            break; // Salir del bucle interno
          }
        }
      }

      // Mostrar u ocultar la fila según si hay coincidencia con el término de búsqueda
      fila.style.display = coincidencia ? '' : 'none';
    }
  });




});



function pintarTable(viajes){
    // Encuentra el tbody de la tabla
    var tbody = document.querySelector(".table tbody");

    // Itera sobre cada usuario en el array
    viajes.forEach(function(viajes) {
        // Crea una nueva fila de tabla
        var row = document.createElement("tr");

        // Añade cada propiedad del usuario como una celda en la fila
        var properties = ["estado","nombre", "placa", "destino", "cantidad_pasajeros_maxima", "cantidad_pasajeros_registrados","fecha_viaje", "hora_llegada", "hora_salida", "disponibilidad_encomiendas","posibilidad_mascotas","novedades_viaje","fecha_creacion"];
        properties.forEach(function(prop) {
            var cell = document.createElement("td");
            cell.textContent = viajes[prop];

           
            // Agregar clase al elemento <td> basado en el estado del viaje
            if (prop === "estado") {
                if (viajes[prop] === "En camino") {
                    cell.classList.add("activo");
                } else if(viajes[prop] === "Finalizado") {
                    cell.classList.add("finalizado");
                }else{
                    cell.classList.add("proximo");
                }
            }
            
  
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



        var iniciar_finalizar = document.createElement("a");
        if (viajes.estado=="En camino") {
            
            iniciar_finalizar.className = "iniciado";  
            iniciar_finalizar.innerHTML = '<i class="fa fa-pause-circle" aria-hidden="true"></i>';
        } else {
            iniciar_finalizar.className = "no-iniciado";
            iniciar_finalizar.innerHTML = '<i class="fa fa-play-circle" aria-hidden="true"></i>';
        }


        if (viajes.estado == "Finalizado") {
            // Si el estado del viaje es "Finalizado", oculta el elemento iniciar_finalizar
            iniciar_finalizar.style.display = "none";
        }


           

        //Agregar un evento de clic al enlace de eliminación
        deleteAction.addEventListener("click", function() {
            eliminarViaje(viajes.id); 
        });

        editAction.addEventListener("click", function(){

            editViaje(viajes);

        });

        // Agregar un evento de clic al enlace de iniciar o finalizar
        iniciar_finalizar.addEventListener("click", function() {
            // Verificar la clase del elemento
            if (this.classList.contains("iniciado")) {
              
                finalizarViaje(viajes.id);
            } else if (this.classList.contains("no-iniciado")) {
              
                iniciarViaje(viajes.id);
            }
        });

       

    // SE AGREGA LA ACCIÓN A LA COLUMNA Y LUEGO A LA FILA COMO HIJO
        actionsCell.appendChild(addAction);
        actionsCell.appendChild(editAction);
        actionsCell.appendChild(deleteAction);
        actionsCell.appendChild(iniciar_finalizar);

        row.appendChild(actionsCell);

        // Agrega la fila a la tabla
        tbody.appendChild(row);
    });
 
}


function editViaje(viaje){


    document.getElementById("id_destino").value = viaje.id_destino;
    document.getElementById("cantidad_pasajeros_maxima").value = viaje.cantidad_pasajeros_maxima;
    document.getElementById("novedades_viaje").value = viaje.novedades_viaje;
    document.getElementById("disponibilidad_encomiendas").value = viaje.disponibilidad_encomiendas;
    document.getElementById("posibilidad_mascotas").value = viaje.posibilidad_mascotas;
    document.getElementById("fecha_viaje").value = viaje.fecha_viaje;
    document.getElementById("hora_salida").value = viaje.hora_salida;
    document.getElementById('accion').value = 'update';
    document.getElementById('id_viaje').value =  viaje.id;


    fetch('http://localhost/App_transports/public/get_destinos', {
        method: 'GET'
        
    })
    .then(response => response.json())
    .then(data => {
        
        if (data.status == 0) {
            
            mostrarAlerta(data.data, "danger");
        } else {
            var destinos = data.data;
            pintarSelect(destinos,viaje.id_destino);

            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });






    $('#modal_create_viaje').modal('show');





}


function eliminarViaje(id_viaje){

    var formData = new FormData();
    formData.append("id", id_viaje);


    fetch('http://localhost/App_transports/public/delete_viaje', {
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

function iniciarViaje(id_viaje){

    var formData = new FormData();
    formData.append("id", id_viaje);


    fetch('http://localhost/App_transports/public/iniciarViaje', {
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


function finalizarViaje(id_viaje){

    var formData = new FormData();
    formData.append("id", id_viaje);


    fetch('http://localhost/App_transports/public/finalizarViaje', {
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







$(document).ready(function(){


     // Obtener el valor del parámetro 'modulo' de la URL
     var urlParams = new URLSearchParams(window.location.search);
     var modulo = urlParams.get('modulo');


     var formData = new FormData();
     formData.append("modulo", modulo);



    fetch('http://localhost/App_transports/public/get_data_viajes', {
        method: 'POST',
        body: formData
       
        
    })
    .then(response => response.json())
    .then(data => {
        
        if (data.status == 0) {
            
            mostrarAlerta(data.data, "danger");
        } else {
            var viajes = data.data;
            pintarTable(viajes);

            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });



});
