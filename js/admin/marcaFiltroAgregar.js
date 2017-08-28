var btnGuardar=$('#btnGuardar'),
    txtMarcaMotor=$('#txtMarcaFiltro'),
    tbodyResult=$('#tbodyResult');
var dvAgregar=$('#dvAgregar'),
    dvEditar=$('#dvEditar'),
    dvListado=$('#dvListado');
var txtMarcaMotorE=$('#txtMarcaFiltroE'),
    btnGuardarE=$('#btnGuardarE'),
    btnCancelarE=$('#btnCancelarE'),
    txtIdE=$('#txtIdE');

    function agregarMotor(){
      if (!validarIngreso()) {
        return false;
      }

      var datos = $.ajax({
      url: '../php/admin/marcaFiltroAgregar.php',
      data:{
         marcaMotor:     txtMarcaFiltro.val(),
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
          title: "Proveedor agregado.",
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
          title: "Error al agregar marca de motor.",
          text: mensaje,
          type: "error",
          showConfirmButton: true
        });
      }
  }
