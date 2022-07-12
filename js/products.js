$(document).ready(function (e) {
  $('#inputCant').on('input', function (e){
    $("#inputTotal").val(e.target.value * $("#price").val())
  })
  renderTable();
});

function renderTable(){
  $("#tblAllProducts > tbody").empty();
  $.ajax({
    type: 'GET',
    url: `${uri}/application/controllers/ctrProduct.php`, 
    dataType: 'json',
    data: {'get': 'true'},
    success: function(response){
      let trs = '';
      response.forEach((val)=>{
        let {id, nombre, categoria, precio, peso, referencia, stock} = val;
        trs += `<tr><td>${nombre}</td><td>${categoria}</td><td>${precio}</td><td>${peso}</td><td>${referencia}</td><td>${stock}</td><td><button type="button" data-toggle="modal" data-target="#exampleModal" onclick="openModal('${id}', '${nombre}', '${categoria}', '${precio}', '${peso}', '${referencia}', '${stock}')" class="btnOpcions text-info"><i class="fa fa-pencil" aria-hidden="true"></i></button>`;

        if (stock <= 0) {
          trs += `<button onclick="alert('No tiene stock disponible')" class="btnOpcions text-secondary"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>`;
        }else{
          trs += `<button onclick="sellProduct(${id}, ${stock}, '${nombre}', ${precio})" class="btnOpcions text-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>`;
        }
        trs += `<button onclick="deleteProduct(${id})" class="btnOpcions text-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>`;
      })
      $("#tblAllProducts > tbody").append(trs);
      $('#tblAllProducts').DataTable();
    },
    error: function (error){
      console.log(error)
    }
  });
}

function deleteProduct(id){
  let result = window.confirm("Seguro que quiere borrar este producto");
  if(result){
    $.ajax({
      type: 'POST',
      url: `${uri}/application/controllers/ctrProduct.php`, 
      dataType: 'json',
      data: {id},
      success: function(response){
        if (response) alert("Se elimino el producto correctamente");
        else alert("Error al eliminar el producto");
        renderTable();
      },
      error: function (error){
        console.log(error);
      }
    });
  }
}

function openModal(id, nombre, categoria, precio, peso, referencia, stock){
  $('.form-control').val("");
  $('#idEdit').val(id);
  $('#baseUrl').val(uri);
  $('#inputName').val(nombre);
  $('#inputCategory').val(categoria);
  $('#inputPrice').val(precio);
  $('#inputWeight').val(peso);
  $('#inputRef').val(referencia);
  $('#inputStock').val(stock);

  $('#modalEditProduct').modal('show');
}
function closeModal(){
  $('#modalEditProduct').modal('hide');
  $('#modalSellProduct').modal('hide');
}

function sellProduct(id, stock, nombre, precio){
  $('#nameProduct').empty();
  $('.form-control').val('');
  $('#baseUrlShell').val(uri);
  $('#idSell').val(id);
  $('#price').val(precio);
  $('#nameProduct').append(nombre);
  $('#inputCant').attr("max", stock);

  $('#modalSellProduct').modal('show');
}

