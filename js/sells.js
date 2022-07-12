$(document).ready(function (e) {
  renderTableSells();
});

function renderTableSells(){
  $("#tblAllSells > tbody").empty();
  $.ajax({
    type: 'GET',
    url: `${uri}/application/controllers/ctrSell.php`, 
    dataType: 'json',
    data: {'get': 'true'},
    success: function(response){
      let trs = '';
      response.forEach((val)=>{
        let {id, referencia, nombre, cantidad, valor_total, fecha, id_product} = val;
        trs += `<tr><td>${fecha}</td><td>${referencia}</td><td>${nombre}</td><td>${cantidad}</td><td>${valor_total}</td></tr>`;
      })
      $("#tblAllSells > tbody").append(trs);
      $('#tblAllSells').DataTable();
    },
    error: function (error){
      console.log(error)
    }
  });
}