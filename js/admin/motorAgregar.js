var btnGuardar=$('#btnGuardar'),
    txtMarcaMotor=$('#txtMarcaMotor');

function agregarMotor(){
  if (!validar()) {
    return false;
  }
  alert("as")
}

function validar(){
  if ((txtMarcaMotor.val() == '') || (txtMarcaMotor.val() == null)) {
    swal("Ingrese marca de motor", "", "warning");
    txtMarcaMotor.focus();
    return false;
  }
  return true;
}

btnGuardar.on('click',agregarMotor);
