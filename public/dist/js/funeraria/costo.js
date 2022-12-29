
$('.precio-input').on('change', function () {
    console.log("prob");
    var row = this.parentNode.parentNode;
    console.log(row);
      var cellPrice = row.querySelector('td:nth-child(3)');
    var prevPrice = Number(row.getAttribute('data-price'));
    var newQty = Number(this.value);
    var total = prevPrice * newQty;
    cellPrice.innerText = 'Bs. ' + total;
    precioTotal();
 });


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


$(document).on('click', '.btn-eliminar', function(event) {
 
        var row = this.parentNode.parentNode;
      var target = document.querySelector('#target tbody');
    
      var id = row.id; 
      id = id.substring(2);
      $("#option"+id).attr('disabled',false);
      $("#option"+id).removeClass('azul');
      //console.log(id);			
      target.removeChild(row);
      precioTotal();
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
    
    });