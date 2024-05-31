
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



document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('loginForm').addEventListener('submit', function(event) {


      
       
        event.preventDefault();
        var formData = new FormData(this);

    
        fetch('http://localhost/App_transports/public/login', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.status == 0) {
                
                mostrarAlerta(data.data, "danger");
            } else {
                var baseUrl = data.data;   
                window.location.href = baseUrl+'home';
               
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });


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
                console.log(data.data);
                mostrarAlerta(data.data,"success");
               
                var baseUrl = data.url;
                window.location.href = baseUrl+'home';
               
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });




});


function register(){
    document.getElementById('accion').value = 'create_login';

    $('#modal_registro').modal('show');
    
}

// Asociar la función register() al evento clic del botón
$(document).ready(function() {
    // Ocultar la modal al cargar la página
    
    
});

