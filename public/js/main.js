
function open_modal(){
    $('#modal_info_conductor').modal('show');
}


function open_modal_ver_mi_perfil(){

    $('#modal_ver_perfil').modal('show');

    get_data_usuario();

}

function get_data_usuario(){


    fetch('http://localhost/App_transports/public/get_data_usuario', {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        
        if (data.status == 0) {
            
            mostrarAlerta(data.data, "danger");
        } else {


            var nombre_usuario = document.getElementById('nombre_usuario');
            nombre_usuario.textContent = data.data.nombre;

            var nombre_usuario_info = document.getElementById("nombre_usuario_info");
            nombre_usuario_info.textContent = data.data.nombre;

            var cargo_usuario = document.getElementById("cargo_usuario");
            cargo_usuario.textContent  = data.data.cargo;

            var usuario_info = document.getElementById("usuario_info");
            usuario_info.textContent = data.data.usuario;

            var cedula_info = document.getElementById("cedula_info");
            cedula_info.textContent = data.data.cedula;

            var celular_info = document.getElementById("celular_info");
            celular_info.textContent = data.data.celular;

            var email_info = document.getElementById("email_info");
            email_info.textContent = data.data.email;

            var cantidad_pasajeros_info = document.getElementById("cantidad_pasajeros_info");
            cantidad_pasajeros_info.textContent = data.data.capacidad_pasajeros;

            var descripcion_info = document.getElementById("descripcion_info");
            descripcion_info.textContent = data.data.descripcion;

            var color_info = document.getElementById("color_info");
            color_info.textContent = data.data.color;

            var modelo_info = document.getElementById("modelo_info");
            modelo_info.textContent = data.data.modelo;

            var tipo_vehiculo_info = document.getElementById("tipo_vehiculo_info");
            tipo_vehiculo_info.textContent = data.data.tipo_vehiculo;

            var placa_info = document.getElementById("placa_info");
            placa_info.textContent = data.data.placa;

            var img_vehiculo = document.getElementById("img_vehiculo");
            img_vehiculo_info.src = data.data.img_vehiculo;

            console.log(data.data.img_vehiculo);


           


        }
    })
    .catch(error => {
        console.error('Error:', error);
    });




}
