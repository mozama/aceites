var btnGuardar=$('#btnGuardar'),
    txtMarcaMotor=$('#txtMarcaMotor');

    function agregarMotor(){
      if (!validar()) {
        return false;
      }

      var res = $.ajax({
       url: '../php/admin/motorAgregar.php',
       data: {
         marcaMotor:     txtMarcaMotor.val(),
       },
       type: 'POST',
       dataType:'json',
       async:false
       });

      res.done(function() {
      /*  var resultado;
        try{
          resultado = JSON.parse(res);
        }catch (e){
          alert('Error JSON ' + e);
        }*/

        if ( res.status == 'OK' ){
           swal({
             title: "Proveedor agregado.",
             text: "Se agregó correctamente el proveedor.",
             timer: 2000,
             type: "success",
             showConfirmButton: true
           });
        }
        else {
           mensaje = res.message;
           swal({
             title: "Error al agregar marca de motor.",
             text: mensaje,
             type: "error",
             showConfirmButton: true
           });
         }
      });
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

btnGuardar.on('click',agregarMotor);
