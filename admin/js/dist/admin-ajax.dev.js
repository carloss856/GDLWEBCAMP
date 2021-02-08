"use strict";

$(document).ready(function () {
  $('#guardar-registro').on('submit', function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.ajax({
      //forma de enviar el ajax con jquery
      type: $(this).attr('method'),
      //metodo con el que se eviaran los datos
      data: datos,
      //los datos enviados que se definieron antes
      url: $(this).attr('action'),
      //a donde se enviaran los datos anteriores
      dataType: 'json',
      // tipo de datos enviados
      success: function success(data) {
        //si la respuesta es exitosa data nos dara la respuesta
        var resultado = data;

        if (resultado.respuesta === 'exito') {
          Swal.fire('Correcto', 'Se guardo correctamente', 'success');
        } else {
          Swal.fire('Error', 'Hubo un error', 'error');
        }
      }
    });
  }); //eliminar un registro

  $('.borrar_registro').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    Swal.fire({
      title: '¿Estas seguro?',
      text: "Esta acción no se puede deshacer!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar!',
      cancelButtonText: 'Cancelar!'
    }).then(function (result) {
      $.ajax({
        type: 'post',
        data: {
          'id': id,
          'registro': 'eliminar'
        },
        url: 'modelo-' + tipo + '.php',
        success: function success(data) {
          var resultado = JSON.parse(data);

          if (resultado.respuesta == 'exito') {
            Swal.fire('Eliminado!', 'El administrador a sido eliminado correctamente.', 'success');
            jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
          } else {
            Swal.fire('Error!', 'Hubo un error', 'error');
          }
        }
      });
    });
  });
});