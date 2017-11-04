var btnGuardar=$('#btnGuardar'),
    txtFiltro=$('#txtFiltro'),
    txtFiltroTipo=$('#txtFiltroTipo')
    tbodyResult=$('#tbodyResult');
var dvAgregar=$('#dvAgregar'),
    dvEditar=$('#dvEditar'),
    dvListado=$('#dvListado');
var txtFiltroE=$('txtFiltroE'),
    txtFiltroTipoE=$('txtFiltroTipoE'),
    btnGuardarE=$('#btnGuardarE'),
    btnCancelarE=$('#btnCancelarE'),
    txtIdE=$('#txtIdE');

    function agregarFiltro(){
      if (!validarIngreso()) {
        return false;
      }

      var datos = $.ajax({
      url: '../php/admin/filtroAgregar.php',
      data:{
         filtro:     txtFiltro.val(),
         filtroTipo: txtFiltroTipo.val(),
      },
      type: 'post',
      dataType:'json',
      async:false
      })

      .done(function ( res ){
        if ( res.status === 'OK' ){
          swal({
            title: "Filtro",
            text: "Se agregó correctamente el filtro.",
            timer: 2000,
            type: "success",
            showConfirmButton: true
          });
          txtFiltro.val('');
          getFiltros();
        }
        else{
          mensaje = res.message;
          swal({
            title: "Error al agregar filtro.",
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


function getFiltros(){
  var datos = $.ajax({
    url: '../php/admin/filtroGetTodos.php',
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
                '<td class="text-center" >'+o.filId+'</td>'+
                '<td class="text-center">'+o.filNumero+'</td>'+
                '<td class="text-center">'+o.filTipo+'</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-trash text-danger" aria-hidden="true" id="'+o.filId+'" style="cursor:pointer"  ></i>'+
                '</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-pencil-square text-primary" aria-hidden="true" id="'+o.filId+'" style="cursor:pointer"  ></i>'+
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
  if ((txtFiltro.val() == '') || (txtFiltro.val() === null)) {
    swal("Ingrese marca de motor", "", "warning");

    txtFiltro.focus();
    return false;
  }
  return true;
}


function confirmarEliminar(){
  var id = $(this).attr('id');
  swal({
    title: "Eliminar Filtro",
    text: "¿Eliminar el filtro seleccionado?, esta acción no se podrá revertir.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
    closeOnConfirm: false
  },
  function(){
    eliminarFiltro(id);
  });
}

function eliminarFiltro(idMotor) {
  var datos = $.ajax({
  url: '../php/admin/filtroEliminar.php',
  data:{
     idFiltro:  idFiltro
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done( function(res){
    if ( res.status === 'OK' ){
      swal({
        title: "Filtro eliminado correctamente.",
        text: "",
        timer: 2000,
        type: "success",
        showConfirmButton: true
      });
      getFiltros();

      }
      else{
        mensaje = res.message;
        swal({
          title: "Error al eliminar filtro.",
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
  txtFiltro.val('');
}

function visualizarEdicion(){
  dvAgregar.addClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.removeClass('hidden');

  var id = $(this).attr('id');

  var datos = $.ajax({
  url: '../php/admin/filtroGet.php',
  data:{
     idFiltro:  id
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done(function(res){
    if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
          txtFiltroE.val(o.filNumero);
          txtFiltroTipoE.val(o.filTipo);
          txtIdE.val(o.filId);
        });
    }
    else{
      txtFiltroE.val(res.message);
      txtFiltroTipoE.val(res.message);
    }
  });


}



function editarFiltro() {
  var datos = $.ajax({
  url: '../php/admin/filtroEditar.php',
  data:{
     idMotor:     txtIdE.val(),
     filtro : txtFiltroE.val()
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done(function(res){
    if ( res.status === 'OK' ){
      swal({
        title: "Filtro editado correctamente.",
        text: "",
        timer: 2000,
        type: "success",
        showConfirmButton: true
      });
      cancelarEdicion();
      getFiltros();

      }
      else{
        mensaje = res.message;
        swal({
          title: "Error al editar filtro.",
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
  $('#liFiltros').addClass('active');
  limiparCampos();
  getFiltros();
  }
);


btnGuardar.on('click',agregarFiltro);
tbodyResult.delegate('.fa-trash', 'click', confirmarEliminar);
tbodyResult.delegate('.fa-pencil-square', 'click', visualizarEdicion);
btnCancelarE.on('click',cancelarEdicion);
btnGuardarE.on('click',editarMotor);
