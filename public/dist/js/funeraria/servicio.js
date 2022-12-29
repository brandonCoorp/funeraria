

$(document).on('change', '#item_id', function(event) {
    // $('#servicioSelecionado').val($("#servicio option:selected").text());
    let item_id= $("#item_id option:selected").val();
    let costo= $("#item_id option:selected").data( "costo" );
    let nombre= $("#item_id option:selected").data( "nombre" );
    let codigo= $("#item_id option:selected").data( "codigo" );
    $("#item_id option:selected").attr('disabled',true);
    $("#item_id option:selected").addClass('azul');
    addToTable(codigo,nombre,costo,item_id)
  });
function addToTable(code, name, price, item_id) {

   
   var newRow = document.createElement('tr');
   newRow.setAttribute('data-price', price);
   newRow.setAttribute("id", "tr"+item_id);
   newRow.appendChild(createCell(code));
   newRow.appendChild(createCell(name));


   var tdPrice = createCell("Bs. "+price);
   tdPrice.setAttribute("class", "td-price");
   newRow.appendChild(tdPrice);
   
   var cellInputQty = createCell();
   cellInputQty.appendChild(createInputQty());
   newRow.appendChild(cellInputQty);

   cellInputQty.appendChild(createInputId(item_id));
   newRow.appendChild(cellInputQty);

   var cellRemoveBtn = createCell();
   cellRemoveBtn.appendChild(createRemoveBtn())
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



function createInputQty() {
	var inputQty = document.createElement('input');
  inputQty.type = 'number';
  inputQty.required = 'true';
  inputQty.className = 'form-control open'
  inputQty.setAttribute('name', 'cantidad[]');
  inputQty.setAttribute('value', '1');
  inputQty.min = 1; // mínimo un producto
  inputQty.onchange = onQtyChange;
  return inputQty;
}

function createInputId(item_id) {
	var inputId = document.createElement('input');
  inputId.type = 'number';
  inputId.required = 'true';
  inputId.setAttribute('hidden', 'none');
  inputId.setAttribute('name', 'itemsid[]');
  inputId.setAttribute('value', item_id);
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

function onQtyChange() {
  var row = this.parentNode.parentNode;
	var cellPrice = row.querySelector('td:nth-child(3)');
  var prevPrice = Number(row.getAttribute('data-price'));
  var newQty = Number(this.value);
  var total = prevPrice * newQty;
  cellPrice.innerText = 'Bs. ' + total;
  precioTotal();
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

