(function(){
    "use strict";

    var regalo = document.getElementById("regalo");
    document.addEventListener("DOMContentLoaded", function(){

        if( typeof L !== "undefined"){
            var map = L.map('mapa').setView([10.514406, -66.896374], 18);
    
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
    
            L.marker([10.514406, -66.896374]).addTo(map)
                .bindPopup('GDLWebCamp 2020 <br> Boletos ya disponibles.')
                .openPopup()
                .bindTooltip("Un Tooltip")
                .openTooltip();
        }

        //Campos Datos usuarios
        var nombre = document.getElementById("nombre");
        var apellido = document.getElementById("apellido");
        var email = document.getElementById("email");

        //Campos pases
        var pase_dia = document.getElementById("pase_dia");
        var pase_dosdias = document.getElementById("pase_dosdias");
        var pase_completo = document.getElementById("pase_completo");
        
        //Botones y divs
        var calcular = document.getElementById("calcular");
        var errorDiv = document.getElementById("error");
        var botonRegistro = document.getElementById("btnRegistro");
        var lista_productos = document.getElementById("lista-productos");
        var suma = document.getElementById("suma-total");

        //Extras
        var camisas = document.getElementById("camisa_evento");
        var etiquetas = document.getElementById("etiquetas");

        if(botonRegistro) {
            botonRegistro.disabled = true;
        }

        if(document.getElementById("calcular")) {
            calcular.addEventListener("click", calcularMontos);

            nombre.addEventListener("blur", validarCampos);
            apellido.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarMail);

            pase_dia.addEventListener("blur", mostrarDias);
            pase_dosdias.addEventListener("blur", mostrarDias);
            pase_completo.addEventListener("blur", mostrarDias);
            
            var formulario_editar = document.getElementsByClassName('editar-registrado');
            if(formulario_editar.length > 0) {
                if(pase_dia.value || pase_dosdias.value || pase_completo.value) {
                    mostrarDias();
                }
            }


            function validarCampos() {
                if(this.value == ""){
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Este campo es obligatorio";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                } else {
                    this.style.border = "1px solid #ccc";
                }
            }

            function validarMail() {
                if(this.value.indexOf("@") > -1) {
                    this.style.border = "1px solid #ccc";
                }else {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Debe contener un email valido";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                }
            }
            
            function calcularMontos(event) {
                event.preventDefault();
                if(regalo.value === "") {
                    alert("Debes Elegir un regalo");
                    regalo.focus();
                }else{
                    var boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                        cantCamisas = parseInt(camisas.value, 10) || 0,
                        cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                    var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                    var listadoProductos = [];
                    if(boletosDia >= 1){ 
                        listadoProductos.push(boletosDia + " Pases por día");
                    }

                    if(boletos2Dias >= 1){ 
                        listadoProductos.push(boletos2Dias + " Pases por 2 días");
                    }

                    if(boletoCompleto >= 1){ 
                        listadoProductos.push(boletoCompleto + " Pases Completos");
                    }

                    if(cantCamisas >= 1){ 
                        listadoProductos.push(cantCamisas + " Camisas");
                    }

                    if(cantEtiquetas >= 1){ 
                        listadoProductos.push(cantEtiquetas + " Etiquetas");
                    }
                    lista_productos.style.display = "block";
                    lista_productos.innerHTML = ``;
                    for(var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + "<br/>";
                    }

                    suma.innerHTML = "$ " + totalPagar.toFixed(2);
                    botonRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalPagar;

                }
            }

            function mostrarDias(){
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                    boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = [];
                if(boletosDia > 0) {
                    diasElegidos.push("viernes");
                }
                if(boletos2Dias > 0) {
                    diasElegidos.push("viernes", "sabado");
                }
                if(boletoCompleto > 0) {
                    diasElegidos.push("viernes", "sabado", "domingo");
                }

                for(var i = 0; i < diasElegidos.length; i++){
                    document.getElementById(diasElegidos[i]).style.display = "block";
                }
                if(diasElegidos.length === 0 ) {
                    var todosDias = document.getElementsByClassName('contenido-dia');
                    for(var i = 0; i < todosDias.length; i++) {
                        todosDias[i].style.display = 'none';
                    }
                }
            }
        }
       // var xhr = new XMLHttpRequest();
        
    }); // DOM CONTENT LOADED
    
})();