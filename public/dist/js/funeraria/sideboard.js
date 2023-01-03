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



function  contador(){
    var id = $('#sideUser').data("visita")
    var pathname = window.location.pathname;
    var paths =  pathname.split('/')
    var cant = paths.length -1
    
    cant = cant //- 5;
    var path = '';
    for (let index = 0; index < cant; index++) {
      path = path + '../'  
    }
    path = path + 'api/visita/'  
    console.log("cantida: "+cant)
    
    /*var index = pathname.indexOf('edit');
    
    console.log(pathname);
    if(index >= 0) {
      path = '../../api/visita/'
      console.log('tiene edit')
    } else {
      path = 'api/visita/'
      console.log('Not tiene edit')
    }*/
      $.get(path+id, function(data) {
      console.log(data);
      $('#contador').text(data);
      
    });  
     }