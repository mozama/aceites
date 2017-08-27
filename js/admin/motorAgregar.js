var btnGuardar=$('#btnGuardar'),
    txtMarcaMotor=$('#txtMarcaMotor'),
    tbodyResult=$('#tbodyResult');

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


  function getMotores(){
    var datos = $.ajax({
      url: '../php/admin/motorGetTodos.php',
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
  $('#liMotores').addClass('active');
  limiparCampos();
  getMotores();
});

btnGuardar.on('click',agregarMotor);
