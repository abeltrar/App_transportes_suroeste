
function mostrarAlerta(mensaje,contexto) {
    var miniAlert = document.getElementById('miniAlert');
    miniAlert.textContent =  mensaje;
    miniAlert.className = 'alert-' + contexto;
    miniAlert.classList.add('show');
    setTimeout(function() {
        miniAlert.classList.remove('show');
    }, 3000); // 3 segundos
}


function pintarTable(viajes){
    // Encuentra el tbody de la tabla
    var tbody = document.querySelector(".table tbody");

    // Itera sobre cada usuario en el array
    viajes.forEach(function(viajes) {
        // Crea una nueva fila de tabla
        var row = document.createElement("tr");

        // Añade cada propiedad del usuario como una celda en la fila
        var properties = ["estado_reserva","conductor", "fecha_viaje", "hora_salida", "destino", "placa","modelo","fecha_creacion"];
        properties.forEach(function(prop) {
            var cell = document.createElement("td");
            cell.textContent = viajes[prop];

           
            // Agregar clase al elemento <td> basado en el estado del viaje
            if (prop === "estado_reserva") {
                if (viajes[prop] === "Activo") {
                    cell.classList.add("activo");
                } else {
                    cell.classList.add("finalizado");
                }
            }
            
  
            row.appendChild(cell);
        });

    
        var actionsCell = document.createElement("td");

        var iniciar_finalizar = document.createElement("a");
        if (viajes.estado_reserva=="Activo") {
            
            iniciar_finalizar.className = "iniciado";  
            iniciar_finalizar.innerHTML = '<i class="fa fa-times-circle" aria-hidden="true"></i>';
        } else {
            iniciar_finalizar.style.display = "none";
        }


       

        // Agregar un evento de clic al enlace de iniciar o finalizar
        iniciar_finalizar.addEventListener("click", function() {
            // Verificar la clase del elemento
            if (this.classList.contains("iniciado")) {
              
                cancelar_viaje(viajes.id);
            }
        });

       

    // SE AGREGA LA ACCIÓN A LA COLUMNA Y LUEGO A LA FILA COMO HIJO
        
        actionsCell.appendChild(iniciar_finalizar);

        row.appendChild(actionsCell);

        // Agrega la fila a la tabla
        tbody.appendChild(row);
    });
 
}


function cancelar_viaje(id_viaje){

    var formData = new FormData();
    formData.append("id", id_viaje);


    fetch('http://localhost/App_transports/public/cancelar_viaje', {
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


document.addEventListener('DOMContentLoaded', function() {

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

$(document).ready(function(){


   

   fetch('http://localhost/App_transports/public/get_mis_viajes', {
       method: 'GET'
        
   })
   .then(response => response.json())
   .then(data => {
       
       if (data.status == 0) {
           
           mostrarAlerta(data.data, "danger");
       } else {
           var viajes = data.data;
           console.log(viajes);
           pintarTable(viajes);

           
       }
   })
   .catch(error => {
       console.error('Error:', error);
   });



});