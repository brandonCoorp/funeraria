

$(document).on('change', '#servicio_id', function(event) {
    // $('#servicioSelecionado').val($("#servicio option:selected").text());
    let servicio_id= $("#servicio_id option:selected").val();
    let costo= $("#servicio_id option:selected").data( "costo" );
    let nombre= $("#servicio_id option:selected").data( "nombre" );
    let codigo= $("#servicio_id option:selected").data( "codigo" );
    $("#servicio_id option:selected").attr('disabled',true);
    $("#servicio_id option:selected").addClass('azul');
    addToTable(codigo,nombre,costo,servicio_id)
  });
function addToTable(code, name, price, servicio_id) {

   
   var newRow = document.createElement('tr');
   newRow.setAttribute('data-price', price);
   newRow.setAttribute("id", "tr"+servicio_id);
   newRow.appendChild(createCell(code));
   newRow.appendChild(createCell(name));


   var tdPrice = createCell("Bs. "+price);
   tdPrice.setAttribute("class", "td-price");
   newRow.appendChild(tdPrice);

   var cellRemoveBtn = createCell();
   cellRemoveBtn.appendChild(createRemoveBtn());

   cellRemoveBtn.appendChild(createInputId(servicio_id));
   newRow.appendChild(cellRemoveBtn);
   
   document.querySelector('#target tbody').appendChild(newRow);

   precioTotal();
}






function remove() {
	var row = this.parentNode.parentNode;
  var target = document.querySelector('#target tbody');

  
  var id = row.id; 
  id = id.substring(2);
  $("#option"+id).attr('disabled',false);
  $("#option"+id).removeClass('azul');
  //console.log(id);			
  target.removeChild(row);
  precioTotal();
}




function createInputId(servicio_id) {
	var inputId = document.createElement('input');
  inputId.type = 'number';
  inputId.required = 'true';
  inputId.setAttribute('hidden', 'none');
  inputId.setAttribute('name', 'serviciosid[]');
  inputId.setAttribute('value', servicio_id);
  inputId.min = 1; // mínimo un producto
  return inputId;
}




function createRemoveBtn() {
	var btnRemove = document.createElement('button');
  btnRemove.className = 'btn btn-xs btn-danger';

  
  btnRemove.onclick = remove;
  btnRemove.innerText = 'Descartar';
  return btnRemove;
}

function createCell(text) {
	var td = document.createElement('td');
  if(text) {
  	td.innerText = text;
  }
  return td;
}



function precioTotal(){

    let costo = 0
   // console.log(costo.getAttribute('value'));
   
   $(".td-price").each(function(index) {
    let price = $(this).text(); 
    price = price.substring(4);
    console.log(index + ": " + price);
   // costo = costo + price;
    if (!isNaN(price)) {
        costo = costo + parseInt(price);
    } 
});
   // console.log(costo);
    $('#costo').val(costo);
    $('#costoLabel').text("Precio TOTAL : "+ costo +" Bs.");
}

