
$('#sucursal_id').change(function() {
    console.log($("#sucursal_id option:selected").text());
    console.log($("#sucursal_id option:selected").val());
        $('#formReporte').submit();

         });  
$('#ajuste').change(function() {
    var valSelect = $("#ajuste option:selected").val();
    var item_cant = $('#item_cantidad').text();
    var addhtml = '';


    var cantidadOrigen = $('#item_cant').val()
    $('#precio_final').text(""); 
    switch (valSelect) {
        case '1':
        
        
           addhtml = ` <label for="cantidad">Cantidad a Ajustar (+)</label> 
          <input type="number" min="1"  class="form-control cantidad-click"  
          onKeypress="if (event.key === '-' || event.code === 'Slash') event.returnValue = false;" 
          value="1" name="cantidad" id="cantidad" >`
          $('#stock_final').text(parseInt(cantidadOrigen)+1);

          var cantidadOrigen = $('#item_cant').val()
          var cantFinal = parseInt(cantidadOrigen) + 1
          $('#cant_final').val(cantFinal);
          break;
        case '2':
      
          addhtml = ` <label for="cantidad">Cantidad (+)</label> 
          <input type="number" min="1" class="form-control cantidadCompra-click"    
          onKeypress="if (event.key === '-' || event.code === 'Slash') event.returnValue = false;"
          value="1" name="cantidad" id="cantidad" > <br>

           <label for="precio">Precio de  Compra Bs.</label>
          <input type="number" min="1" class="form-control precio-click"   
          onKeypress="if (event.key === '-' || event.code === 'Slash') event.returnValue = false;"
          value="" name="precio" id="precio" > <br>`
          $('#stock_final').text(parseInt(cantidadOrigen)+1);

          var cantidadOrigen = $('#item_cant').val()
          var cantFinal = parseInt(cantidadOrigen) + 1
          $('#cant_final').val(cantFinal);
          break;
        case '3':
        case '4':
       
          addhtml = ` <label for="cantidad">Cantidad a Ajustar (-)</label> 
          <input type="number" min="1" max="`+item_cant+`" class="form-control cantidadMenos-click" 
          onKeypress="if (event.key === '-' || event.code === 'Slash') event.returnValue = false;"
          value="1" name="cantidad" id="cantidad" >`
          $('#stock_final').text(parseInt(cantidadOrigen)-1);

          var cantidadOrigen = $('#item_cant').val()
          var cantFinal = parseInt(cantidadOrigen) + 1
          $('#cant_final').val(cantFinal);
          break;
        default:
        
      }
      $('#input_ajuste').html(addhtml);
         
    });  
  
$(document).on('input','.cantidad-click', function(){ //esta función se ejecutará en todos los casos
    
    console.log($(this).val().length)
    if ($(this).val().length > 0) {  
    var cantidadOrigen = $('#item_cant').val()
    var cantidadMod = $('#cantidad').val()
    var cantFinal = parseInt(cantidadOrigen) + parseInt(cantidadMod)
       $('#stock_final').text(cantFinal);
       $('#cant_final').val(cantFinal);
       

      }
   
});
$(document).on('input','.cantidadMenos-click', function(){ //esta función se ejecutará en todos los casos
    
    console.log($(this).val().length)
    if ($(this).val().length > 0) {  
    var cantidadOrigen = $('#item_cant').val()
    var cantidadMod = $('#cantidad').val()
    var cantFinal = parseInt(cantidadOrigen) - parseInt(cantidadMod)
       $('#stock_final').text(cantFinal);
       $('#cant_final').val(cantFinal);
       

      }
   
});
$(document).on('input','.cantidadCompra-click', function(){ //esta función se ejecutará en todos los casos
    
    console.log($(this).val().length)
    if ($(this).val().length > 0) {  
    var cantidadOrigen = $('#item_cant').val()
    var cantidadMod = $('#cantidad').val()
    var cantFinal = parseInt(cantidadOrigen) + parseInt(cantidadMod)
       $('#stock_final').text(cantFinal);
       $('#cant_final').val(cantFinal);
       
       if ($('#precio').val().length > 0) {

        calculartotal();
      }
      }
   
});
$(document).on('input','.precio-click', function(){ //esta función se ejecutará en todos los casos
    console.log($(this).val().length)
    if ($(this).val().length > 0) {

        calculartotal();
      }
    console.log("Hola precio");
});

function calculartotal(){
    var cantidadOrigen = $('#item_cant').val()
    var cantidadMod = $('#cantidad').val()
    var cantFinal = parseInt(cantidadOrigen) + parseInt(cantidadMod)


    var precioOrigen = $('#costo_unit').val()
    var precioMod = $('#precio').val()
   
    var precioFinal = parseInt(precioOrigen) + parseInt(precioMod)
    
    var totalAnterior = parseInt(cantidadOrigen) * parseInt(precioOrigen)
    var totalnuevo = parseInt(cantidadMod) * parseInt(precioMod)
    var totalActual  = parseInt(totalAnterior) + parseInt(totalnuevo)

    var total  = parseInt(totalActual) / parseInt(cantFinal)
    $('#precio_final').text(Math.trunc(total)+" Bs."); 
    $('#item_precio').val(Math.trunc(total)) 
}