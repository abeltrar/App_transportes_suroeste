function get_destinos(){


    fetch('http://localhost/App_transports/public/get_destinos', {
        method: 'GET'
        
    })
    .then(response => response.json())
    .then(data => {
        
        if (data.status == 0) {
            
            mostrarAlerta(data.data, "danger");
        } else {
            var destinos = data.data;
            console.log(destinos);
            pintarSelect(destinos,null);

        
            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });


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
    

    
    get_destinos();

    document.getElementById('viajesRow').style.display = 'none';


    document.getElementById('form_buscar_viaje').addEventListener('submit', function(event) {

        var data_viaje = []; 

      
        document.getElementById('viajesRow').style.display = 'none';


       
        event.preventDefault();
        var formData = new FormData(this);

    
        fetch('http://localhost/App_transports/public/get_viajes', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status == 0) {
                document.getElementById('viajesRow').style.display = 'none';

                mostrarAlerta(data.data, "danger");
            } else {

                
                data_viaje = data.data;


               pintarViajes(data_viaje);

            
               
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    
   


});


function pintarViajes(viajes){

    document.getElementById('viajesRow').style.display = 'block';



    // Encuentra el tbody de la tabla
    var tbody = document.querySelector(".table tbody");

    tbody.innerHTML = '';


    // Itera sobre cada viajes en el array
    viajes.forEach(function(viaje) {
    // Crea una nueva fila de tabla
    var row = document.createElement("tr");

    // Añade cada propiedad del viaje como una celda en la fila
    var properties = ["nombre_conductor", "placa", "modelo", "hora_salida", "fecha_viaje", "destino","color","cantidad_pasajeros_maxima","cantidad_registrados","disponibilidad_encomiendas","novedades_viaje","posibilidad_mascotas"];
    properties.forEach(function(prop) {
        var cell = document.createElement("td");
        cell.textContent = viaje[prop];
        row.appendChild(cell);
    });

    // Crea la celda de acciones con los iconos
    var actionsCell = document.createElement("td");
    var addAction = document.createElement("a");


    addAction.className = "reservar";
    addAction.innerHTML = '<i class="material-icons">&#xE03B;</i>';
    


    // Agregar un evento de clic al enlace de iniciar o finalizar
    addAction.addEventListener("click", function() {
        reservar_viaje(viaje);
    });


    


    actionsCell.appendChild(addAction);
    row.appendChild(actionsCell);


    

    // Agrega la fila a la tabla
    tbody.appendChild(row);
    });
 
}


function reservar_viaje(viaje){

    var formData = new FormData();
    formData.append("data", JSON.stringify(viaje));


    fetch('http://localhost/App_transports/public/reservar_viaje', {
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
}





function mostrarAlerta(mensaje,contexto) {
    var miniAlert = document.getElementById('miniAlert');
    miniAlert.textContent =  mensaje;
    miniAlert.className = 'alert-' + contexto;
    miniAlert.classList.add('show');
    setTimeout(function() {
        miniAlert.classList.remove('show');
    }, 3000); // 3 segundos
}


$(document).ready(function(){

    


});