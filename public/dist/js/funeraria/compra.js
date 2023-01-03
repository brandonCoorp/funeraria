

$(document).on('change', '#paquete', function(event) {
    let paquete= $("#paquete option:selected").val();
    let costo= $("#paquete option:selected").data( "costo" );
        $.get('../api/paquete/servicios/'+paquete, function(dato) {
       //     console.log(dato);
            $('#target tbody').html("");
            dato.forEach(servicio => {
                //console.log(servicio);
                addToTable(servicio.cod_servicio,servicio.nombre,servicio.costo,servicio.id);
            });
            $('#costoLabel').text('Precio TOTAL : '+costo+' Bs.');

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
     
        
        document.querySelector('#target tbody').append(newRow);
     }
     
    function createCell(text) {
        var td = document.createElement('td');
      if(text) {
          td.innerText = text;
      }
      return td;
    }
    
   
  });

  var path = "{{ route('autocomplete') }}";

  $('#nombre').typeahead({
      source:   function (query, process) {
        console.log(query)
        console.log(path)
       /* $.get(path, { term: query }, function (data) {
            console.log(data)
              return process(data);
          });*/

          $.get('../api/autocomplete/'+query, function(data) {
                 console.log(data);
                 return process(data);
              });  

      },
  
    afterSelect: function(args){
        console.log("resp: "+args.id); 
        console.log("resp: "+args.nombre); 
        $('#cliente_id').val(args.id); 
        $('#nombre').val(args.nombre);
        $('#apellido_paterno').val(args.apellido_paterno);
        $('#apellido_materno').val(args.apellido_materno);
        $('#direccion').val(args.direccion);  
        $('#telefono').val(args.telefono);     
            }


  });

 