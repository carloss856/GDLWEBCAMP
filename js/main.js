

$(function(){

    //// lettering

    $(".nombresitio").lettering();

    // Agregar clase a menu
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

    /// Menu fijo
    ///////saber el tamaño de la pantalla
    var windowHeight = $(window).height();
    ////// saber el tamaño de la barra
    var barraAltura = $(".barra").innerHeight();
    
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight) {
            $(".barra").addClass("fixed");
            $("body").css({"margin-top": barraAltura+"px"});
        }else {
            $(".barra").removeClass("fixed");
            $("body").css({"margin-top": "0px"});
        }
    });

    //// Menu Responsive

    $(".menu-movil").on("click", function() {
        $(".navegacion-principal").slideToggle();
    });


    /// programa de conferencia
    $(".programa-evento .info-curso:first").show();
    $(".menu-programa a:first").addClass("activo");
    $(".menu-programa a").on("click", function() {
        $(".menu-programa a").removeClass("activo");
        $(this).addClass("activo");
        $(".ocultar").hide();
        var enlace = $(this).attr("href");
        $(enlace).fadeIn(1000);
        return false;
    });

    //// animaciones para los numeros,--- nth-child selecciona el elemento en base a su numero
    var resumenLista = jQuery(".resumen-evento");
    if(resumenLista.length > 0) {
        $(".resumen-evento").waypoint(function() {
            $(".resumen-evento li:nth-child(1) p").animateNumber({ number: 6}, 1200);
            $(".resumen-evento li:nth-child(2) p").animateNumber({ number: 15}, 1200);
            $(".resumen-evento li:nth-child(3) p").animateNumber({ number: 3}, 1300);
            $(".resumen-evento li:nth-child(4) p").animateNumber({ number: 9}, 1500);
        }, {
            offset: "60%"
        })
    }
    

    ///// Cuenta Regresiva
    $(".cuenta-regresiva").countdown("2020/12/31 07:00:00", function(event) {
        $("#dias").html(event.strftime("%D"));
        $("#horas").html(event.strftime("%H"));
        $("#minutos").html(event.strftime("%M"));
        $("#segundos").html(event.strftime("%S"));
    });

    ///// Colorbox
    if(typeof colorbox !== "undefined") {
        $(".invitado-info").colorbox({inline:true, innerWidth:"50%"});
        $(".boton_newsletter").colorbox({inline:true, innerWidth:"50%"});
    };
});