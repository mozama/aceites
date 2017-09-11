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

    function agregarMotor(){
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
      })

      .done(function ( res ){
        if ( res.status === 'OK' ){
          swal({
            title: "Marca de motor agregado.",
            text: "Se agregó correctamente la marca de motor.",
            timer: 2000,
            type: "success",
            showConfirmButton: true
          });
          txtMarcaMotor.val('');
          getMotores();
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
      })
      .fail(function( jqXHR, textStatus, errorThrown ){
          alert('Ocurrio un error, intente de nuevo '+textStatus);
      });


  }


function getMotores(){
  var datos = $.ajax({
    url: '../php/admin/motorGetTodos.php',
    type: 'post',
    dataType:'json',
    async:false
    })

    .done( function( res ){
      tbodyResult.html('');
      if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
            tbodyResult.append(
              '<tr>'+
                '<td class="text-center" >'+o.motId+'</td>'+
                '<td class="text-center">'+o.motMarca+'</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-trash text-danger" aria-hidden="true" id="'+o.motId+'" style="cursor:pointer"  ></i>'+
                '</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-pencil-square text-primary" aria-hidden="true" id="'+o.motId+'" style="cursor:pointer"  ></i>'+
                '</td>'+
              '</tr>'
          );
        });
      }else{
        tbodyResult.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
      }
    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });

}

function validarIngreso(){
  if ((txtMarcaMotor.val() == '') || (txtMarcaMotor.val() === null)) {
    swal("Ingrese marca de motor", "", "warning");

    txtMarcaMotor.focus();
    return false;
  }
  return true;
}


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
  })

  .done( function(res){
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
    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });
}

function limiparCampos(){
  txtMarcaMotor.val('');
}

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
  })

  .done(function(res){
    if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
          txtMarcaMotorE.val(o.motMarca);
          txtIdE.val(o.motId);
        });
    }
    else{
      txtMarcaMotorE.val(res.message);
    }
  });


}



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
  })

  .done(function(res){
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

    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });

}

function cancelarEdicion(){
  dvAgregar.removeClass('hidden');
  dvListado.removeClass('hidden');
  dvEditar.addClass('hidden');
}

$(function() {
  $('#liMotores').addClass('active');
  limiparCampos();
  getMotores();
  }
);


btnGuardar.on('click',agregarMotor);
tbodyResult.delegate('.fa-trash', 'click', confirmarEliminar);
tbodyResult.delegate('.fa-pencil-square', 'click', visualizarEdicion);
btnCancelarE.on('click',cancelarEdicion);
btnGuardarE.on('click',editarMotor);
