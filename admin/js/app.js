$(function () {
  $("#registros").DataTable({
    "responsive": true,
    "autoWidth": false,
    "paging": true,
    "pagingLength": 10,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "language": {
      paginate: {
        next: 'Siguiente',
        previous: 'Anterior',
        last: 'Ultimo',
        first: 'Primero'
      },
      info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
      emptyTable: 'No hay registros',
      infoEmpty: '0 Registros',
      search: 'Buscar: '
    }

  });

  $('#crear_registro_admin').attr('disabled', true);


  $('#repetir_password').on('input', function() {
    var password_nuevo = $('#password').val();

    if($(this).val() === password_nuevo) {

      $('#resultado_password').text('Correcto');
      $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('#crear_registro_admin').attr('disabled', false);
    } else {
      $('#resultado_password').text('No son iguales');
      $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
      $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
      $('#crear_registro_admin').attr('disabled', true);
    }
  });

  $('#datetimepicker4').datetimepicker({
    format: 'L'
  });
  
  $('#datepicker').datepicker({
    autoclose: true
  })

  //Initialize Select2 Elements
  $('.select2').select2()

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Timepicker
  $('#timepicker').datetimepicker({
    format: 'LT'
  })
  
  $('#icono').iconpicker();

  //-------------
  //- LINE CHART -
  //--------------

  $.getJSON('servicio-registrado.php', function(data) {
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false
  
    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })
  });

  
});

$(document).ready(function () {
  bsCustomFileInput.init();
});