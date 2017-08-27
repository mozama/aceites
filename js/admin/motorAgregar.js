var btnGuardar=$('#btnGuardar'),
    txtMarcaMotor=$('#txtMarcaMotor'),
    bodyVer=$('$bodyVer');

    function agregarMotor(){
      if (!validar()) {
        return false;
      }


      var datos = $.ajax({
      url: '../php/admin/motorAgregar.php',
      data:{
         marcaMotor:     txtMarcaMotor.val(),
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
          text: "Se agregó correctamente la marca de motor.",
          timer: 2000,
          type: "success",
          showConfirmButton: true
        });
        txtMarcaMotor.val('');
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


function validar(){
//console.log(txtMarcaMotor.val());
  if ((txtMarcaMotor.val() == '') || (txtMarcaMotor.val() === null)) {
    swal("Ingrese marca de motor", "", "warning");

    txtMarcaMotor.focus();
    return false;
  }
  return true;
}

function limiparCampos(){
  txtMarcaMotor.val('');
}

$(document).on('ready', function(){
  limiparCampos();
});

btnGuardar.on('click',agregarMotor);
