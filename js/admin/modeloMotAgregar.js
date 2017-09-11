var btnGuardar=$('#btnGuardar'),
    txtMarcaMotor=$('#txtMarcaMotor'),
    tbodyResult=$('#tbodyResult');
var dvAgregar=$('#dvAgregar'),
    dvEditar=$('#dvEditar'),
    dvListado=$('#dvListado');
var txtMarcaMotorE=$('#txtMarcaMotorE'),
    btnGuardarE=$('#btnGuardarE'),
    btnCancelarE=$('#btnCancelarE'),
    txtIdE=$('#txtIdE');

  /*  function agregarMotor(){
      if (!validarIngreso()) {
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
  }*/


  function getMotores(){

    $.ajax({
      url: '../php/admin/motorGetTodos.php',
      type: 'post',
      dataType:'json',
      async:false
      })

      .done(function( response ) {
        txtMarcaMotor.html('');
        txtMarcaMotor.append(
          '<option value=0> Seleccione una marca de motor </option>'
        );
        if ( response.status === 'OK' ){
          $.each(response.data, function(k,o){
            txtMarcaMotor.append(
              '<option value='+o.motId+'>'+o.motMarca+'</option>'
            );
          });
        }else{
          txtMarcaMotor.html('');
          txtMarcaMotor.html('<option value=0>'+ response.message +'</option>');
        }
      })

      .fail(function( jqXHR, textStatus, errorThrown ){
          alert('Ocurrio un error, intente de nuevo '+textStatus);
      });

  }

/*
function validarIngreso(){
  if ((txtMarcaMotor.val() == '') || (txtMarcaMotor.val() === null)) {
    swal("Ingrese marca de motor", "", "warning");

    txtMarcaMotor.focus();
    return false;
  }
  return true;
}
*/
/*
function confirmarEliminar(){
  var id = $(this).attr('id');
  swal({
    title: "Eliminar Marca de motor",
    text: "¿Eliminar la marca de motor seleccionado?, esta acción no se podrá revertir.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
    closeOnConfirm: false
  },
  function(){
    eliminarMotor(id);
  });
}

function eliminarMotor(idMotor) {
  var datos = $.ajax({
  url: '../php/admin/motorEliminar.php',
  data:{
     idMotor:  idMotor
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
      title: "Marca de motor eliminado correctamente.",
      text: "",
      timer: 2000,
      type: "success",
      showConfirmButton: true
    });
    getMotores();

  }
  else{
    mensaje = res.message;
    swal({
      title: "Error al eliminar marca de motor.",
      text: mensaje,
      type: "error",
      showConfirmButton: true
    });
  }
}
*/
function limiparCampos(){
  txtMarcaMotor.val('');
}

/*
function visualizarEdicion(){
  dvAgregar.addClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.removeClass('hidden');

  var id = $(this).attr('id');

  var datos = $.ajax({
  url: '../php/admin/motorGet.php',
  data:{
     idMotor:  id
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
      $.each(res.data, function(k,o){
        txtMarcaMotorE.val(o.motMarca);
        txtIdE.val(o.motId);
      });
  }
  else{
    txtMarcaMotorE.val(res.message);
  }
}
*/
/*
function editarMotor() {
  var datos = $.ajax({
  url: '../php/admin/motorEditar.php',
  data:{
     idMotor:     txtIdE.val(),
     marcaMotor : txtMarcaMotorE.val()
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
      title: "Marca de motor editado correctamente.",
      text: "",
      timer: 2000,
      type: "success",
      showConfirmButton: true
    });
    cancelarEdicion();
    getMotores();

  }
  else{
    mensaje = res.message;
    swal({
      title: "Error al editar marca de motor.",
      text: mensaje,
      type: "error",
      showConfirmButton: true
    });
  }
}*/

/*
function cancelarEdicion(){
  dvAgregar.removeClass('hidden');
  dvListado.removeClass('hidden');
  dvEditar.addClass('hidden');
}*/

$(document).on('ready', function(){
  $('#liModeloMotor').addClass('active');
  //limiparCampos();
  getMotores();
});

//btnGuardar.on('click',agregarMotor);
//tbodyResult.delegate('.fa-trash', 'click', confirmarEliminar);
//tbodyResult.delegate('.fa-pencil-square', 'click', visualizarEdicion);
//btnCancelarE.on('click',cancelarEdicion);
//btnGuardarE.on('click',editarMotor);
