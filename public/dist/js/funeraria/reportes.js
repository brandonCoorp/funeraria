

var printCounter = 0;
 
// Append a caption to the table before the DataTables initialisation







$('#selectReporte').change(function() {
    console.log($("#selectReporte option:selected").text());
        $('#formReporte').submit();
         });  




//CargarTablaReporte()
 function  CargarTablaReporte(){
    $('#reportes tbody').html("");
    $('#reportes tfoot').html("");
    $('#reportes thead').html("<tr><th>Nombre</th><th>Codigo</th><th>Descripcion(s)</th><th>Precio</th></tr>");
    addToTH('code', 'name', 'price', 'servicio_id')
    for (let index = 0; index < 20; index++) {
      
        addToTable("code"+index, "name"+index, "price"+index, index)
    }
   
    
}
function  CargarTablaReportes(){
    $('#reportes tbody').html("");
    $('#reportes tfoot').html("");
    $('#reportes thead').html("<tr><th>Tips</th><th>Parse</th><th>periodico</th><th>silbidio</th></tr>");
    addToTH('Tips', 'Parse', 'periodico', 'silbidio')
    for (let index = 0; index < 20; index++) {
      
        addToTable("code"+index, "name"+index, "price"+index, index)
    }
   
    
}


function addToTable(code, name, price, servicio_id) {

   
    var newRow = document.createElement('tr');
    newRow.setAttribute('data-price', price);
    newRow.setAttribute("id", "tr"+servicio_id);
    newRow.appendChild(createCell(code));
    newRow.appendChild(createCell(name));
    newRow.appendChild(createCell(servicio_id));
    
    var tdPrice = createCell("Bs. "+price);
    tdPrice.setAttribute("class", "td-price");
    newRow.appendChild(tdPrice);
 
    
    document.querySelector('#reportes tbody').append(newRow);
 }
 
function createCell(text) {
    var td = document.createElement('td');
  if(text) {
      td.innerText = text;
  }
  return td;
}

function addToTH(code, name, price, servicio_id) {

   
    var newRow = document.createElement('tr');
    newRow.appendChild(createCellTH(code));
    newRow.appendChild(createCellTH(name));
    newRow.appendChild(createCellTH(servicio_id));
    
    var tdPrice = createCellTH(price);
    newRow.appendChild(tdPrice);
 
    
  //  document.querySelector('#reportes thead').append(newRow);
    document.querySelector('#reportes tfoot').append(newRow);
 }

function createCellTH(text) {
    var th = document.createElement('th');
  if(text) {
      th.innerText = text;
  }
  return th;
}