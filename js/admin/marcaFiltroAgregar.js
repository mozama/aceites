var btnGuardar=$('#btnGuardar'),
    txtMarcaFiltro=$('#txtMarcaFiltro'),
    tbodyResult=$('#tbodyResult');
var dvAgregar=$('#dvAgregar'),
    dvEditar=$('#dvEditar'),
    dvListado=$('#dvListado');
var txtMarcaFiltroE=$('#txtMarcaFiltroE'),
    btnGuardarE=$('#btnGuardarE'),
    btnCancelarE=$('#btnCancelarE'),
    txtIdE=$('#txtIdE');

    function agregarMarcaFiltro(){
      if (!validarIngreso()) {
        return false;
      }

      var datos = $.ajax({
      url: '../php/admin/marcaFiltroAgregar.php',
      data:{
         marcaFiltro:     txtMarcaFiltro.val(),
      },
      type: 'post',
          dataType:'json',
          async:false
      }).error(function(e){
          alert('Ocurrio un error, intente de nuevo');
      }).responseText;

      var res;
      try{
          res = JSON.parse(datos);
      }catch (e){
          alert('Error JSON ' + e);
      }

      if ( res.status === 'OK' ){
        swal({
          title: "Marca de filtro agregado.",
          text: "Se agregó correctamente la marca de filtro.",
          timer: 2000,
          type: "success",
          showConfirmButton: true
        });
        txtMarcaFiltro.val('');
      }
      else{
        mensaje = res.message;
        swal({
          title: "Error al agregar marca de filtro.",
          text: mensaje,
          type: "error",
          showConfirmButton: true
        });
      }
  }

  function validarIngreso(){
    if ((txtMarcaFiltro.val() == '') || (txtMarcaFiltro.val() === null)) {
      swal("Ingrese marca de filtro", "", "warning");

      txtMarcaFiltro.focus();
      return false;
    }
    return true;
  }

  $(document).on('ready', function(){
    $('#liMarcaFiltro').addClass('active');

  });

  btnGuardar.on('click',agregarMarcaFiltro);
